<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Task;

class Company extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
