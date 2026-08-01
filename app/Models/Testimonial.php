<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'photo', 'function', 'content',
        'type', 'is_approved', 'is_visible'
    ];

    protected function casts(): array
    {
        return [
            'is_approved' => 'boolean',
            'is_visible' => 'boolean',
        ];
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)->where('is_approved', true);
    }
}
