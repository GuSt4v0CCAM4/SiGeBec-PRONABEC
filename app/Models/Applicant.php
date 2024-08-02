<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'scholarship_call_id',
        'status',
        'start_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scholarshipCall()
    {
        return $this->belongsTo(ScholarshipCall::class);
    }

    public function getStartDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}
