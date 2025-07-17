<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'source',
        'status',
        'notes',
        'follow_up',
    ];

    // Link to profile (if using a profiles table)
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // All assignments history
    public function assignments()
    {
        return $this->hasMany(LeadAssignment::class);
    }

    // Current assigned employee (latest assignment)
    public function currentAssignment()
    {
        return $this->hasOne(LeadAssignment::class)->latestOfMany();
    }
}
