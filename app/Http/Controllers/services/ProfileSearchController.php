<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('services.reports.index');
    }

    public function search(Request $request)
    {
        // Initialize query
        $query = Profile::query();

        // Personal Details Filters
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('partner_age_min') && $request->filled('partner_age_max')) {
            $minAge = $request->input('partner_age_min');
            $maxAge = $request->input('partner_age_max');
            $currentYear = now()->year;
            $query->whereYear('dob', '>=', $currentYear - $maxAge)
                  ->whereYear('dob', '<=', $currentYear - $minAge);
        }

        if ($request->filled('religion')) {
            $query->where('religion', $request->input('religion'));
        }

        if ($request->filled('community')) {
            $query->where('community', $request->input('community'));
        }

        if ($request->filled('marital_status')) {
            $query->whereIn('marital_status', (array) $request->input('marital_status'));
        }

        if ($request->filled('mother_tongue')) {
            $query->whereIn('mother_tongue', (array) $request->input('mother_tongue'));
        }

        if ($request->filled('diet')) {
            $query->whereIn('diet', (array) $request->input('diet'));
        }

        if ($request->filled('drinking')) {
            $query->whereIn('drinking', (array) $request->input('drinking'));
        }

        if ($request->filled('smoking')) {
            $query->whereIn('smoking', (array) $request->input('smoking'));
        }

        if ($request->filled('blood_group')) {
            $query->where('blood_group', $request->input('blood_group'));
        }

        if ($request->filled('height')) {
            $query->where('height', $request->input('height'));
        }

        if ($request->filled('health_status')) {
            $query->where('health_status', $request->input('health_status'));
        }

        if ($request->filled('partner_manglik')) {
            $query->where('manglik_status', $request->input('partner_manglik'));
        }

        if ($request->filled('citizenship')) {
            $query->where('citizenship', $request->input('citizenship'));
        }

        if ($request->filled('state')) {
            $query->where('state', 'like', '%' . $request->input('state') . '%');
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->input('city') . '%');
        }

        if ($request->filled('bio_keywords')) {
            $keywords = explode(' ', $request->input('bio_keywords'));
            foreach ($keywords as $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('bio', 'like', '%' . $keyword . '%')
                      ->orWhere('name', 'like', '%' . $keyword . '%')
                      ->orWhere('email', 'like', '%' . $keyword . '%');
                });
            }
        }

        if ($request->filled('family_affluence')) {
            $query->where('family_affluence', $request->input('family_affluence'));
        }

        if ($request->filled('family_values')) {
            $query->where('family_values', $request->input('family_values'));
        }

        if ($request->filled('registering_for')) {
            $query->where('registering_for', $request->input('registering_for'));
        }

        if ($request->filled('highest_qualification')) {
            $query->where('highest_qualification', 'like', '%' . $request->input('highest_qualification') . '%');
        }

        if ($request->filled('education_field')) {
            $query->where('education_field', $request->input('education_field'));
        }

        if ($request->filled('degree')) {
            $query->where('degree', 'like', '%' . $request->input('degree') . '%');
        }

        if ($request->filled('year_of_passing')) {
            $query->where('year_of_passing', $request->input('year_of_passing'));
        }

        if ($request->filled('occupation')) {
            $query->where('occupation', $request->input('occupation'));
        }

        if ($request->filled('company_name')) {
            $query->where('company_name', 'like', '%' . $request->input('company_name') . '%');
        }

        if ($request->filled('annual_income')) {
            $query->where('annual_income', 'like', '%' . $request->input('annual_income') . '%');
        }

        if ($request->filled('work_location')) {
            $query->where('work_location', 'like', '%' . $request->input('work_location') . '%');
        }

        if ($request->filled('created_by')) {
            $query->where('created_by', 'like', '%' . $request->input('created_by') . '%');
        }

        // Partner Preferences Filters
        if ($request->filled('partner_mother_tongue')) {
            $query->whereIn('mother_tongue', (array) $request->input('partner_mother_tongue'));
        }

        if ($request->filled('partner_religion')) {
            $query->where('religion', $request->input('partner_religion'));
        }

        if ($request->filled('partner_community')) {
            $query->where('community', $request->input('partner_community'));
        }

        if ($request->filled('partner_marital_status')) {
            $query->whereIn('marital_status', (array) $request->input('partner_marital_status'));
        }

        if ($request->filled('partner_caste')) {
            $query->where('caste', 'like', '%' . $request->input('partner_caste') . '%');
        }

        if ($request->filled('partner_gotra')) {
            $query->where('gotra', 'like', '%' . $request->input('partner_gotra') . '%');
        }

        if ($request->filled('partner_education_field')) {
            $query->where('education_field', $request->input('partner_education_field'));
        }

        if ($request->filled('partner_occupation')) {
            $query->where('occupation', $request->input('partner_occupation'));
        }

        if ($request->filled('partner_annual_income')) {
            $query->where('annual_income', 'like', '%' . $request->input('partner_annual_income') . '%');
        }

        // Fetch results
        $profiles = $query->get(['id', 'name', 'dob', 'gender', 'religion', 'place_of_birth', 'created_by']);

        // Return JSON response for AJAX
        return response()->json([
            'data' => $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
