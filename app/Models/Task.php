<?php

namespace App\Models;

use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'start_at',
        'expirate_at',
        'company_id',
        'user_id',
    ];

    protected $casts = [
        'is_completed' => TaskStatus::class,
        'start_at' => 'datetime',
        'expirate_at' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
