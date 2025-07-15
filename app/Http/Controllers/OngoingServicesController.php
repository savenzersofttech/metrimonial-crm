<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OngoingServicesController extends Controller
{
    public function index()
    {
        return view('services.ongoing-services.index');
    }

    public function create()
    {
        return view('services.ongoing-services-create.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('services.ongoing-services.index')->with('success', 'Ongoing service created.');
    }

    public function show($id)
    {
        return view('services.ongoing-services-show', ['id' => $id]);
    }

    public function edit($id)
    {
        return view('services.ongoing-services-edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('services.ongoing-services.index')->with('success', 'Ongoing service updated.');
    }

    public function destroy($id)
    {
        return redirect()->route('services.ongoing-services.index')->with('success', 'Ongoing service deleted.');
    }
}
