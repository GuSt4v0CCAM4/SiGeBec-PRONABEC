<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
class ScholarshipCall extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','start_date', 'end_date', 'scholarship_id'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }

    public function attendanceCount()
    {
        return $this->attendance->count();
    }

    // public function applicants()
    // {
    //     return $this->belongsToMany(User::class);
    // }
}