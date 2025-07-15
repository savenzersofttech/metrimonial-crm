@extends('layouts.main')
@section('title', 'All Lead')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('services.profile-reports.index') ? 'active' : '' }}"
                                    href="{{ route('services.profile-reports.index') }}">All Profiles <span
                                        class="badge badge-white">10</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Male <span class="badge badge-primary">5</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Female <span class="badge badge-primary">5</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Self <span class="badge badge-primary">4</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Shaadi.com <span class="badge badge-primary">2</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bharat Matrimony <span
                                        class="badge badge-primary">1</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Referral <span class="badge badge-primary">1</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Jeevansathi <span
                                        class="badge badge-primary">2</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <!-- Search Form -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Search Profiles</h5>
                        <form class="row g-4" method="GET" action="{{ route('services.profile-reports.index') }}">
                            <!-- Partner Preferences -->
                            <div class="col-12">
                                <h6 class="text-muted">Partner Preferences</h6>
                                <hr class="my-2">
                            </div>
                            <div class="col-md-4">
                                <label for="pref_age_min" class="form-label">Preferred Age Range</label>
                                <div class="d-flex">
                                    <select name="pref_age_min" id="pref_age_min" class="form-control me-2 select2">
                                        @for ($i = 18; $i <= 50; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="pref_age_max" id="pref_age_max" class="form-control select2">
                                        @for ($i = 18; $i <= 50; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pref_height_min" class="form-label">Preferred Height Range (ft-in)</label>
                                <div class="d-flex">
                                    <select name="pref_height_min" id="pref_height_min" class="form-control me-2 select2">
                                        @for ($ft = 4; $ft <= 7; $ft++)
                                            @for ($in = $ft == 4 ? 1 : 0; $in <= ($ft == 7 ? 11 : 11); $in++)
                                                <option value="{{ $ft }}-{{ $in }}">
                                                    {{ $ft }}'{{ $in }}"</option>
                                            @endfor
                                        @endfor
                                    </select>
                                    <select name="pref_height_max" id="pref_height_max" class="form-control select2">
                                        @for ($ft = 4; $ft <= 7; $ft++)
                                            @for ($in = $ft == 4 ? 1 : 0; $in <= ($ft == 7 ? 11 : 11); $in++)
                                                <option value="{{ $ft }}-{{ $in }}">
                                                    {{ $ft }}'{{ $in }}"</option>
                                            @endfor
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pref_location" class="form-label">Preferred Location</label>
                                <input type="text" name="pref_location" id="pref_location" class="form-control"
                                    placeholder="e.g., Delhi, Mumbai, USA">
                            </div>
                            <div class="col-md-4">
                                <label for="pref_income" class="form-label">Preferred Annual Income</label>
                                <select name="pref_income" id="pref_income" class="form-control">
                                    <option value="" disabled selected>Select your preferred income range</option>
                                    <option value="1-2 Lac">₹1 – ₹2 Lac</option>
                                    <option value="2-5 Lac">₹2 – ₹5 Lac</option>
                                    <option value="5-10 Lac">₹5 – ₹10 Lac</option>
                                    <option value="10-15 Lac">₹10 – ₹15 Lac</option>
                                    <option value="15-20 Lac">₹15 – ₹20 Lac</option>
                                    <option value="20-25 Lac">₹20 – ₹25 Lac</option>
                                    <option value="25-50 Lac">₹25 – ₹50 Lac</option>
                                    <option value="50-70 Lac">₹50 – ₹70 Lac</option>
                                    <option value="70 Lac–1 Cr">₹70 Lac – ₹1 Cr</option>
                                    <option value="1-2 Cr">₹1 Cr – ₹2 Cr</option>
                                    <option value="2-3 Cr">₹2 Cr – ₹3 Cr</option>
                                    <option value="3 Cr and above">₹3 Cr and above</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="pref_marital_status" class="form-label">Preferred Marital Status</label>
                                <select name="pref_marital_status" id="pref_marital_status" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Never Married">Never Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Annulled">Annulled</option>
                                    <option value="Awaiting Divorce">Awaiting Divorce</option>
                                </select>
                            </div>

                            
                            <div class="col-md-4">
                                <label for="pref_mother_tongue" class="form-label">Preferred Mother Tongue</label>
                                <select name="pref_mother_tongue" id="pref_mother_tongue" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="English">English</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Punjabi">Punjabi</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="manglik_status" class="form-label">Manglik Status</label>
                                <select name="manglik_status" id="manglik_status" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                </select>
                            </div>

                            <!-- Education & Career -->
                            <div class="col-12 mt-4">
                                <h6 class="text-muted">Education & Career</h6>
                                <hr class="my-2">
                            </div>
                            <div class="col-md-4">
                                <label for="education_level" class="form-label">Education Level</label>
                                <select name="education_level" id="education_level" class="form-control">
                                    <option value="">Select</option>
                                    <option value="High School">High School</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Bachelor's">Bachelor's</option>
                                    <option value="Master's">Master's</option>
                                    <option value="Doctorate / PhD">Doctorate / PhD</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="education_field" class="form-label">Education Field</label>
                                <select name="education_field" id="education_field" class="form-control">
                                    <option value="">Select</option>
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
                            <div class="col-md-4">
                                <label for="profession" class="form-label">Profession / Career</label>
                                <input type="text" name="profession" id="profession" class="form-control"
                                    placeholder="e.g., Software Engineer">
                            </div>
                            <div class="col-md-4">
                                <label for="job_sector" class="form-label">Job Sector</label>
                                <select name="job_sector" id="job_sector" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Government / Civil Services">Government / Civil Services</option>
                                    <option value="Private Sector">Private Sector</option>
                                    <option value="Public Sector / PSU">Public Sector / PSU</option>
                                    <option value="Business / Self Employed">Business / Self Employed</option>
                                    <option value="Not Working">Not Working</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button class="btn btn-primary" type="submit">Search Profiles</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Results Table -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Search Results</h5>
                        <div class="table-responsive">
                            <table class="table table-striped" id="profileTable">
                                <thead>
                                    <tr>
                                        <th class="pt-2">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" id="selectAll" class="custom-control-input">
                                                <label for="selectAll" class="custom-control-label"> </label>
                                            </div>
                                        </th>
                                        <th><a href="#" class="sort-link">Name</a></th>
                                        <th><a href="#" class="sort-link">Age</a></th>
                                        <th><a href="#" class="sort-link">Gender</a></th>
                                        <th><a href="#" class="sort-link">Religion</a></th>
                                        <th><a href="#" class="sort-link">City</a></th>
                                        <th><a href="#" class="sort-link">Profile Source</a></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-1" value="1">
                                                <label for="checkbox-1" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Rahul Sharma</td>
                                        <td>29</td>
                                        <td>Male</td>
                                        <td>Hindu</td>
                                        <td>Delhi</td>
                                        <td>Self</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 1) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 1) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-1').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-1"
                                                    action="{{ route('services.profile-reports.destroy', 1) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-2" value="2">
                                                <label for="checkbox-2" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Neha Patel</td>
                                        <td>26</td>
                                        <td>Female</td>
                                        <td>Hindu</td>
                                        <td>Mumbai</td>
                                        <td>Shaadi.com</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 2) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 2) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-2').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-2"
                                                    action="{{ route('services.profile-reports.destroy', 2) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-3" value="3">
                                                <label for="checkbox-3" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Amit Verma</td>
                                        <td>30</td>
                                        <td>Male</td>
                                        <td>Hindu</td>
                                        <td>Lucknow</td>
                                        <td>Bharat Matrimony</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 3) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 3) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-3').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-3"
                                                    action="{{ route('services.profile-reports.destroy', 3) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-4" value="4">
                                                <label for="checkbox-4" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Sneha Rao</td>
                                        <td>27</td>
                                        <td>Female</td>
                                        <td>Hindu</td>
                                        <td>Pune</td>
                                        <td>Referral</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 4) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 4) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-4').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-4"
                                                    action="{{ route('services.profile-reports.destroy', 4) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-5" value="5">
                                                <label for="checkbox-5" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Ravi Singh</td>
                                        <td>32</td>
                                        <td>Male</td>
                                        <td>Hindu</td>
                                        <td>Noida</td>
                                        <td>Self</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 5) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 5) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-5').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-5"
                                                    action="{{ route('services.profile-reports.destroy', 5) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-6" value="6">
                                                <label for="checkbox-6" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Isha Mehta</td>
                                        <td>28</td>
                                        <td>Female</td>
                                        <td>Hindu</td>
                                        <td>Ahmedabad</td>
                                        <td>Jeevansathi</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 6) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 6) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-6').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-6"
                                                    action="{{ route('services.profile-reports.destroy', 6) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-7" value="7">
                                                <label for="checkbox-7" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Ajay Desai</td>
                                        <td>31</td>
                                        <td>Male</td>
                                        <td>Hindu</td>
                                        <td>Chennai</td>
                                        <td>Self</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 7) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 7) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-7').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-7"
                                                    action="{{ route('services.profile-reports.destroy', 7) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-8" value="8">
                                                <label for="checkbox-8" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Priti Shah</td>
                                        <td>25</td>
                                        <td>Female</td>
                                        <td>Hindu</td>
                                        <td>Surat</td>
                                        <td>Self</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 8) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 8) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-8').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-8"
                                                    action="{{ route('services.profile-reports.destroy', 8) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-9" value="9">
                                                <label for="checkbox-9" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Kunal Joshi</td>
                                        <td>33</td>
                                        <td>Male</td>
                                        <td>Hindu</td>
                                        <td>Bangalore</td>
                                        <td>Shaadi.com</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 9) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 9) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-9').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-9"
                                                    action="{{ route('services.profile-reports.destroy', 9) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="profileCheckbox custom-control-input"
                                                    id="checkbox-10" value="10">
                                                <label for="checkbox-10" class="custom-control-label"> </label>
                                            </div>
                                        </td>
                                        <td>Divya Kapoor</td>
                                        <td>29</td>
                                        <td>Female</td>
                                        <td>Hindu</td>
                                        <td>Hyderabad</td>
                                        <td>Self</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('services.profile-reports.show', 10) }}"
                                                    class="text-info m-1" title="View">
                                                    <i class="fas fa-eye fa-lg"></i>
                                                </a>
                                                <a href="{{ route('services.profile-reports.edit', 10) }}"
                                                    class="text-warning m-1" title="Edit">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" class="text-danger m-1" title="Trash"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-10').submit();">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                                <form id="delete-form-10"
                                                    action="{{ route('services.profile-reports.destroy', 10) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button id="sendProfilesBtn" class="btn btn-success mt-3 d-none" data-bs-toggle="modal"
                            data-bs-target="#sendProfilesModal">Send Selected Profiles</button>
                        <div class="float-end">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="visually-hidden">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="visually-hidden">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Send Profiles Modal -->
                <div class="modal fade" id="sendProfilesModal" tabindex="-1" aria-labelledby="sendProfilesModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sendProfilesModalLabel">Send Profiles</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="sendProfilesForm" method="POST"
                                    action="{{ route('services.profile-reports.send') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="recipient_email" class="form-label">Recipient Email</label>
                                        <input type="email" name="recipient_email" id="recipient_email"
                                            class="form-control" placeholder="Enter recipient email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient_name" class="form-label">Recipient Name</label>
                                        <input type="text" name="recipient_name" id="recipient_name"
                                            class="form-control" placeholder="Enter recipient name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message"></textarea>
                                    </div>
                                    <input type="hidden" name="selected_profiles" id="selected_profiles">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" form="sendProfilesForm">Send
                                    Profiles</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script>
        // Select All Checkbox Functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.profileCheckbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            toggleSendButton();
        });

        // Individual Checkbox Functionality
        document.querySelectorAll('.profileCheckbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectAll = document.getElementById('selectAll');
                const checkboxes = document.querySelectorAll('.profileCheckbox');
                selectAll.checked = Array.from(checkboxes).every(cb => cb.checked);
                toggleSendButton();
            });
        });

        // Toggle Send Profiles Button and Update Hidden Input
        function toggleSendButton() {
            const checkboxes = document.querySelectorAll('.profileCheckbox:checked');
            const sendButton = document.getElementById('sendProfilesBtn');
            const selectedProfilesInput = document.getElementById('selected_profiles');
            sendButton.classList.toggle('d-none', checkboxes.length === 0);
            const selectedIds = Array.from(checkboxes).map(cb => cb.value);
            selectedProfilesInput.value = selectedIds.join(',');
        }
    </script>
@endsection
