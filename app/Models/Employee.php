<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'dob',
        'pan_number',
        'aadhar_number',
        'country',
        'state',
        'city',
        'address_line',
        'pincode',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function education()
    {
        return $this->hasOne(Education::class);
    }

    public function pastEmployment()
    {
        return $this->hasOne(PastEmployment::class);
    }

    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    public function payroll()
    {
        return $this->hasOne(Payroll::class);
    }
}