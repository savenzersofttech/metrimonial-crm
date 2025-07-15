<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CustomerProfileController extends Controller
{
    
    public function index()
    {
        $profiles = Profile::with('staffAssignment.employee')->latest()->paginate(20);
        // dd($profiles->toArray());
        return view('profiles.index', compact('profiles'));
    }

     /**
     * Display the specified profile.
     */
    public function show(Profile $profile): View
    {
        // Ensure the authenticated user owns the profile
        if ($profile->user_id !== Auth::id()) {
         //   abort(403, 'Unauthorized access to this profile.');
        }

        return view('profiles.view', compact('profile'));
    }

    /**
     * Show the form for creating a new profile.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created profile in storage.
     */
    public function store(Request $request)
    {

                $validated = $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'gender' => ['nullable', 'in:male,female,other'],
            'country_code' => ['nullable', 'string', 'max:10'],
            'phone' => ['nullable', 'string', 'max:10', 'regex:/^[0-9]+$/'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('profiles')],
            'dob' => ['nullable', 'date'],
            'religion' => ['nullable', 'string', 'max:255'],
            'community' => ['nullable', 'string', 'max:255'],
            'marital_status' => ['nullable', 'string', 'max:255'],
            'mother_tongue' => ['nullable', 'array'],
            'mother_tongue.*' => ['string', 'max:255'],
            'diet' => ['nullable', 'array'],
            'diet.*' => ['nullable','string', 'max:255'],
            'citizenship' => ['nullable', 'string', 'max:255'],
            'drinking' => ['nullable', 'array'],
            'drinking.*' => ['string', 'max:255'],
            'smoking' => ['nullable', 'array'],
            'smoking.*' => ['string', 'max:255'],
            'blood_group' => ['nullable', 'string', 'max:255'],
            'height' => ['nullable', 'string', 'max:255'],
            'health_status' => ['nullable', 'string', 'max:255'],
            'time_of_birth' => ['nullable', 'date_format:H:i'],
            'place_of_birth' => ['nullable', 'string', 'max:255'],
            'father_profession' => ['nullable', 'string', 'max:255'],
            'mother_profession' => ['nullable', 'string', 'max:255'],
            'brothers' => ['nullable', 'integer', 'min:0', 'max:10'],
            'married_brothers' => ['nullable', 'integer', 'min:0', 'lte:brothers'],
            'sisters' => ['nullable', 'integer', 'min:0', 'max:10'],
            'married_sisters' => ['nullable', 'integer', 'min:0', 'lte:sisters'],
            'family_affluence' => ['nullable', 'string', 'max:255'],
            'family_values' => ['nullable', 'string', 'max:255'],
            'registering_for' => ['nullable', 'string', 'max:255'],
            'school_college_name' => ['nullable', 'string', 'max:255'],
            'degree' => ['nullable', 'string', 'max:255'],
            'year_of_passing' => ['nullable', 'string', 'max:255'],
            'highest_qualification' => ['nullable', 'string', 'max:255'],
            'education_field' => ['nullable', 'string', 'max:255'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'annual_income' => ['nullable', 'string', 'max:255'],
            'work_location' => ['nullable', 'string', 'max:255'],
            'partner_age_min' => ['nullable', 'integer', 'min:18', 'max:100'],
            'partner_age_max' => ['nullable', 'integer', 'min:18', 'max:100', 'gte:partner_age_min'],
            'partner_mother_tongue' => ['nullable', 'array'],
            'partner_mother_tongue.*' => ['string', 'max:255'],
            'partner_religion' => ['nullable', 'string', 'max:255'],
            'partner_community' => ['nullable', 'string', 'max:255'],
            'partner_marital_status' => ['nullable', 'string', 'max:255'],
            'partner_caste' => ['nullable', 'string', 'max:255'],
            'partner_manglik' => ['nullable', 'string', 'max:255'],
            'partner_gotra' => ['nullable', 'string', 'max:255'],
            'partner_education_field' => ['nullable', 'string', 'max:255'],
            'partner_occupation' => ['nullable', 'string', 'max:255'],
            'partner_annual_income' => ['nullable', 'string', 'max:255'],
            'photos' => ['nullable', 'array', 'max:15'],
            'photos.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // 2MB per image
        ]);

        // Handle file uploads for photos
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('profile-photos', 'public');
                $photos[] = $path;
            }
        }

        // Create profile
        $profile = Profile::create(array_merge($validated, [
            'created_by' => Auth::id(),
            'photos' => $photos,
        ]));

        return Redirect::route('admin.profiles.index')->with('success', 'Profile created successfully!');
    }

    /**
     * Show the form for editing the specified profile.
     */
    public function edit(Profile $profile): View
    {
        // $this->authorize('update', $profile);

        return view('profiles.edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified profile in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        // $this->authorize('update', $profile);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['nullable', 'in:male,female,other'],
            'country_code' => ['required', 'string', 'max:10'],
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]+$/'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('profiles')->ignore($profile->id)],
            'dob' => ['nullable', 'date'],
            'religion' => ['nullable', 'string', 'max:255'],
            'community' => ['nullable', 'string', 'max:255'],
            'marital_status' => ['nullable', 'string', 'max:255'],
            'mother_tongue' => ['nullable', 'array'],
            'mother_tongue.*' => ['string', 'max:255'],
            'diet' => ['required', 'array'],
            'diet.*' => ['string', 'max:255'],
            'citizenship' => ['nullable', 'string', 'max:255'],
            'drinking' => ['nullable', 'array'],
            'drinking.*' => ['string', 'max:255'],
            'smoking' => ['nullable', 'array'],
            'smoking.*' => ['string', 'max:255'],
            'blood_group' => ['nullable', 'string', 'max:255'],
            'height' => ['nullable', 'string', 'max:255'],
            'health_status' => ['nullable', 'string', 'max:255'],
            'time_of_birth' => ['nullable', 'date_format:H:i'],
            'place_of_birth' => ['nullable', 'string', 'max:255'],
            'father_profession' => ['nullable', 'string', 'max:255'],
            'mother_profession' => ['nullable', 'string', 'max:255'],
            'brothers' => ['nullable', 'integer', 'min:0', 'max:10'],
            'married_brothers' => ['nullable', 'integer', 'min:0', 'lte:brothers'],
            'sisters' => ['nullable', 'integer', 'min:0', 'max:10'],
            'married_sisters' => ['nullable', 'integer', 'min:0', 'lte:sisters'],
            'family_affluence' => ['nullable', 'string', 'max:255'],
            'family_values' => ['nullable', 'string', 'max:255'],
            'registering_for' => ['nullable', 'string', 'max:255'],
            'school_college_name' => ['nullable', 'string', 'max:255'],
            'degree' => ['nullable', 'string', 'max:255'],
            'year_of_passing' => ['nullable', 'string', 'max:255'],
            'highest_qualification' => ['nullable', 'string', 'max:255'],
            'education_field' => ['nullable', 'string', 'max:255'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'annual_income' => ['nullable', 'string', 'max:255'],
            'work_location' => ['nullable', 'string', 'max:255'],
            'partner_age_min' => ['nullable', 'integer', 'min:18', 'max:100'],
            'partner_age_max' => ['nullable', 'integer', 'min:18', 'max:100', 'gte:partner_age_min'],
            'partner_mother_tongue' => ['nullable', 'array'],
            'partner_mother_tongue.*' => ['string', 'max:255'],
            'partner_religion' => ['nullable', 'string', 'max:255'],
            'partner_community' => ['nullable', 'string', 'max:255'],
            'partner_marital_status' => ['nullable', 'string', 'max:255'],
            'partner_caste' => ['nullable', 'string', 'max:255'],
            'partner_manglik' => ['nullable', 'string', 'max:255'],
            'partner_gotra' => ['nullable', 'string', 'max:255'],
            'partner_education_field' => ['nullable', 'string', 'max:255'],
            'partner_occupation' => ['nullable', 'string', 'max:255'],
            'partner_annual_income' => ['nullable', 'string', 'max:255'],
            'photos' => ['nullable', 'array', 'max:15'],
            'photos.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Handle file uploads for photos
        $photos = $profile->photos ?? [];
        if ($request->hasFile('photos')) {
            // Delete old photos
            foreach ($photos as $photo) {
                Storage::disk('public')->delete($photo);
            }
            $photos = [];
            // Store new photos
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('profile-photos', 'public');
                $photos[] = $path;
            }
        }

        // Update profile
        $profile->update(array_merge($validated, [
            'photos' => $photos,
        ]));

        return Redirect::route('admin.profiles.edit', $profile)->with('status', 'Profile updated successfully!');
    }

    /**
     * Remove the specified profile from storage.
     */
    public function destroy(Profile $profile)
    {
        // $this->authorize('delete', $profile);

        // Delete associated photos
        // if ($profile->photos) {
        //     foreach ($profile->photos as $photo) {
        //         Storage::disk('public')->delete($photo);
        //     }
        // }

        $profile->delete();

        return Redirect::route('admin.profiles.index')->with('status', 'Profile deleted successfully!');
    }
}
