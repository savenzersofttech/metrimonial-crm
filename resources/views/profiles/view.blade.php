@extends('layouts.main')
@section('title', 'View Profile')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="mb-0">Profile Details</h4>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            <i data-feather="arrow-left"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        {{-- Personal Details --}}
                        <h5>Personal Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Full Name:</strong> {{ $profile->name ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Gender:</strong> {{ $profile->gender ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Contact Number:</strong> {{ $profile->country_code . ' ' . $profile->phone ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Email Address:</strong> {{ $profile->email ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Date of Birth:</strong> {{ $profile->dob ? $profile->dob->format('Y-m-d') : 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Religion:</strong> {{ $profile->religion ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Community:</strong> {{ $profile->community ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Marital Status:</strong> {{ $profile->marital_status ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Mother Tongue:</strong> {{ is_array($profile->mother_tongue) ? implode(', ', $profile->mother_tongue) : 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Diet:</strong> {{ is_array($profile->diet) ? implode(', ', $profile->diet) : 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Citizenship:</strong> {{ $profile->citizenship ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Drinking:</strong> {{ is_array($profile->drinking) ? implode(', ', $profile->drinking) : 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Smoking:</strong> {{ is_array($profile->smoking) ? implode(', ', $profile->smoking) : 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Blood Group:</strong> {{ $profile->blood_group ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Height:</strong> {{ $profile->height ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Health Status:</strong> {{ $profile->health_status ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Time of Birth:</strong> {{ $profile->time_of_birth ? $profile->time_of_birth->format('H:i') : 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Place of Birth:</strong> {{ $profile->place_of_birth ?? 'N/A' }}
                            </div>
                        </div>

                        {{-- Family Details --}}
                        <h5>Family Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Father's Profession:</strong> {{ $profile->father_profession ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Mother's Profession:</strong> {{ $profile->mother_profession ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Brothers:</strong> {{ $profile->brother ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Married Brothers:</strong> {{ $profile->married_brothers ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Sisters:</strong> {{ $profile->sisters ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Married Sisters:</strong> {{ $profile->married_sisters ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Family Affluence:</strong> {{ $profile->family_affluence ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Family Values:</strong> {{ $profile->family_values ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Registering For:</strong> {{ $profile->registering_for ?? 'N/A' }}
                            </div>
                        </div>

                        {{-- Education Details --}}
                        <h5>Education Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>School/College Name:</strong> {{ $profile->school_college_name ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Degree:</strong> {{ $profile->degree ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Year of Study:</strong> {{ $profile->year_of_passing ?? 'N/A' }}
                            </div>
                        </div>

                        {{-- Career Details --}}
                        <h5>Career Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Highest Qualification:</strong> {{ $profile->highest_qualification ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Education Field:</strong> {{ $profile->education_field ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Occupation:</strong> {{ $profile->occupation ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Company Name:</strong> {{ $profile->company_name ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Annual Income:</strong> {{ $profile->annual_income ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Work Location:</strong> {{ $profile->work_location ?? 'N/A' }}
                            </div>
                        </div>

                        <!-- Partner Preference -->
                        <h5>Partner Preference</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Partner Age:</strong> {{ $profile->partner_age_min ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Age:</strong> {{ $profile->partner_age_max ?? 'N/A' }}  
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Mother Tongue:</strong> {{ is_array($profile->partner_mother_tongue) ? implode(', ', $profile->partner_mother_tongue) : 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Religion:</strong> {{ $profile->partner_religion ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Community:</strong> {{ $profile->partner_community ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Marital Status:</strong> {{ $profile->partner_marital_status ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Caste:</strong> {{ $profile->partner_caste ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Manglik:</strong> {{ $profile->partner_manglik ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Gotra:</strong> {{ $profile->partner_gotra ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Education Field:</strong> {{ $profile->partner_education_field ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Occupation:</strong> {{ $profile->partner_occupation ?? 'N/A' }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Partner Annual Income:</strong> {{ $profile->partner_annual_income ?? 'N/A' }}
                            </div>
                        </div>

                        <!-- Photos -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script'>
        feather.replace();
    </script>
@endpush