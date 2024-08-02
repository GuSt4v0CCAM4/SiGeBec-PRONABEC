<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function calls()
    {
        return $this->hasMany(ScholarshipCall::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
