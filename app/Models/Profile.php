<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'country_code',
        'phone',
        'email',
        'dob',
        'religion',
        'community',
        'marital_status',
        'mother_tongue',
        'diet',
        'citizenship',
        'drinking',
        'smoking',
        'blood_group',
        'height',
        'health_status',
        'time_of_birth',
        'place_of_birth',
        'father_profession',
        'mother_profession',
        'brothers',
        'married_brothers',
        'sisters',
        'married_sisters',
        'family_affluence',
        'family_values',
        'registering_for',
        'school_college_name',
        'degree',
        'year_of_passing',
        'highest_qualification',
        'education_field',
        'occupation',
        'company_name',
        'annual_income',
        'work_location',
        'partner_age_min',
        'partner_age_max',
        'partner_mother_tongue',
        'partner_religion',
        'partner_community',
        'partner_marital_status',
        'partner_caste',
        'partner_manglik',
        'partner_gotra',
        'partner_education_field',
        'partner_occupation',
        'partner_annual_income',
        'photos',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'dob' => 'date',
        'time_of_birth' => 'datetime:H:i',
        'mother_tongue' => 'array',
        'diet' => 'array',
        'drinking' => 'array',
        'smoking' => 'array',
        'partner_mother_tongue' => 'array',
        'photos' => 'array',
        'brothers' => 'integer',
        'married_brothers' => 'integer',
        'sisters' => 'integer',
        'married_sisters' => 'integer',
        'partner_age_min' => 'integer',
        'partner_age_max' => 'integer',
    ];

   
    public function services()
    {
        return $this->hasMany(Service::class);
    }


    public function staffAssignment()
    {
      return $this->hasOne(ProfileEmployeeAssignment::class, 'profile_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopeBasicInfo($query)
    {
        return $query->select('id', 'name', 'email', 'phone');
    }


}