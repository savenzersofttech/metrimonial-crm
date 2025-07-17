<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\ProfileEmployeeAssignment;
use Illuminate\Support\Facades\Auth;
use App\Models\WelcomeCall;

class ProfileAssignmentController extends Controller
{
    public function index()
    {
        $assignments = ProfileEmployeeAssignment::with(['profile', 'employee'])->latest()->get();
        return view('assigns.index', compact('assignments'));
    }
  public function edit($id)
{
    $assignment = ProfileEmployeeAssignment::findOrFail($id);

    $employees = User::whereNotIn('role', ['admin', 'super-admin'])->get();

    // Fetch all unassigned profiles + currently assigned one
    $profiles = Profile::whereDoesntHave('staffAssignment')
        ->orWhere('id', $assignment->profile_id)
        ->get();

    return view('assigns.edit', compact('assignment', 'employees', 'profiles'));
}



    public function create()
    {
        $employees = User::whereNotIn('role', ['admin', 'super-admin'])->get();
        $profiles = Profile::doesntHave('staffAssignment')->get(); // only unassigned
        return view('assigns.create', compact('employees', 'profiles'));
    }

 public function update(Request $request, $id)
{
    $request->validate([
        'profile_id' => [
            'required',
            'exists:profiles,id',
            function ($attribute, $value, $fail) use ($id) {
                $alreadyAssigned = ProfileEmployeeAssignment::where('profile_id', $value)
                    ->where('id', '!=', $id)
                    ->exists();
                if ($alreadyAssigned) {
                    $fail('This profile is already assigned to another employee.');
                }
            }
        ],
        'employee_id' => 'required|exists:users,id',
        'note' => 'nullable|string|max:1000',
    ]);

    $assignment = ProfileEmployeeAssignment::findOrFail($id);
    $assignment->update([
        'profile_id' => $request->profile_id,
        'employee_id' => $request->employee_id,
        'note' => $request->note,
        'assigned_at' => now(),
        'assigned_by' => auth()->id()
    ]);

    return redirect()->route('admin.assigns.index')->with('success', 'Assignment updated successfully.');
}



   public function store(Request $request)
{
    $request->validate([
        'employee_id' => 'required|exists:users,id',
        'profile_ids' => 'required|array',
        'profile_ids.*' => [
            'exists:profiles,id',
            function ($attribute, $value, $fail) {
                if (ProfileEmployeeAssignment::where('profile_id', $value)->exists()) {
                    $fail('One or more profiles are already assigned.');
                }
            }
        ],
    ]);

    foreach ($request->profile_ids as $profileId) {
        ProfileEmployeeAssignment::create([
            'employee_id' => $request->employee_id,
            'profile_id' => $profileId,
            'assigned_by' => Auth::id(),
            'note' => $request->note,
            'assigned_at' => now(),
        ]);

          WelcomeCall::create([
         'profile_id' => $profileId,
            'employee_id' => $request->employee_id,
            'note' => $request->note,
            'created_at' => now(),
            'updated_at' => now(),
    ]);
    }

  

    return redirect()->route('admin.assigns.index')->with('success', 'Profiles assigned successfully.');
}

   public function destroy($id)
    {
        $assignment = ProfileEmployeeAssignment::findOrFail($id);
        $assignment->delete();
        return back()->with('success', 'Assignment deleted.');
    }

}
