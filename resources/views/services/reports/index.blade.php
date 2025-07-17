@extends('layouts.sb2-layout')
@section('title', 'Search Profiles')
@section('content')
<main>
    <!-- Page Header -->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="search"></i></div>
                            Search Profiles
                        </h1>
                        <div class="page-header-subtitle">Find profiles based on your criteria</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Page Content -->
    <div class="container-fluid px-4 mt-n10">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        Profile Search
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="text-gray-500" data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#!" id="clearFilters">Clear Filters</a>
                                <a class="dropdown-item" href="#!">Save Search</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="searchForm" method="GET" action="{{ route('services.reports.index') }}">
                            @csrf
                            <div class="row">
                                <!-- Personal Details -->
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="name">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name (e.g., Rah for Rahul)" value="{{ old('name') }}">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control select2">
                                        <option value="">-- Select Gender --</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1">Age Range</label>
                                    <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <select name="age_min" class="form-control select2">
                                                <option value="">Min Age</option>
                                                @for ($i = 18; $i <= 100; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-2 text-center">to</div>
                                        <div class="col-md-5">
                                            <select name="age_max" class="form-control select2">
                                                <option value="">Max Age</option>
                                                @for ($i = 18; $i <= 100; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="religion">Religion</label>
                                    <select name="religion" id="religion" class="form-control select2">
                                        <option value="">-- Select Religion --</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Sikh">Sikh</option>
                                        <option value="Parsi">Parsi</option>
                                        <option value="Jain">Jain</option>
                                        <option value="Buddhist">Buddhist</option>
                                        <option value="Jewish">Jewish</option>
                                        <option value="No Religion">No Religion</option>
                                        <option value="Spiritual - not religious">Spiritual - not religious</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="community">Community</label>
                                    <select name="community" id="community" class="form-control select2">
                                        <option value="">-- Select Community --</option>
                                        <optgroup label="Hindu">
                                            <option value="Agarwal">Agarwal</option>
                                            <option value="Arora">Arora</option>
                                            <option value="Brahmin">Brahmin</option>
                                            <option value="Chaudhary">Chaudhary</option>
                                            <option value="Gupta">Gupta</option>
                                            <option value="Jat">Jat</option>
                                            <option value="Kayastha">Kayastha</option>
                                            <option value="Khatri">Khatri</option>
                                            <option value="Kshatriya">Kshatriya</option>
                                            <option value="Maratha">Maratha</option>
                                            <option value="Marwari">Marwari</option>
                                            <option value="Nair">Nair</option>
                                            <option value="Patel">Patel</option>
                                            <option value="Rajput">Rajput</option>
                                            <option value="Reddy">Reddy</option>
                                            <option value="Sindhi">Sindhi</option>
                                            <option value="Yadav">Yadav</option>
                                            <option value="Iyer">Iyer</option>
                                            <option value="Iyengar">Iyengar</option>
                                            <option value="Chettiar">Chettiar</option>
                                            <option value="Gounder">Gounder</option>
                                            <option value="Mudaliar">Mudaliar</option>
                                            <option value="Nadar">Nadar</option>
                                            <option value="Pillai">Pillai</option>
                                            <option value="Vokkaliga">Vokkaliga</option>
                                        </optgroup>
                                        <optgroup label="Muslim">
                                            <option value="Sunni">Sunni</option>
                                            <option value="Shia">Shia</option>
                                            <option value="Memon">Memon</option>
                                            <option value="Khoja">Khoja</option>
                                            <option value="Syed">Syed</option>
                                            <option value="Pathan">Pathan</option>
                                        </optgroup>
                                        <optgroup label="Christian">
                                            <option value="Catholic">Catholic</option>
                                            <option value="Protestant">Protestant</option>
                                            <option value="Born Again">Born Again</option>
                                            <option value="Orthodox">Orthodox</option>
                                        </optgroup>
                                        <optgroup label="Sikh">
                                            <option value="Ramgarhia">Ramgarhia</option>
                                            <option value="Jat Sikh">Jat Sikh</option>
                                            <option value="Khatri Sikh">Khatri Sikh</option>
                                        </optgroup>
                                        <optgroup label="Jain">
                                            <option value="Digambar">Digambar</option>
                                            <option value="Shwetambar">Shwetambar</option>
                                            <option value="Terapanthi">Terapanthi</option>
                                        </optgroup>
                                        <optgroup label="Other Communities">
                                            <option value="Parsi">Parsi</option>
                                            <option value="Zoroastrian">Zoroastrian</option>
                                            <option value="Other">Other</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="marital_status">Marital Status</label>
                                    <select name="marital_status" id="marital_status" class="form-control select2" multiple>
                                        <option value="unmarried">Unmarried</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                        <option value="separated">Separated</option>
                                        <option value="awaiting_divorce">Awaiting Divorce</option>
                                        <option value="annulled">Annulled</option>
                                        <option value="prefer_not_to_say">Prefer Not to Say</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="mother_tongue">Mother Tongue</label>
                                    <select name="mother_tongue" id="mother_tongue" class="form-control select2" multiple>
                                        <option value="Assamese">Assamese</option>
                                        <option value="Bengali">Bengali</option>
                                        <option value="Bhojpuri">Bhojpuri</option>
                                        <option value="Dogri">Dogri</option>
                                        <option value="English">English</option>
                                        <option value="Garhwali">Garhwali</option>
                                        <option value="Gujarati">Gujarati</option>
                                        <option value="Haryanvi">Haryanvi</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Kashmiri">Kashmiri</option>
                                        <option value="Khandeshi">Khandeshi</option>
                                        <option value="Konkani">Konkani</option>
                                        <option value="Kodava">Kodava</option>
                                        <option value="Kannada">Kannada</option>
                                        <option value="Maithili">Maithili</option>
                                        <option value="Malayalam">Malayalam</option>
                                        <option value="Manipuri">Manipuri</option>
                                        <option value="Marathi">Marathi</option>
                                        <option value="Marwari">Marwari</option>
                                        <option value="Mizo">Mizo</option>
                                        <option value="Nagpuri">Nagpuri</option>
                                        <option value="Nepali">Nepali</option>
                                        <option value="Odia">Odia</option>
                                        <option value="Punjabi">Punjabi</option>
                                        <option value="Rajasthani">Rajasthani</option>
                                        <option value="Sanskrit">Sanskrit</option>
                                        <option value="Santhali">Santhali</option>
                                        <option value="Sindhi">Sindhi</option>
                                        <option value="Sourashtra">Sourashtra</option>
                                        <option value="Tamil">Tamil</option>
                                        <option value="Telugu">Telugu</option>
                                        <option value="Tulu">Tulu</option>
                                        <option value="Urdu">Urdu</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="diet">Diet</label>
                                    <select name="diet" id="diet" class="form-control select2" multiple>
                                        <option value="Veg">Veg</option>
                                        <option value="Non-Veg">Non-Veg</option>
                                        <option value="Occasionally Non-Veg">Occasionally Non-Veg</option>
                                        <option value="Eggetarian">Eggetarian</option>
                                        <option value="Jain">Jain</option>
                                        <option value="Vegan">Vegan</option>
                                        <option value="No Onion No Garlic">No Onion No Garlic</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="drinking">Drinking</label>
                                    <select name="drinking" id="drinking" class="form-control select2" multiple>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                        <option value="Occasionally">Occasionally</option>
                                        <option value="prefer_not_to_say">Prefer Not to Say</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="smoking">Smoking</label>
                                    <select name="smoking" id="smoking" class="form-control select2" multiple>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                        <option value="Occasionally">Occasionally</option>
                                        <option value="prefer_not_to_say">Prefer Not to Say</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="height_min">Min Height</label>
                                    <select name="height_min" id="height_min" class="form-control select2">
                                        <option value="">-- Select Min Height --</option>
                                        @for ($i = 122; $i <= 236; $i += 2)
                                            <option value="{{ $i }}cm">
                                                {{ floor($i / 30.48) }}ft {{ round(($i / 30.48 - floor($i / 30.48)) * 12) }}in - {{ $i }}cm
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="height_max">Max Height</label>
                                    <select name="height_max" id="height_max" class="form-control select2">
                                        <option value="">-- Select Max Height --</option>
                                        @for ($i = 122; $i <= 236; $i += 2)
                                            <option value="{{ $i }}cm">
                                                {{ floor($i / 30.48) }}ft {{ round(($i / 30.48 - floor($i / 30.48)) * 12) }}in - {{ $i }}cm
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="health_status">Health Status</label>
                                    <select name="health_status" id="health_status" class="form-control select2">
                                        <option value="">-- Select Health Status --</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Very Good">Very Good</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Minor Allergies">Minor Allergies</option>
                                        <option value="Diabetes">Diabetes</option>
                                        <option value="Low BP">Low BP</option>
                                        <option value="High BP">High BP</option>
                                        <option value="Heart Ailments">Heart Ailments</option>
                                        <option value="Minor Chronic Condition">Minor Chronic Condition</option>
                                        <option value="Major Chronic Condition">Major Chronic Condition</option>
                                        <option value="Differently Abled (Physically Challenged)">Differently Abled</option>
                                        <option value="Mental Health Condition">Mental Health Condition</option>
                                        <option value="Recovering from Illness/Injury">Recovering from Illness/Injury</option>
                                        <option value="Prefer Not to Say">Prefer Not to Say</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="citizenship">Country</label>
                                    <select name="citizenship" id="citizenship" class="form-control select2">
                                        <option value="">-- Select Country --</option>
                                        <option value="Indian">Indian</option>
                                        <option value="American">American</option>
                                        <option value="Canadian">Canadian</option>
                                        <option value="British">British</option>
                                        <option value="Australian">Australian</option>
                                        <option value="New Zealander">New Zealander</option>
                                        <option value="Singaporean">Singaporean</option>
                                        <option value="Pakistani">Pakistani</option>
                                        <option value="Bangladeshi">Bangladeshi</option>
                                        <option value="Nepalese">Nepalese</option>
                                        <option value="Sri Lankan">Sri Lankan</option>
                                        <option value="UAE">UAE</option>
                                        <option value="Saudi Arabian">Saudi Arabian</option>
                                        <option value="Qatari">Qatari</option>
                                        <option value="Kuwaiti">Kuwaiti</option>
                                        <option value="Malaysian">Malaysian</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="state">State</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="Enter state">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter city">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="family_affluence">Family Affluence</label>
                                    <select name="family_affluence" id="family_affluence" class="form-control select2">
                                        <option value="">-- Select Family Affluence --</option>
                                        <option value="ultra_rich">Ultra Rich / Elite</option>
                                        <option value="wealthy_business">Wealthy / Business Class</option>
                                        <option value="affluent">Affluent</option>
                                        <option value="upper_middle_class">Upper Middle Class</option>
                                        <option value="middle_class">Middle Class</option>
                                        <option value="lower_middle_class">Lower Middle Class</option>
                                        <option value="working_class">Working Class</option>
                                        <option value="lower_class">Lower Class</option>
                                        <option value="below_poverty_line">Below Poverty Line</option>
                                        <option value="prefer_not_to_say">Prefer Not to Say</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="family_values">Family Values</label>
                                    <select name="family_values" id="family_values" class="form-control select2">
                                        <option value="">-- Select Family Values --</option>
                                        <option value="orthodox">Orthodox</option>
                                        <option value="traditional">Traditional</option>
                                        <option value="conservative">Conservative</option>
                                        <option value="moderate">Moderate</option>
                                        <option value="liberal">Liberal</option>
                                        <option value="progressive">Progressive</option>
                                        <option value="spiritual">Spiritual</option>
                                        <option value="prefer_not_to_say">Prefer Not to Say</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="registering_for">Registering For</label>
                                    <select name="registering_for" id="registering_for" class="form-control select2">
                                        <option value="">-- Select Registering For --</option>
                                        <option value="self">Myself</option>
                                        <option value="son">Son</option>
                                        <option value="daughter">Daughter</option>
                                        <option value="brother">Brother</option>
                                        <option value="sister">Sister</option>
                                        <option value="relative">Relative</option>
                                        <option value="friend">Friend</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="education_field">Education Field</label>
                                    <select name="education_field" id="education_field" class="form-control select2">
                                        <option value="">-- Select Education Field --</option>
                                        <option value="Arts & Humanities">Arts & Humanities</option>
                                        <option value="Commerce">Commerce</option>
                                        <option value="Science">Science</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Medical">Medical</option>
                                        <option value="Law">Law</option>
                                        <option value="Management">Management</option>
                                        <option value="Computers / IT">Computers / IT</option>
                                        <option value="Education / Teaching">Education / Teaching</option>
                                        <option value="Architecture">Architecture</option>
                                        <option value="Design / Fashion">Design / Fashion</option>
                                        <option value="Social Sciences">Social Sciences</option>
                                        <option value="Journalism / Media">Journalism / Media</option>
                                        <option value="Finance / Accounting">Finance / Accounting</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                        <option value="Nursing">Nursing</option>
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Hospitality / Tourism">Hospitality / Tourism</option>
                                        <option value="Aviation">Aviation</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="degree">Degree</label>
                                    <input type="text" name="degree" id="degree" class="form-control" placeholder="e.g., B.Sc, M.A">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="occupation">Occupation</label>
                                    <select name="occupation" id="occupation" class="form-control select2">
                                        <option value="">-- Select Occupation --</option>
                                        <option value="Not Working">Not Working</option>
                                        <option value="Student">Student</option>
                                        <option value="Government Employee">Government Employee</option>
                                        <option value="Private Job">Private Job</option>
                                        <option value="Business">Business</option>
                                        <option value="Self Employed">Self Employed</option>
                                        <option value="Entrepreneur">Entrepreneur</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Engineer">Engineer</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Professor">Professor</option>
                                        <option value="Lawyer">Lawyer</option>
                                        <option value="Scientist">Scientist</option>
                                        <option value="Architect">Architect</option>
                                        <option value="Artist">Artist</option>
                                        <option value="Actor">Actor</option>
                                        <option value="Model">Model</option>
                                        <option value="Journalist">Journalist</option>
                                        <option value="Banker">Banker</option>
                                        <option value="Accountant">Accountant</option>
                                        <option value="Civil Services (IAS/IPS/IRS)">Civil Services (IAS/IPS/IRS)</option>
                                        <option value="Defense Personnel">Defense Personnel</option>
                                        <option value="Pilot">Pilot</option>
                                        <option value="Chef">Chef</option>
                                        <option value="Designer">Designer</option>
                                        <option value="Sports Person">Sports Person</option>
                                        <option value="Social Worker">Social Worker</option>
                                        <option value="Retired">Retired</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="annual_income">Annual Income</label>
                                    <input type="text" name="annual_income" id="annual_income" class="form-control" placeholder="e.g., $50,000 / ₹10,00,000">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="small mb-1" for="work_location">Work Location</label>
                                    <input type="text" name="work_location" id="work_location" class="form-control" placeholder="City, Country">
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <button type="button" class="btn btn-transparent-dark" id="resetForm">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header">Search Results</div>
                    <div class="card-body">
                        
                        <table class="table table-bordered table-hover" id="searchResults">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Religion</th>
                                    <th>City</th>
                                    <th>Profile Source</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


@push('scripts')
<script>
$(document).ready(function() {
    // Initialize Select2
     // Initialize Select2 with Bootstrap 5 theme
    $('.select2').select2({
        theme: 'bootstrap',
        placeholder: function() {
            return $(this).data('placeholder') || 'Select options';
        },
        allowClear: true,
        width: '100%'
    });

  

    // AJAX Search
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            url: '{{ route("services.reports.search") }}',
            type: 'GET',
            data: formData,
            success: function(response) {
                let tbody = $('#searchResults tbody');
                tbody.empty();
                if (response.data && response.data.length > 0) {
                    response.data.forEach(function(profile) {
                        let age = profile.dob ? Math.floor((new Date() - new Date(profile.dob)) / (365.25 * 24 * 60 * 60 * 1000)) : 'N/A';
                        let city = profile.work_location ? profile.work_location.split(',').pop().trim() : profile.place_of_birth ? profile.place_of_birth.split(',').pop().trim() : 'N/A';
                        let row = `
                            <tr>
                                <td>${profile.name || 'N/A'}</td>
                                <td>${age}</td>
                                <td>${profile.gender || 'N/A'}</td>
                                <td>${profile.religion || 'N/A'}</td>
                                <td>${city}</td>
                                <td>${profile.created_by || 'N/A'}</td>
                                <td>
                                    <a target="_blank" href="${profile.id ? '{{ route("admin.profiles.show", ":id") }}'.replace(':id', profile.id) : '#'}" >
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>`;
                        tbody.append(row);
                    });
                } else {
                    tbody.append('<tr><td colspan="7" class="text-center">No profiles found</td></tr>');
                }
            },
            error: function(xhr) {
                alert('Error searching profiles: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    });

    // Reset Form
    $('#resetForm, #clearFilters').on('click', function() {
        $('#searchForm')[0].reset();
        $('.select2').val(null).trigger('change');
        $('#searchResults tbody').empty();
    });
});


</script>
@endpush