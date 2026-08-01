<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Opportunity extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'type', 'deadline',
        'status', 'results_description', 'results_file', 'is_published',
        'form_schema', 'has_form',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
            'is_published' => 'boolean',
            'has_form' => 'boolean',
            'form_schema' => 'array',
        ];
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'ouvert');
    }

    public function applications()
    {
        return $this->hasMany(OpportunityApplication::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
