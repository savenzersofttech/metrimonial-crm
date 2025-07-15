@extends('layouts.main')
@section('title', 'Add New Profile')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="mb-0">Profile add </h4>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>

                    </div>




                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.profiles.store') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Personal Details --}}
                            <h5>Personal Details</h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Full Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter full name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control select2">
                                        <option value="" disabled {{ old('gender') ? '' : 'selected' }}>-- Select Gender --</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Contact Number <sup class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <select id="country_code" name="country_code" class="form-control select2"
                                            style="max-width: 150px;" >
                                            <option value="" {{ old('country_code') ? '' : 'selected' }}>Code</option>
                                        </select>
                                        <input type="text" id="phone" name="phone" maxlength="15"
                                            class="form-control" placeholder="Enter number" value="{{ old('phone') }}" >
                                    </div>
                                    @error('country_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="example@email.com" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                                    @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="religion">Religion</label>
                                    <select id="religion" name="religion" class="form-control select2">
                                        <option value="" disabled {{ old('religion') ? '' : 'selected' }}>-- Select Religion --</option>
                                        <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Muslim" {{ old('religion') == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                                        <option value="Christian" {{ old('religion') == 'Christian' ? 'selected' : '' }}>Christian</option>
                                        <option value="Sikh" {{ old('religion') == 'Sikh' ? 'selected' : '' }}>Sikh</option>
                                        <option value="Parsi" {{ old('religion') == 'Parsi' ? 'selected' : '' }}>Parsi</option>
                                        <option value="Jain" {{ old('religion') == 'Jain' ? 'selected' : '' }}>Jain</option>
                                        <option value="Buddhist" {{ old('religion') == 'Buddhist' ? 'selected' : '' }}>Buddhist</option>
                                        <option value="Jewish" {{ old('religion') == 'Jewish' ? 'selected' : '' }}>Jewish</option>
                                        <option value="No Religion" {{ old('religion') == 'No Religion' ? 'selected' : '' }}>No Religion</option>
                                        <option value="Spiritual - not religious" {{ old('religion') == 'Spiritual - not religious' ? 'selected' : '' }}>Spiritual - not religious</option>
                                        <option value="Other" {{ old('religion') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('religion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Community</label>
                                    <select id="community" name="community" class="form-control select2">
                                        <option value="" disabled {{ old('community') ? '' : 'selected' }}>-- Select Community --</option>
                                        <optgroup label="Hindu">
                                            <option value="Agarwal" {{ old('community') == 'Agarwal' ? 'selected' : '' }}>Agarwal</option>
                                            <option value="Arora" {{ old('community') == 'Arora' ? 'selected' : '' }}>Arora</option>
                                            <option value="Brahmin" {{ old('community') == 'Brahmin' ? 'selected' : '' }}>Brahmin</option>
                                            <option value="Chaudhary" {{ old('community') == 'Chaudhary' ? 'selected' : '' }}>Chaudhary</option>
                                            <option value="Gupta" {{ old('community') == 'Gupta' ? 'selected' : '' }}>Gupta</option>
                                            <option value="Jat" {{ old('community') == 'Jat' ? 'selected' : '' }}>Jat</option>
                                            <option value="Kayastha" {{ old('community') == 'Kayastha' ? 'selected' : '' }}>Kayastha</option>
                                            <option value="Khatri" {{ old('community') == 'Khatri' ? 'selected' : '' }}>Khatri</option>
                                            <option value="Kshatriya" {{ old('community') == 'Kshatriya' ? 'selected' : '' }}>Kshatriya</option>
                                            <option value="Maratha" {{ old('community') == 'Maratha' ? 'selected' : '' }}>Maratha</option>
                                            <option value="Marwari" {{ old('community') == 'Marwari' ? 'selected' : '' }}>Marwari</option>
                                            <option value="Nair" {{ old('community') == 'Nair' ? 'selected' : '' }}>Nair</option>
                                            <option value="Patel" {{ old('community') == 'Patel' ? 'selected' : '' }}>Patel</option>
                                            <option value="Rajput" {{ old('community') == 'Rajput' ? 'selected' : '' }}>Rajput</option>
                                            <option value="Reddy" {{ old('community') == 'Reddy' ? 'selected' : '' }}>Reddy</option>
                                            <option value="Sindhi" {{ old('community') == 'Sindhi' ? 'selected' : '' }}>Sindhi</option>
                                            <option value="Yadav" {{ old('community') == 'Yadav' ? 'selected' : '' }}>Yadav</option>
                                            <option value="Iyer" {{ old('community') == 'Iyer' ? 'selected' : '' }}>Iyer</option>
                                            <option value="Iyengar" {{ old('community') == 'Iyengar' ? 'selected' : '' }}>Iyengar</option>
                                            <option value="Chettiar" {{ old('community') == 'Chettiar' ? 'selected' : '' }}>Chettiar</option>
                                            <option value="Gounder" {{ old('community') == 'Gounder' ? 'selected' : '' }}>Gounder</option>
                                            <option value="Mudaliar" {{ old('community') == 'Mudaliar' ? 'selected' : '' }}>Mudaliar</option>
                                            <option value="Nadar" {{ old('community') == 'Nadar' ? 'selected' : '' }}>Nadar</option>
                                            <option value="Pillai" {{ old('community') == 'Pillai' ? 'selected' : '' }}>Pillai</option>
                                            <option value="Vokkaliga" {{ old('community') == 'Vokkaliga' ? 'selected' : '' }}>Vokkaliga</option>
                                        </optgroup>
                                        <optgroup label="Muslim">
                                            <option value="Sunni" {{ old('community') == 'Sunni' ? 'selected' : '' }}>Sunni</option>
                                            <option value="Shia" {{ old('community') == 'Shia' ? 'selected' : '' }}>Shia</option>
                                            <option value="Memon" {{ old('community') == 'Memon' ? 'selected' : '' }}>Memon</option>
                                            <option value="Khoja" {{ old('community') == 'Khoja' ? 'selected' : '' }}>Khoja</option>
                                            <option value="Syed" {{ old('community') == 'Syed' ? 'selected' : '' }}>Syed</option>
                                            <option value="Pathan" {{ old('community') == 'Pathan' ? 'selected' : '' }}>Pathan</option>
                                        </optgroup>
                                        <optgroup label="Christian">
                                            <option value="Catholic" {{ old('community') == 'Catholic' ? 'selected' : '' }}>Catholic</option>
                                            <option value="Protestant" {{ old('community') == 'Protestant' ? 'selected' : '' }}>Protestant</option>
                                            <option value="Born Again" {{ old('community') == 'Born Again' ? 'selected' : '' }}>Born Again</option>
                                            <option value="Orthodox" {{ old('community') == 'Orthodox' ? 'selected' : '' }}>Orthodox</option>
                                        </optgroup>
                                        <optgroup label="Sikh">
                                            <option value="Ramgarhia" {{ old('community') == 'Ramgarhia' ? 'selected' : '' }}>Ramgarhia</option>
                                            <option value="Jat Sikh" {{ old('community') == 'Jat Sikh' ? 'selected' : '' }}>Jat Sikh</option>
                                            <option value="Khatri Sikh" {{ old('community') == 'Khatri Sikh' ? 'selected' : '' }}>Khatri Sikh</option>
                                        </optgroup>
                                        <optgroup label="Jain">
                                            <option value="Digambar" {{ old('community') == 'Digambar' ? 'selected' : '' }}>Digambar</option>
                                            <option value="Shwetambar" {{ old('community') == 'Shwetambar' ? 'selected' : '' }}>Shwetambar</option>
                                            <option value="Terapanthi" {{ old('community') == 'Terapanthi' ? 'selected' : '' }}>Terapanthi</option>
                                        </optgroup>
                                        <optgroup label="Other Communities">
                                            <option value="Parsi" {{ old('community') == 'Parsi' ? 'selected' : '' }}>Parsi</option>
                                            <option value="Zoroastrian" {{ old('community') == 'Zoroastrian' ? 'selected' : '' }}>Zoroastrian</option>
                                            <option value="Other" {{ old('community') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </optgroup>
                                    </select>
                                    @error('community')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="marital_status">Marital Status</label>
                                    <select name="marital_status" id="marital_status" class="form-control select2">
                                        <option value="" disabled {{ old('marital_status') ? '' : 'selected' }}>-- Select Status --</option>
                                        <option value="unmarried" {{ old('marital_status') == 'unmarried' ? 'selected' : '' }}>Unmarried</option>
                                        <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                                        <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                        <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                        <option value="separated" {{ old('marital_status') == 'separated' ? 'selected' : '' }}>Separated</option>
                                        <option value="awaiting_divorce" {{ old('marital_status') == 'awaiting_divorce' ? 'selected' : '' }}>Awaiting Divorce</option>
                                        <option value="annulled" {{ old('marital_status') == 'annulled' ? 'selected' : '' }}>Annulled</option>
                                        <option value="prefer_not_to_say" {{ old('marital_status') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer Not to Say</option>
                                    </select>
                                    @error('marital_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mother_tongue">Mother Tongue</label>
                                    <select id="mother_tongue" data-placeholder="-- Select Mother Tongue --"
                                        name="mother_tongue" class="form-control select2" multiple>
                                        <option value="Assamese" {{ in_array('Assamese', old('mother_tongue', [])) ? 'selected' : '' }}>Assamese</option>
                                        <option value="Bengali" {{ in_array('Bengali', old('mother_tongue', [])) ? 'selected' : '' }}>Bengali</option>
                                        <option value="Bhojpuri" {{ in_array('Bhojpuri', old('mother_tongue', [])) ? 'selected' : '' }}>Bhojpuri</option>
                                        <option value="Dogri" {{ in_array('Dogri', old('mother_tongue', [])) ? 'selected' : '' }}>Dogri</option>
                                        <option value="English" {{ in_array('English', old('mother_tongue', [])) ? 'selected' : '' }}>English</option>
                                        <option value="Garhwali" {{ in_array('Garhwali', old('mother_tongue', [])) ? 'selected' : '' }}>Garhwali</option>
                                        <option value="Gujarati" {{ in_array('Gujarati', old('mother_tongue', [])) ? 'selected' : '' }}>Gujarati</option>
                                        <option value="Haryanvi" {{ in_array('Haryanvi', old('mother_tongue', [])) ? 'selected' : '' }}>Haryanvi</option>
                                        <option value="Hindi" {{ in_array('Hindi', old('mother_tongue', [])) ? 'selected' : '' }}>Hindi</option>
                                        <option value="Kashmiri" {{ in_array('Kashmiri', old('mother_tongue', [])) ? 'selected' : '' }}>Kashmiri</option>
                                        <option value="Khandeshi" {{ in_array('Khandeshi', old('mother_tongue', [])) ? 'selected' : '' }}>Khandeshi</option>
                                        <option value="Konkani" {{ in_array('Konkani', old('mother_tongue', [])) ? 'selected' : '' }}>Konkani</option>
                                        <option value="Kodava" {{ in_array('Kodava', old('mother_tongue', [])) ? 'selected' : '' }}>Kodava</option>
                                        <option value="Kannada" {{ in_array('Kannada', old('mother_tongue', [])) ? 'selected' : '' }}>Kannada</option>
                                        <option value="Maithili" {{ in_array('Maithili', old('mother_tongue', [])) ? 'selected' : '' }}>Maithili</option>
                                        <option value="Malayalam" {{ in_array('Malayalam', old('mother_tongue', [])) ? 'selected' : '' }}>Malayalam</option>
                                        <option value="Manipuri" {{ in_array('Manipuri', old('mother_tongue', [])) ? 'selected' : '' }}>Manipuri</option>
                                        <option value="Marathi" {{ in_array('Marathi', old('mother_tongue', [])) ? 'selected' : '' }}>Marathi</option>
                                        <option value="Marwari" {{ in_array('Marwari', old('mother_tongue', [])) ? 'selected' : '' }}>Marwari</option>
                                        <option value="Mizo" {{ in_array('Mizo', old('mother_tongue', [])) ? 'selected' : '' }}>Mizo</option>
                                        <option value="Nagpuri" {{ in_array('Nagpuri', old('mother_tongue', [])) ? 'selected' : '' }}>Nagpuri</option>
                                        <option value="Nepali" {{ in_array('Nepali', old('mother_tongue', [])) ? 'selected' : '' }}>Nepali</option>
                                        <option value="Odia" {{ in_array('Odia', old('mother_tongue', [])) ? 'selected' : '' }}>Odia</option>
                                        <option value="Punjabi" {{ in_array('Punjabi', old('mother_tongue', [])) ? 'selected' : '' }}>Punjabi</option>
                                        <option value="Rajasthani" {{ in_array('Rajasthani', old('mother_tongue', [])) ? 'selected' : '' }}>Rajasthani</option>
                                        <option value="Sanskrit" {{ in_array('Sanskrit', old('mother_tongue', [])) ? 'selected' : '' }}>Sanskrit</option>
                                        <option value="Santhali" {{ in_array('Santhali', old('mother_tongue', [])) ? 'selected' : '' }}>Santhali</option>
                                        <option value="Sindhi" {{ in_array('Sindhi', old('mother_tongue', [])) ? 'selected' : '' }}>Sindhi</option>
                                        <option value="Sourashtra" {{ in_array('Sourashtra', old('mother_tongue', [])) ? 'selected' : '' }}>Sourashtra</option>
                                        <option value="Tamil" {{ in_array('Tamil', old('mother_tongue', [])) ? 'selected' : '' }}>Tamil</option>
                                        <option value="Telugu" {{ in_array('Telugu', old('mother_tongue', [])) ? 'selected' : '' }}>Telugu</option>
                                        <option value="Tulu" {{ in_array('Tulu', old('mother_tongue', [])) ? 'selected' : '' }}>Tulu</option>
                                        <option value="Urdu" {{ in_array('Urdu', old('mother_tongue', [])) ? 'selected' : '' }}>Urdu</option>
                                        <option value="Others" {{ in_array('Others', old('mother_tongue', [])) ? 'selected' : '' }}>Others</option>
                                    </select>
                                    @error('mother_tongue')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Diet</label>
                                    <select name="diet" data-placeholder="-- Select Diet --" class="form-control select2" multiple>
                                        <option value="Veg" {{ in_array('Veg', old('diet', [])) ? 'selected' : '' }}>Veg</option>
                                        <option value="Non-Veg" {{ in_array('Non-Veg', old('diet', [])) ? 'selected' : '' }}>Non-Veg</option>
                                        <option value="Occasionally Non-Veg" {{ in_array('Occasionally Non-Veg', old('diet', [])) ? 'selected' : '' }}>Occasionally Non-Veg</option>
                                        <option value="Eggetarian" {{ in_array('Eggetarian', old('diet', [])) ? 'selected' : '' }}>Eggetarian</option>
                                        <option value="Jain" {{ in_array('Jain', old('diet', [])) ? 'selected' : '' }}>Jain</option>
                                        <option value="Vegan" {{ in_array('Vegan', old('diet', [])) ? 'selected' : '' }}>Vegan</option>
                                        <option value="No Onion No Garlic" {{ in_array('No Onion No Garlic', old('diet', [])) ? 'selected' : '' }}>No Onion No Garlic</option>
                                        <option value="Other" {{ in_array('Other', old('diet', [])) ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('diet')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Citizenship</label>
                                    <select name="citizenship" class="form-control select2">
                                        <option value="" disabled {{ old('citizenship') ? '' : 'selected' }}>-- Select Citizenship --</option>
                                        <option value="Indian" {{ old('citizenship') == 'Indian' ? 'selected' : '' }}>Indian</option>
                                        <option value="American" {{ old('citizenship') == 'American' ? 'selected' : '' }}>American</option>
                                        <option value="Canadian" {{ old('citizenship') == 'Canadian' ? 'selected' : '' }}>Canadian</option>
                                        <option value="British" {{ old('citizenship') == 'British' ? 'selected' : '' }}>British</option>
                                        <option value="Australian" {{ old('citizenship') == 'Australian' ? 'selected' : '' }}>Australian</option>
                                        <option value="New Zealander" {{ old('citizenship') == 'New Zealander' ? 'selected' : '' }}>New Zealander</option>
                                        <option value="Singaporean" {{ old('citizenship') == 'Singaporean' ? 'selected' : '' }}>Singaporean</option>
                                        <option value="Pakistani" {{ old('citizenship') == 'Pakistani' ? 'selected' : '' }}>Pakistani</option>
                                        <option value="Bangladeshi" {{ old('citizenship') == 'Bangladeshi' ? 'selected' : '' }}>Bangladeshi</option>
                                        <option value="Nepalese" {{ old('citizenship') == 'Nepalese' ? 'selected' : '' }}>Nepalese</option>
                                        <option value="Sri Lankan" {{ old('citizenship') == 'Sri Lankan' ? 'selected' : '' }}>Sri Lankan</option>
                                        <option value="UAE" {{ old('citizenship') == 'UAE' ? 'selected' : '' }}>UAE</option>
                                        <option value="Saudi Arabian" {{ old('citizenship') == 'Saudi Arabian' ? 'selected' : '' }}>Saudi Arabian</option>
                                        <option value="Qatari" {{ old('citizenship') == 'Qatari' ? 'selected' : '' }}>Qatari</option>
                                        <option value="Kuwaiti" {{ old('citizenship') == 'Kuwaiti' ? 'selected' : '' }}>Kuwaiti</option>
                                        <option value="Malaysian" {{ old('citizenship') == 'Malaysian' ? 'selected' : '' }}>Malaysian</option>
                                        <option value="Other" {{ old('citizenship') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('citizenship')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Drinking</label>
                                    <select name="drinking" data-placeholder="-- Select Drinking --" class="form-control select2" multiple>
                                        <option value="no" {{ in_array('no', old('drinking', [])) ? 'selected' : '' }}>No</option>
                                        <option value="yes" {{ in_array('yes', old('drinking', [])) ? 'selected' : '' }}>Yes</option>
                                        <option value="Occasionally" {{ in_array('Occasionally', old('drinking', [])) ? 'selected' : '' }}>Occasionally</option>
                                        <option value="prefer_not_to_say" {{ in_array('prefer_not_to_say', old('drinking', [])) ? 'selected' : '' }}>Prefer Not to Say</option>
                                    </select>
                                    @error('drinking')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Smoking</label>
                                    <select name="smoking" data-placeholder="-- Select Smoking --" class="form-control select2" multiple>
                                        <option value="No" {{ in_array('No', old('smoking', [])) ? 'selected' : '' }}>No</option>
                                        <option value="Yes" {{ in_array('Yes', old('smoking', [])) ? 'selected' : '' }}>Yes</option>
                                        <option value="Occasionally" {{ in_array('Occasionally', old('smoking', [])) ? 'selected' : '' }}>Occasionally</option>
                                        <option value="prefer_not_to_say" {{ in_array('prefer_not_to_say', old('smoking', [])) ? 'selected' : '' }}>Prefer Not to Say</option>
                                    </select>
                                    @error('smoking')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Blood Group</label>
                                    <select name="blood_group" data-placeholder="-- Select Blood Group --" class="form-control select2">
                                        <option value="" disabled {{ old('blood_group') ? '' : 'selected' }}>-- Select Blood Group --</option>
                                        <option value="Don't Know" {{ old('blood_group') == 'Don\'t Know' ? 'selected' : '' }}>Don't Know</option>
                                        <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                    </select>
                                    @error('blood_group')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Your Height</label>
                                    <select class="form-control select2" name="height">
                                        <option value="" disabled {{ old('height') ? '' : 'selected' }}>-- Select Height --</option>
                                        <option value="4ft 0in - 122cm" {{ old('height') == '4ft 0in - 122cm' ? 'selected' : '' }}>4ft 0in - 122cm</option>
                                        <option value="4ft 1in - 124cm" {{ old('height') == '4ft 1in - 124cm' ? 'selected' : '' }}>4ft 1in - 124cm</option>
                                        <option value="4ft 2in - 127cm" {{ old('height') == '4ft 2in - 127cm' ? 'selected' : '' }}>4ft 2in - 127cm</option>
                                        <option value="4ft 3in - 130cm" {{ old('height') == '4ft 3in - 130cm' ? 'selected' : '' }}>4ft 3in - 130cm</option>
                                        <option value="4ft 4in - 132cm" {{ old('height') == '4ft 4in - 132cm' ? 'selected' : '' }}>4ft 4in - 132cm</option>
                                        <option value="4ft 5in - 134cm" {{ old('height') == '4ft 5in - 134cm' ? 'selected' : '' }}>4ft 5in - 134cm</option>
                                        <option value="4ft 6in - 137cm" {{ old('height') == '4ft 6in - 137cm' ? 'selected' : '' }}>4ft 6in - 137cm</option>
                                        <option value="4ft 7in - 140cm" {{ old('height') == '4ft 7in - 140cm' ? 'selected' : '' }}>4ft 7in - 140cm</option>
                                        <option value="4ft 8in - 142cm" {{ old('height') == '4ft 8in - 142cm' ? 'selected' : '' }}>4ft 8in - 142cm</option>
                                        <option value="4ft 9in - 145cm" {{ old('height') == '4ft 9in - 145cm' ? 'selected' : '' }}>4ft 9in - 145cm</option>
                                        <option value="4ft 10in - 147cm" {{ old('height') == '4ft 10in - 147cm' ? 'selected' : '' }}>4ft 10in - 147cm</option>
                                        <option value="4ft 11in - 150cm" {{ old('height') == '4ft 11in - 150cm' ? 'selected' : '' }}>4ft 11in - 150cm</option>
                                        <option value="5ft 0in - 152cm" {{ old('height') == '5ft 0in - 152cm' ? 'selected' : '' }}>5ft 0in - 152cm</option>
                                        <option value="5ft 1in - 155cm" {{ old('height') == '5ft 1in - 155cm' ? 'selected' : '' }}>5ft 1in - 155cm</option>
                                        <option value="5ft 2in - 157cm" {{ old('height') == '5ft 2in - 157cm' ? 'selected' : '' }}>5ft 2in - 157cm</option>
                                        <option value="5ft 3in - 160cm" {{ old('height') == '5ft 3in - 160cm' ? 'selected' : '' }}>5ft 3in - 160cm</option>
                                        <option value="5ft 4in - 163cm" {{ old('height') == '5ft 4in - 163cm' ? 'selected' : '' }}>5ft 4in - 163cm</option>
                                        <option value="5ft 5in - 165cm" {{ old('height') == '5ft 5in - 165cm' ? 'selected' : '' }}>5ft 5in - 165cm</option>
                                        <option value="5ft 6in - 168cm" {{ old('height') == '5ft 6in - 168cm' ? 'selected' : '' }}>5ft 6in - 168cm</option>
                                        <option value="5ft 7in - 170cm" {{ old('height') == '5ft 7in - 170cm' ? 'selected' : '' }}>5ft 7in - 170cm</option>
                                        <option value="5ft 8in - 173cm" {{ old('height') == '5ft 8in - 173cm' ? 'selected' : '' }}>5ft 8in - 173cm</option>
                                        <option value="5ft 9in - 175cm" {{ old('height') == '5ft 9in - 175cm' ? 'selected' : '' }}>5ft 9in - 175cm</option>
                                        <option value="5ft 10in - 178cm" {{ old('height') == '5ft 10in - 178cm' ? 'selected' : '' }}>5ft 10in - 178cm</option>
                                        <option value="5ft 11in - 180cm" {{ old('height') == '5ft 11in - 180cm' ? 'selected' : '' }}>5ft 11in - 180cm</option>
                                        <option value="6ft 0in - 183cm" {{ old('height') == '6ft 0in - 183cm' ? 'selected' : '' }}>6ft 0in - 183cm</option>
                                        <option value="6ft 1in - 185cm" {{ old('height') == '6ft 1in - 185cm' ? 'selected' : '' }}>6ft 1in - 185cm</option>
                                        <option value="6ft 2in - 188cm" {{ old('height') == '6ft 2in - 188cm' ? 'selected' : '' }}>6ft 2in - 188cm</option>
                                        <option value="6ft 3in - 190cm" {{ old('height') == '6ft 3in - 190cm' ? 'selected' : '' }}>6ft 3in - 190cm</option>
                                        <option value="6ft 4in - 193cm" {{ old('height') == '6ft 4in - 193cm' ? 'selected' : '' }}>6ft 4in - 193cm</option>
                                        <option value="6ft 5in - 196cm" {{ old('height') == '6ft 5in - 196cm' ? 'selected' : '' }}>6ft 5in - 196cm</option>
                                        <option value="6ft 6in - 198cm" {{ old('height') == '6ft 6in - 198cm' ? 'selected' : '' }}>6ft 6in - 198cm</option>
                                        <option value="6ft 7in - 201cm" {{ old('height') == '6ft 7in - 201cm' ? 'selected' : '' }}>6ft 7in - 201cm</option>
                                        <option value="6ft 8in - 203cm" {{ old('height') == '6ft 8in - 203cm' ? 'selected' : '' }}>6ft 8in - 203cm</option>
                                        <option value="6ft 9in - 206cm" {{ old('height') == '6ft 9in - 206cm' ? 'selected' : '' }}>6ft 9in - 206cm</option>
                                        <option value="6ft 10in - 208cm" {{ old('height') == '6ft 10in - 208cm' ? 'selected' : '' }}>6ft 10in - 208cm</option>
                                        <option value="6ft 11in - 211cm" {{ old('height') == '6ft 11in - 211cm' ? 'selected' : '' }}>6ft 11in - 211cm</option>
                                        <option value="7ft 0in - 213cm" {{ old('height') == '7ft 0in - 213cm' ? 'selected' : '' }}>7ft 0in - 213cm</option>
                                        <option value="7ft 1in - 216cm" {{ old('height') == '7ft 1in - 216cm' ? 'selected' : '' }}>7ft 1in - 216cm</option>
                                        <option value="7ft 2in - 218cm" {{ old('height') == '7ft 2in - 218cm' ? 'selected' : '' }}>7ft 2in - 218cm</option>
                                        <option value="7ft 3in - 221cm" {{ old('height') == '7ft 3in - 221cm' ? 'selected' : '' }}>7ft 3in - 221cm</option>
                                        <option value="7ft 4in - 224cm" {{ old('height') == '7ft 4in - 224cm' ? 'selected' : '' }}>7ft 4in - 224cm</option>
                                        <option value="7ft 5in - 226cm" {{ old('height') == '7ft 5in - 226cm' ? 'selected' : '' }}>7ft 5in - 226cm</option>
                                        <option value="7ft 6in - 229cm" {{ old('height') == '7ft 6in - 229cm' ? 'selected' : '' }}>7ft 6in - 229cm</option>
                                        <option value="7ft 7in - 231cm" {{ old('height') == '7ft 7in - 231cm' ? 'selected' : '' }}>7ft 7in - 231cm</option>
                                        <option value="7ft 8in - 234cm" {{ old('height') == '7ft 8in - 234cm' ? 'selected' : '' }}>7ft 8in - 234cm</option>
                                        <option value="7ft 9in - 236cm" {{ old('height') == '7ft 9in - 236cm' ? 'selected' : '' }}>7ft 9in - 236cm</option>
                                    </select>
                                    @error('height')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Health Status</label>
                                    <select name="health_status" data-placeholder="-- Select Health Status --" class="form-control select2">
                                        <option value="" disabled {{ old('health_status') ? '' : 'selected' }}>-- Select Health Status --</option>
                                        <option value="Excellent" {{ old('health_status') == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                        <option value="Very Good" {{ old('health_status') == 'Very Good' ? 'selected' : '' }}>Very Good</option>
                                        <option value="Good" {{ old('health_status') == 'Good' ? 'selected' : '' }}>Good</option>
                                        <option value="Average" {{ old('health_status') == 'Average' ? 'selected' : '' }}>Average</option>
                                        <option value="Minor Allergies" {{ old('health_status') == 'Minor Allergies' ? 'selected' : '' }}>Minor Allergies</option>
                                        <option value="Diabetes" {{ old('health_status') == 'Diabetes' ? 'selected' : '' }}>Diabetes</option>
                                        <option value="Low BP" {{ old('health_status') == 'Low BP' ? 'selected' : '' }}>Low BP</option>
                                        <option value="High BP" {{ old('health_status') == 'High BP' ? 'selected' : '' }}>High BP</option>
                                        <option value="Heart Ailments" {{ old('health_status') == 'Heart Ailments' ? 'selected' : '' }}>Heart Ailments</option>
                                        <option value="Minor Chronic Condition" {{ old('health_status') == 'Minor Chronic Condition' ? 'selected' : '' }}>Minor Chronic Condition</option>
                                        <option value="Major Chronic Condition" {{ old('health_status') == 'Major Chronic Condition' ? 'selected' : '' }}>Major Chronic Condition</option>
                                        <option value="Differently Abled (Physically Challenged)" {{ old('health_status') == 'Differently Abled (Physically Challenged)' ? 'selected' : '' }}>Differently Abled (Physically Challenged)</option>
                                        <option value="Mental Health Condition" {{ old('health_status') == 'Mental Health Condition' ? 'selected' : '' }}>Mental Health Condition</option>
                                        <option value="Recovering from Illness/Injury" {{ old('health_status') == 'Recovering from Illness/Injury' ? 'selected' : '' }}>Recovering from Illness/Injury</option>
                                        <option value="Prefer Not to Say" {{ old('health_status') == 'Prefer Not to Say' ? 'selected' : '' }}>Prefer Not to Say</option>
                                    </select>
                                    @error('health_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Horoscope Status</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Time of Birth</label>
                                            <input type="time" name="time_of_birth" class="form-control"
                                                placeholder="Enter time of birth" value="{{ old('time_of_birth') }}">
                                            @error('time_of_birth')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <label>Place of Birth</label>
                                            <input type="text" name="place_of_birth" class="form-control"
                                                placeholder="Enter place of birth" value="{{ old('place_of_birth') }}">
                                            @error('place_of_birth')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Family Details (Collapsible) --}}
                                
                                 <h5>Family Details</h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Father's Profession</label>
                                        <input type="text" name="father_profession" class="form-control"
                                            placeholder="Enter father's profession" value="{{ old('father_profession') }}">
                                        @error('father_profession')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Mother's Profession</label>
                                        <input type="text" name="mother_profession" class="form-control"
                                            placeholder="Enter mother's profession" value="{{ old('mother_profession') }}">
                                        @error('mother_profession')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="brothers">Number of Brothers</label>
                                        <select name="brothers" id="brothers" class="form-control select2">
                                            <option value="" disabled {{ old('brothers') ? '' : 'selected' }}>-- Select --</option>
                                            @for ($i = 0; $i <= 10; $i++)
                                                <option value="{{ $i }}" {{ old('brothers') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('brothers')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 married_brothers">
                                        <label for="married_brothers">Married Brothers</label>
                                        <select name="married_brothers" id="married_brothers" class="form-control select2">
                                            <option value="" disabled {{ old('married_brothers') ? '' : 'selected' }}>-- Select --</option>
                                            @for ($i = 0; $i <= (old('brothers', 0)); $i++)
                                                <option value="{{ $i }}" {{ old('married_brothers') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('married_brothers')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="sisters">Number of Sisters</label>
                                        <select name="sisters" id="sisters" class="form-control select2">
                                            <option value="" disabled {{ old('sisters') ? '' : 'selected' }}>-- Select --</option>
                                            @for ($i = 0; $i <= 10; $i++)
                                                <option value="{{ $i }}" {{ old('sisters') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('sisters')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 married_sisters">
                                        <label for="married_sisters">Married Sisters</label>
                                        <select name="married_sisters" id="married_sisters" class="form-control select2">
                                            <option value="" disabled {{ old('married_sisters') ? '' : 'selected' }}>-- Select --</option>
                                            @for ($i = 0; $i <= (old('sisters', 0)); $i++)
                                                <option value="{{ $i }}" {{ old('married_sisters') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('married_sisters')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="family_affluence">Family Affluence</label>
                                        <select class="form-control select2" id="family_affluence" name="family_affluence">
                                            <option value="" disabled {{ old('family_affluence') ? '' : 'selected' }}>-- Select Family Affluence --</option>
                                            <option value="ultra_rich" {{ old('family_affluence') == 'ultra_rich' ? 'selected' : '' }}>Ultra Rich / Elite</option>
                                            <option value="wealthy_business" {{ old('family_affluence') == 'wealthy_business' ? 'selected' : '' }}>Wealthy / Business Class</option>
                                            <option value="affluent" {{ old('family_affluence') == 'affluent' ? 'selected' : '' }}>Affluent</option>
                                            <option value="upper_middle_class" {{ old('family_affluence') == 'upper_middle_class' ? 'selected' : '' }}>Upper Middle Class</option>
                                            <option value="middle_class" {{ old('family_affluence') == 'middle_class' ? 'selected' : '' }}>Middle Class</option>
                                            <option value="lower_middle_class" {{ old('family_affluence') == 'lower_middle_class' ? 'selected' : '' }}>Lower Middle Class</option>
                                            <option value="working_class" {{ old('family_affluence') == 'working_class' ? 'selected' : '' }}>Working Class</option>
                                            <option value="lower_class" {{ old('family_affluence') == 'lower_class' ? 'selected' : '' }}>Lower Class</option>
                                            <option value="below_poverty_line" {{ old('family_affluence') == 'below_poverty_line' ? 'selected' : '' }}>Below Poverty Line</option>
                                            <option value="prefer_not_to_say" {{ old('family_affluence') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer Not to Say</option>
                                        </select>
                                        @error('family_affluence')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="family_values">Family Values</label>
                                        <select class="form-control select2" id="family_values" name="family_values">
                                            <option value="" disabled {{ old('family_values') ? '' : 'selected' }}>-- Select Family Values --</option>
                                            <option value="orthodox" {{ old('family_values') == 'orthodox' ? 'selected' : '' }}>Orthodox</option>
                                            <option value="traditional" {{ old('family_values') == 'traditional' ? 'selected' : '' }}>Traditional</option>
                                            <option value="conservative" {{ old('family_values') == 'conservative' ? 'selected' : '' }}>Conservative</option>
                                            <option value="moderate" {{ old('family_values') == 'moderate' ? 'selected' : '' }}>Moderate</option>
                                            <option value="liberal" {{ old('family_values') == 'liberal' ? 'selected' : '' }}>Liberal</option>
                                            <option value="progressive" {{ old('family_values') == 'progressive' ? 'selected' : '' }}>Progressive</option>
                                            <option value="spiritual" {{ old('family_values') == 'spiritual' ? 'selected' : '' }}>Spiritual</option>
                                            <option value="prefer_not_to_say" {{ old('family_values') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer Not to Say</option>
                                        </select>
                                        @error('family_values')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Registering For</label>
                                        <select class="form-control select2" name="registering_for">
                                            <option value="" disabled {{ old('registering_for') ? '' : 'selected' }}>-- Registering For --</option>
                                            <option value="self" {{ old('registering_for') == 'self' ? 'selected' : '' }}>Myself</option>
                                            <option value="son" {{ old('registering_for') == 'son' ? 'selected' : '' }}>Son</option>
                                            <option value="daughter" {{ old('registering_for') == 'daughter' ? 'selected' : '' }}>Daughter</option>
                                            <option value="brother" {{ old('registering_for') == 'brother' ? 'selected' : '' }}>Brother</option>
                                            <option value="sister" {{ old('registering_for') == 'sister' ? 'selected' : '' }}>Sister</option>
                                            <option value="relative" {{ old('registering_for') == 'relative' ? 'selected' : '' }}>Relative</option>
                                            <option value="friend" {{ old('registering_for') == 'friend' ? 'selected' : '' }}>Friend</option>
                                            <option value="other" {{ old('registering_for') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('registering_for')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                     

                            {{-- Education Details (Collapsible) --}}
                             <h5>Education Details</h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>School / College Name</label>
                                        <input type="text" name="school_college_name" class="form-control"
                                            placeholder="Your School or College Name" value="{{ old('school_college_name') }}">
                                        @error('school_college_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Degree</label>
                                        <input type="text" name="degree" class="form-control"
                                            placeholder="e.g., B.Sc, M.A, Ph.D" value="{{ old('degree') }}">
                                        @error('degree')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Year of Passing</label>
                                        <select class="form-control select2" name="year_of_passing">
                                            <option value="" disabled {{ old('year_of_passing') ? '' : 'selected' }}>-- Select Year --</option>
                                            <option value="Pursuing" {{ old('year_of_passing') == 'Pursuing' ? 'selected' : '' }}>Appearing / Pursuing</option>
                                            @for ($year = date('Y'); $year >= 1950; $year--)
                                                <option value="{{ $year }}" {{ old('year_of_passing') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                        @error('year_of_passing')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                          
                                   {{-- Career Details (Collapsible) --}}
                                <h5>Career Details</h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Highest Qualification</label>
                                        <input type="text" name="highest_qualification" class="form-control"
                                            placeholder="e.g., MBA, B.Tech" value="{{ old('highest_qualification') }}">
                                        @error('highest_qualification')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Education Field</label>
                                        <select name="education_field" class="form-control select2">
                                            <option value="" disabled {{ old('education_field') ? '' : 'selected' }}>-- Select Education Field --</option>
                                            <option value="Arts & Humanities" {{ old('education_field') == 'Arts & Humanities' ? 'selected' : '' }}>Arts & Humanities</option>
                                            <option value="Commerce" {{ old('education_field') == 'Commerce' ? 'selected' : '' }}>Commerce</option>
                                            <option value="Science" {{ old('education_field') == 'Science' ? 'selected' : '' }}>Science</option>
                                            <option value="Engineering" {{ old('education_field') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                            <option value="Medical" {{ old('education_field') == 'Medical' ? 'selected' : '' }}>Medical</option>
                                            <option value="Law" {{ old('education_field') == 'Law' ? 'selected' : '' }}>Law</option>
                                            <option value="Management" {{ old('education_field') == 'Management' ? 'selected' : '' }}>Management</option>
                                            <option value="Computers / IT" {{ old('education_field') == 'Computers / IT' ? 'selected' : '' }}>Computers / IT</option>
                                            <option value="Education / Teaching" {{ old('education_field') == 'Education / Teaching' ? 'selected' : '' }}>Education / Teaching</option>
                                            <option value="Architecture" {{ old('education_field') == 'Architecture' ? 'selected' : '' }}>Architecture</option>
                                            <option value="Design / Fashion" {{ old('education_field') == 'Design / Fashion' ? 'selected' : '' }}>Design / Fashion</option>
                                            <option value="Social Sciences" {{ old('education_field') == 'Social Sciences' ? 'selected' : '' }}>Social Sciences</option>
                                            <option value="Journalism / Media" {{ old('education_field') == 'Journalism / Media' ? 'selected' : '' }}>Journalism / Media</option>
                                            <option value="Finance / Accounting" {{ old('education_field') == 'Finance / Accounting' ? 'selected' : '' }}>Finance / Accounting</option>
                                            <option value="Pharmacy" {{ old('education_field') == 'Pharmacy' ? 'selected' : '' }}>Pharmacy</option>
                                            <option value="Nursing" {{ old('education_field') == 'Nursing' ? 'selected' : '' }}>Nursing</option>
                                            <option value="Agriculture" {{ old('education_field') == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                                            <option value="Hospitality / Tourism" {{ old('education_field') == 'Hospitality / Tourism' ? 'selected' : '' }}>Hospitality / Tourism</option>
                                            <option value="Aviation" {{ old('education_field') == 'Aviation' ? 'selected' : '' }}>Aviation</option>
                                            <option value="Others" {{ old('education_field') == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                        @error('education_field')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Occupation</label>
                                        <select name="occupation" class="form-control select2">
                                            <option value="" disabled {{ old('occupation') ? '' : 'selected' }}>-- Select Occupation --</option>
                                            <option value="Not Working" {{ old('occupation') == 'Not Working' ? 'selected' : '' }}>Not Working</option>
                                            <option value="Student" {{ old('occupation') == 'Student' ? 'selected' : '' }}>Student</option>
                                            <option value="Government Employee" {{ old('occupation') == 'Government Employee' ? 'selected' : '' }}>Government Employee</option>
                                            <option value="Private Job" {{ old('occupation') == 'Private Job' ? 'selected' : '' }}>Private Job</option>
                                            <option value="Business" {{ old('occupation') == 'Business' ? 'selected' : '' }}>Business</option>
                                            <option value="Self Employed" {{ old('occupation') == 'Self Employed' ? 'selected' : '' }}>Self Employed</option>
                                            <option value="Entrepreneur" {{ old('occupation') == 'Entrepreneur' ? 'selected' : '' }}>Entrepreneur</option>
                                            <option value="Doctor" {{ old('occupation') == 'Doctor' ? 'selected' : '' }}>Doctor</option>
                                            <option value="Engineer" {{ old('occupation') == 'Engineer' ? 'selected' : '' }}>Engineer</option>
                                            <option value="Teacher" {{ old('occupation') == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                                            <option value="Professor" {{ old('occupation') == 'Professor' ? 'selected' : '' }}>Professor</option>
                                            <option value="Lawyer" {{ old('occupation') == 'Lawyer' ? 'selected' : '' }}>Lawyer</option>
                                            <option value="Scientist" {{ old('occupation') == 'Scientist' ? 'selected' : '' }}>Scientist</option>
                                            <option value="Architect" {{ old('occupation') == 'Architect' ? 'selected' : '' }}>Architect</option>
                                            <option value="Artist" {{ old('occupation') == 'Artist' ? 'selected' : '' }}>Artist</option>
                                            <option value="Actor" {{ old('occupation') == 'Actor' ? 'selected' : '' }}>Actor</option>
                                            <option value="Model" {{ old('occupation') == 'Model' ? 'selected' : '' }}>Model</option>
                                            <option value="Journalist" {{ old('occupation') == 'Journalist' ? 'selected' : '' }}>Journalist</option>
                                            <option value="Banker" {{ old('occupation') == 'Banker' ? 'selected' : '' }}>Banker</option>
                                            <option value="Accountant" {{ old('occupation') == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                                            <option value="Civil Services (IAS/IPS/IRS)" {{ old('occupation') == 'Civil Services (IAS/IPS/IRS)' ? 'selected' : '' }}>Civil Services (IAS/IPS/IRS)</option>
                                            <option value="Defense Personnel" {{ old('occupation') == 'Defense Personnel' ? 'selected' : '' }}>Defense Personnel</option>
                                            <option value="Pilot" {{ old('occupation') == 'Pilot' ? 'selected' : '' }}>Pilot</option>
                                            <option value="Chef" {{ old('occupation') == 'Chef' ? 'selected' : '' }}>Chef</option>
                                            <option value="Designer" {{ old('occupation') == 'Designer' ? 'selected' : '' }}>Designer</option>
                                            <option value="Sports Person" {{ old('occupation') == 'Sports Person' ? 'selected' : '' }}>Sports Person</option>
                                            <option value="Social Worker" {{ old('occupation') == 'Social Worker' ? 'selected' : '' }}>Social Worker</option>
                                            <option value="Retired" {{ old('occupation') == 'Retired' ? 'selected' : '' }}>Retired</option>
                                            <option value="Others" {{ old('occupation') == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                        @error('occupation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" class="form-control"
                                            placeholder="e.g., Google, TCS" value="{{ old('company_name') }}">
                                        @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Annual Income</label>
                                        <input type="text" name="annual_income" class="form-control"
                                            placeholder="e.g., $50,000 / ₹10,00,000" value="{{ old('annual_income') }}">
                                        @error('annual_income')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Work Location</label>
                                        <input type="text" name="work_location" class="form-control"
                                            placeholder="City, Country" value="{{ old('work_location') }}">
                                        @error('work_location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                        

         <h5 class="mt-4">Partner  Preference</h5>

    <div class="row">
        <div class="form-group col-md-6">
            <label>Age Range</label>
            <div class="row align-items-center">
                <div class="col-md-5">
                    <select class="form-control select2" name="partner_age_min">
                        <option value="" disabled selected>Minimum Age</option>
                        @for ($i = 18; $i <= 100; $i++)
                            <option value="{{ $i }}" {{ old('partner_age_min') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-1 text-center">
                    <span>to</span>
                </div>
                <div class="col-md-5">
                    <select class="form-control select2" name="partner_age_max">
                        <option value="" disabled selected>Maximum Age</option>
                        @for ($i = 18; $i <= 100; $i++)
                            <option value="{{ $i }}" {{ old('partner_age_max') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            @error('partner_age_min')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('partner_age_max')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label> Mother Tongue</label>
            <select id="partner_mother_tongue" data-placeholder="-- Select Mother Tongue --"
                name="partner_mother_tongue" class="form-control select2" multiple>
                <option value="Assamese" {{ in_array('Assamese', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Assamese</option>
                <option value="Bengali" {{ in_array('Bengali', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Bengali</option>
                <option value="Bhojpuri" {{ in_array('Bhojpuri', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Bhojpuri</option>
                <option value="Dogri" {{ in_array('Dogri', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Dogri</option>
                <option value="English" {{ in_array('English', old('partner_mother_tongue', [])) ? 'selected' : '' }}>English</option>
                <option value="Garhwali" {{ in_array('Garhwali', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Garhwali</option>
                <option value="Gujarati" {{ in_array('Gujarati', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Gujarati</option>
                <option value="Haryanvi" {{ in_array('Haryanvi', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Haryanvi</option>
                <option value="Hindi" {{ in_array('Hindi', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Hindi</option>
                <option value="Kashmiri" {{ in_array('Kashmiri', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Kashmiri</option>
                <option value="Khandeshi" {{ in_array('Khandeshi', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Khandeshi</option>
                <option value="Konkani" {{ in_array('Konkani', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Konkani</option>
                <option value="Kodava" {{ in_array('Kodava', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Kodava</option>
                <option value="Kannada" {{ in_array('Kannada', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Kannada</option>
                <option value="Maithili" {{ in_array('Maithili', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Maithili</option>
                <option value="Malayalam" {{ in_array('Malayalam', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Malayalam</option>
                <option value="Manipuri" {{ in_array('Manipuri', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Manipuri</option>
                <option value="Marathi" {{ in_array('Marathi', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Marathi</option>
                <option value="Marwari" {{ in_array('Marwari', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Marwari</option>
                <option value="Mizo" {{ in_array('Mizo', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Mizo</option>
                <option value="Nagpuri" {{ in_array('Nagpuri', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Nagpuri</option>
                <option value="Nepali" {{ in_array('Nepali', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Nepali</option>
                <option value="Odia" {{ in_array('Odia', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Odia</option>
                <option value="Punjabi" {{ in_array('Punjabi', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Punjabi</option>
                <option value="Rajasthani" {{ in_array('Rajasthani', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Rajasthani</option>
                <option value="Sanskrit" {{ in_array('Sanskrit', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Sanskrit</option>
                <option value="Santhali" {{ in_array('Santhali', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Santhali</option>
                <option value="Sindhi" {{ in_array('Sindhi', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Sindhi</option>
                <option value="Sourashtra" {{ in_array('Sourashtra', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Sourashtra</option>
                <option value="Tamil" {{ in_array('Tamil', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Tamil</option>
                <option value="Telugu" {{ in_array('Telugu', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Telugu</option>
                <option value="Tulu" {{ in_array('Tulu', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Tulu</option>
                <option value="Urdu" {{ in_array('Urdu', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Urdu</option>
                <option value="Others" {{ in_array('Others', old('partner_mother_tongue', [])) ? 'selected' : '' }}>Others</option>
            </select>
            @error('partner_mother_tongue')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="partner_religion"> Religion</label>
            <select id="partner_religion" name="partner_religion" class="form-control select2">
                <option value="" disabled selected>-- Select Religion --</option>
            </select>
            @error('partner_religion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label> Community</label>
            <select id="partner_community" name="partner_community" class="form-control select2">
                <option value="" disabled selected>-- Select Community --</option>
            </select>
            @error('partner_community')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="partner_marital_status"> Marital Status</label>
            <select name="partner_marital_status" id="partner_marital_status" class="form-control select2" data-placeholder=" -- Select  Marital Status-- " multiple>
                <option value="unmarried" {{ old('partner_marital_status') == 'unmarried' ? 'selected' : '' }}>Unmarried</option>
                <option value="married" {{ old('partner_marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                <option value="divorced" {{ old('partner_marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="widowed" {{ old('partner_marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                <option value="separated" {{ old('partner_marital_status') == 'separated' ? 'selected' : '' }}>Separated</option>
                <option value="awaiting_divorce" {{ old('partner_marital_status') == 'awaiting_divorce' ? 'selected' : '' }}>Awaiting Divorce</option>
                <option value="annulled" {{ old('partner_marital_status') == 'annulled' ? 'selected' : '' }}>Annulled</option>
                <option value="prefer_not_to_say" {{ old('partner_marital_status') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer Not to Say</option>
            </select>
            @error('partner_marital_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label> Caste</label>
            <input type="text" name="partner_caste" class="form-control"
                placeholder="Enter preferred caste" value="{{ old('partner_caste') }}">
            @error('partner_caste')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label> Manglik</label>
            <select name="partner_manglik" class="form-control select2">
                <option value="" disabled selected>-- Select Manglik Status --</option>
                <option value="Manglik" {{ old('partner_manglik') == 'Manglik' ? 'selected' : '' }}>Manglik</option>
                <option value="Non-Manglik" {{ old('partner_manglik') == 'Non-Manglik' ? 'selected' : '' }}>Non-Manglik</option>
                <option value="Anshik Manglik" {{ old('partner_manglik') == 'Anshik Manglik' ? 'selected' : '' }}>Anshik Manglik</option>
                <option value="Don't Know" {{ old("partner_manglik") == "Don't Know" ? "selected" : '' }}>Don't Know</option>
                <option value="Not Applicable" {{ old('partner_manglik') == 'Not Applicable' ? 'selected' : '' }}>Not Applicable</option>
            </select>
            @error('partner_manglik')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label> Gotra</label>
            <input type="text" name="partner_gotra" class="form-control"
                placeholder="Enter preferred gotra" value="{{ old('partner_gotra') }}">
            @error('partner_gotra')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label> Education Field</label>
            <select name="partner_education_field" class="form-control select2">
                <option value="" disabled selected>-- Select Education Field --</option>
                <option value="Arts & Humanities" {{ old('partner_education_field') == 'Arts & Humanities' ? 'selected' : '' }}>Arts & Humanities</option>
                <option value="Commerce" {{ old('partner_education_field') == 'Commerce' ? 'selected' : '' }}>Commerce</option>
                <option value="Science" {{ old('partner_education_field') == 'Science' ? 'selected' : '' }}>Science</option>
                <option value="Engineering" {{ old('partner_education_field') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                <option value="Medical" {{ old('partner_education_field') == 'Medical' ? 'selected' : '' }}>Medical</option>
                <option value="Law" {{ old('partner_education_field') == 'Law' ? 'selected' : '' }}>Law</option>
                <option value="Management" {{ old('partner_education_field') == 'Management' ? 'selected' : '' }}>Management</option>
                <option value="Computers / IT" {{ old('partner_education_field') == 'Computers / IT' ? 'selected' : '' }}>Computers / IT</option>
                <option value="Education / Teaching" {{ old('partner_education_field') == 'Education / Teaching' ? 'selected' : '' }}>Education / Teaching</option>
                <option value="Architecture" {{ old('partner_education_field') == 'Architecture' ? 'selected' : '' }}>Architecture</option>
                <option value="Design / Fashion" {{ old('partner_education_field') == 'Design / Fashion' ? 'selected' : '' }}>Design / Fashion</option>
                <option value="Social Sciences" {{ old('partner_education_field') == 'Social Sciences' ? 'selected' : '' }}>Social Sciences</option>
                <option value="Journalism / Media" {{ old('partner_education_field') == 'Journalism / Media' ? 'selected' : '' }}>Journalism / Media</option>
                <option value="Finance / Accounting" {{ old('partner_education_field') == 'Finance / Accounting' ? 'selected' : '' }}>Finance / Accounting</option>
                <option value="Pharmacy" {{ old('partner_education_field') == 'Pharmacy' ? 'selected' : '' }}>Pharmacy</option>
                <option value="Nursing" {{ old('partner_education_field') == 'Nursing' ? 'selected' : '' }}>Nursing</option>
                <option value="Agriculture" {{ old('partner_education_field') == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                <option value="Hospitality / Tourism" {{ old('partner_education_field') == 'Hospitality / Tourism' ? 'selected' : '' }}>Hospitality / Tourism</option>
                <option value="Aviation" {{ old('partner_education_field') == 'Aviation' ? 'selected' : '' }}>Aviation</option>
                <option value="Others" {{ old('partner_education_field') == 'Others' ? 'selected' : '' }}>Others</option>
            </select>
            @error('partner_education_field')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label> Occupation</label>
            <select name="partner_occupation" class="form-control select2">
                <option value="" disabled selected>-- Select Occupation --</option>
                <option value="Not Working" {{ old('partner_occupation') == 'Not Working' ? 'selected' : '' }}>Not Working</option>
                <option value="Student" {{ old('partner_occupation') == 'Student' ? 'selected' : '' }}>Student</option>
                <option value="Government Employee" {{ old('partner_occupation') == 'Government Employee' ? 'selected' : '' }}>Government Employee</option>
                <option value="Private Job" {{ old('partner_occupation') == 'Private Job' ? 'selected' : '' }}>Private Job</option>
                <option value="Business" {{ old('partner_occupation') == 'Business' ? 'selected' : '' }}>Business</option>
                <option value="Self Employed" {{ old('partner_occupation') == 'Self Employed' ? 'selected' : '' }}>Self Employed</option>
                <option value="Entrepreneur" {{ old('partner_occupation') == 'Entrepreneur' ? 'selected' : '' }}>Entrepreneur</option>
                <option value="Doctor" {{ old('partner_occupation') == 'Doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="Engineer" {{ old('partner_occupation') == 'Engineer' ? 'selected' : '' }}>Engineer</option>
                <option value="Teacher" {{ old('partner_occupation') == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="Professor" {{ old('partner_occupation') == 'Professor' ? 'selected' : '' }}>Professor</option>
                <option value="Lawyer" {{ old('partner_occupation') == 'Lawyer' ? 'selected' : '' }}>Lawyer</option>
                <option value="Scientist" {{ old('partner_occupation') == 'Scientist' ? 'selected' : '' }}>Scientist</option>
                <option value="Architect" {{ old('partner_occupation') == 'Architect' ? 'selected' : '' }}>Architect</option>
                <option value="Artist" {{ old('partner_occupation') == 'Artist' ? 'selected' : '' }}>Artist</option>
                <option value="Actor" {{ old('partner_occupation') == 'Actor' ? 'selected' : '' }}>Actor</option>
                <option value="Model" {{ old('partner_occupation') == 'Model' ? 'selected' : '' }}>Model</option>
                <option value="Journalist" {{ old('partner_occupation') == 'Journalist' ? 'selected' : '' }}>Journalist</option>
                <option value="Banker" {{ old('partner_occupation') == 'Banker' ? 'selected' : '' }}>Banker</option>
                <option value="Accountant" {{ old('partner_occupation') == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                <option value="Civil Services (IAS/IPS/IRS)" {{ old('partner_occupation') == 'Civil Services (IAS/IPS/IRS)' ? 'selected' : '' }}>Civil Services (IAS/IPS/IRS)</option>
                <option value="Defense Personnel" {{ old('partner_occupation') == 'Defense Personnel' ? 'selected' : '' }}>Defense Personnel</option>
                <option value="Pilot" {{ old('partner_occupation') == 'Pilot' ? 'selected' : '' }}>Pilot</option>
                <option value="Chef" {{ old('partner_occupation') == 'Chef' ? 'selected' : '' }}>Chef</option>
                <option value="Designer" {{ old('partner_occupation') == 'Designer' ? 'selected' : '' }}>Designer</option>
                <option value="Sports Person" {{ old('partner_occupation') == 'Sports Person' ? 'selected' : '' }}>Sports Person</option>
                <option value="Social Worker" {{ old('partner_occupation') == 'Social Worker' ? 'selected' : '' }}>Social Worker</option>
                <option value="Retired" {{ old('partner_occupation') == 'Retired' ? 'selected' : '' }}>Retired</option>
                <option value="Others" {{ old('partner_occupation') == 'Others' ? 'selected' : '' }}>Others</option>
            </select>
            @error('partner_occupation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
                                    <label>Annual Income</label>
                                    <input type="text" name="annual_income" class="form-control"
                                        placeholder="e.g., $50,000 / ₹10,00,000">
                                </div>

    </div>


                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('photo-input');
            const preview = document.getElementById('preview-images');

            let totalImages = 0;

            input.addEventListener('change', function() {
                const files = Array.from(this.files);

                if (totalImages + files.length > 15) {
                    alert(`You can only upload up to 15 images. You already added ${totalImages}.`);
                    this.value = '';
                    return;
                }

                files.forEach(file => {
                    if (!file.type.startsWith('image/')) return;

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-2 mb-3';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail';
                        img.style.height = '120px';
                        img.style.width = '100%';
                        img.style.objectFit = 'cover';

                        col.appendChild(img);
                        preview.appendChild(col);
                    };
                    reader.readAsDataURL(file);
                    totalImages++;
                });

                this.value = ''; // Clear input so reselecting same file again will work
            });


            // get country codes



        });


        async function loadCountries() {
            try {
                const countrySelect = $('#country_code');

                // Wait for response
                const response = await sendRequest("{{ route('get-countrys') }}", 'GET');

                // If your backend wraps in { status, data, message }
                const countries = response.data || response; // fallback if plain array

                // Clear old options
                countrySelect.empty();

                // Add default placeholder
                countrySelect.append('<option value="">Select Country</option>');

                // Add new options
                countries.forEach(country => {
                    countrySelect.append(
                        `<option  value="${country.code}"  ${country.dial_code === '+91' ? 'selected' : ''}>${country.name} (${country.dial_code})</option>`
                    );
                });

                // Initialize or refresh Select2


            } catch (error) {
                console.error('Error fetching country codes:', error);
            }
        }

        // Call it:
        loadCountries();
    </script>

    <script>
        $(document).ready(function() {
            // Example: Disable married brothers if brothers == 0
            $('#brothers').on('change', function() {
                let number = parseInt($(this).val());
                let $wrapper = $('.married_brothers');
                let $select = $('#married_brothers'); // Ensure this is the ID of your <select>

                if (isNaN(number) || number <= 0) {
                    $wrapper.addClass('d-none');
                    $select.empty().append('<option value="" selected disabled>-- Select --</option>');
                } else {
                    // Generate new options
                    let options = '<option value="" selected disabled>-- Select --</option>';
                    for (let i = 0; i <= number; i++) {
                        options += `<option value="${i}">${i}</option>`;
                    }

                    $select.empty().append(options);
                    $wrapper.removeClass('d-none');
                }
            });


            $('#sisters').on('change', function() {
                let number = parseInt($(this).val());
                let $wrapper = $('.married_sisters');
                let $select = $('#married_sisters'); // Ensure this is the ID of your <select>

                if (isNaN(number) || number <= 0) {
                    $wrapper.addClass('d-none');
                    $select.empty().append('<option value="" selected disabled>-- Select --</option>');
                } else {
                    // Generate new options
                    let options = '<option value="" selected disabled>-- Select --</option>';
                    for (let i = 0; i <= number; i++) {
                        options += `<option value="${i}">${i}</option>`;
                    }

                    $select.empty().append(options);
                    $wrapper.removeClass('d-none');
                }
            });



            // Trigger once on page load if values are prefilled
            $('#brothers').trigger('change');
            $('#sisters').trigger('change');
        });
    </script>
@endpush
