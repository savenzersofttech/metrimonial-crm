@extends('layouts.sb2-layout')

@section('content')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-fluid px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Welcome Calls
                            </h1>
                            {{-- <div class="page-header-subtitle">Example dashboard overview and content summary </div> --}}
                        </div>
                        <div class="col-12 col-xl-auto mt-4">
                            <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                                <input class="form-control ps-0 pointer" id="litepickerRangePlugin"
                                    placeholder="Select date range..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4 mt-n10">


            <!-- Example DataTable for Dashboard Demo-->
            <div class="card mb-4">
                <div class="card-header">Calls</div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profile Info</th>
                                <th>Assigned By</th>
                                <th>Note</th>
                                <th>Last Comment</th>
                                <th>Last Follow-up Date</th>
                                <th>Last Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Profile Info</th>
                                <th>Assigned By</th>
                                <th>Note</th>
                                <th>Last Comment</th>
                                <th>Last Follow-up Date</th>
                                <th>Last Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>




                            @forelse($calls as $index => $call)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="#"><strong>{{ Str::ucfirst($call->profile->name) ?? 'N/A' }}</strong></a>

                                    </td>
                                    <td>
                                        @if ($call->profileAssignment && $call->profileAssignment->assignedByUser)
                                            {{ $call->profileAssignment->assignedByUser->name ?? '-' }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $call->profileAssignment->note ?? '-' }}</td>

                                    <td>{{ $call->comment ?? '-' }}</td>
                                    <td>
                                        @if ($call->follow_up_date)
                                            {{ \Carbon\Carbon::parse($call->follow_up_date)->format('d-m-Y H:i') }}
                                        @else
                                            <span class="text-center">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div
                                            class="badge bg-{{ getStatusClass($call->status ?? 'light') }} text-white rounded-pill">
                                            {{ $call->status ?? '-' }}</div>

                                    </td>

                                    <td>
                                        <button href="{{ route('services.welcome-calls.edit', $call->id) }}"
                                            class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button href="{{ route('services.welcome-calls.edit', $call->id) }}"
                                            class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button action="{{ route('services.welcome-calls.destroy', $call->id) }}"
                                            class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                                class="fa-regular fa-trash-can"></i></button>


                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No welcome calls found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
    </main>
@endsection
@php
    function getStatusClass($status)
    {
        return match ($status) {
            'Interested' => 'success',
            'Follow-up Needed' => 'warning',
            'No Response' => 'danger',
            'Not Interested' => 'secondary',
            default => 'light',
        };
    }
@endphp
