<?php

namespace App\Rules;

use App\Enums\TaskStatus;
use App\Models\Task;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxPendingTasks implements ValidationRule
{
    public function __construct(private int $maxTasks) {}

    public function validate(String $attribute, mixed $value, Closure $fail): void
    {
        $pendingTasksCount = Task::where('user_id', $value)
            ->where('is_completed', TaskStatus::Pending->value)
            ->count();

        if ($pendingTasksCount >= $this->maxTasks) {
            $fail("The user has reached the maximum number of pending tasks ({$this->maxTasks}).");
        }
    }
}
