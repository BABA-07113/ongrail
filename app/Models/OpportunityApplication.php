<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpportunityApplication extends Model
{
    protected $fillable = [
        'opportunity_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'form_data',
        'status',
        'admin_notes',
    ];

    protected function casts(): array
    {
        return [
            'form_data' => 'array',
        ];
    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
