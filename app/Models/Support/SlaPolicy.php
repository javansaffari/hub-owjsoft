<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SlaPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'priority',
        'response_time_minutes',
        'resolution_time_minutes',
    ];

    public function scopePriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }
}
