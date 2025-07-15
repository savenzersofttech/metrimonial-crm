<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\WelcomeCall;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FollowUpHistory;
use App\Models\ProfileEmployeeAssignment;

class WelcomeCallController extends Controller
{
   

    public function index()
    {
        $employeeId = Auth::id();
        $assignProfileIds = ProfileEmployeeAssignment::where('employee_id', $employeeId)->pluck('profile_id');
        $calls = WelcomeCall::with(['profile', 'profileAssignment.assignedByUser', 'followUpHistories' => function ($query) {
            $query->latest('follow_up_date')->first(); // Works with datetime
        }])
        ->whereIn('profile_id', $assignProfileIds)
        ->get();
        // dd($calls->toArray());
        return view('services.welcome-calls.index', compact('calls'));
    }

    public function create()
    {
        $profiles = Profile::all();
        $employees = User::whereNotIn('role', ['admin', 'super-admin'])->get();
        return view('welcome-calls.create', compact('profiles', 'employees'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'employee_id' => 'nullable|exists:users,id',
            'status' => 'required|string',
            'comment' => 'nullable|string',
            'follow_up_date' => 'nullable|date',
        ]);

        WelcomeCall::create($request->all());
        return redirect()->route('services.welcome-calls.index')->with('success', 'Welcome Call created.');
    }

    public function show(WelcomeCall $welcomeCall)
{
    $welcomeCall->load('profile', 'followUpHistories.employee'); // Eager load profile and follow-up histories with employee
    return view('services.welcome-calls.show', compact('welcomeCall'));
}

    public function edit(WelcomeCall $welcomeCall)
    {
        $profiles = Profile::all();
        $employees = User::whereNotIn('role', ['admin', 'super-admin'])->get();
        $welcomeCall->load('followUpHistories.employee'); // Load all follow-up histories with employee
        return view('services.welcome-calls.edit', compact('welcomeCall', 'profiles', 'employees'));
    }

    public function update(Request $request, WelcomeCall $welcomeCall)
    {
        // Validate the request data
        $request->validate([
            'status' => 'required|string|in:Interested,Follow-up Needed,No Response,Not Interested',
            'comment' => 'nullable|string',
            'follow_up_date' => 'nullable|date_format:Y-m-d H:i', 
        ]);

        FollowUpHistory::create([
            'welcome_call_id' => $welcomeCall->id,
            'employee_id' => Auth::id(),
            'follow_up_date' => $request->follow_up_date,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $welcomeCall->update($request->all());

        return redirect()->route('services.welcome-calls.index')->with('success', 'Welcome Call updated and follow-up logged.');
    }

    public function destroy(WelcomeCall $welcomeCall)
    {
        $welcomeCall->delete();
        return redirect()->route('services.welcome-calls.index')->with('success', 'Deleted.');
    }

   
}