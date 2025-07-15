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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Calls</span>
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-plus"></i> Add New
                    </a>
                </div>

                <div class="card-body">
                    <table id="datatablesWelcomeCalls">
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
                                        <a
                                            href="#"><strong>{{ Str::ucfirst($call->profile->name) ?? 'N/A' }}</strong></a>

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
                                            {{ $call->status ?? '-' }}
                                        </div>
                                    </td>
                                    <td>

                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModalLg"  href="{{ route('services.welcome-calls.edit', $call->id) }}" class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModalLg"  href="{{ route('services.welcome-calls.edit', $call->id) }}" class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModalLg"  action="{{ route('services.welcome-calls.destroy', $call->id) }}" class="btn btn-datatable btn-icon btn-transparent-dark">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
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

<div class="modal fade" id="exampleModalLg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Large Modal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>This is an example of a large modal.</p>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
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


@push('script')
<script>
window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});

    </script>
<script type="module">
            import {DataTable} from "../dist/module.js"

            fetch("initial_data.json")
                .then(response => response.json())
                .then(data => {
                    window.dt = new DataTable("#datatablesWelcomeCalls", {
                        columns: [
                            {
                                // select the fourth column ...
                                select: 3,
                                // ... let the instance know we have datetimes in it ...
                                type: "date",
                                // ... pass the correct datetime format ...
                                format: "YYYY/DD/MM",
                                // ... sort it ...
                                sort: "desc"
                            }
                        ],
                        data: {
                            headings: [
                                {
                                    text: "Name",
                                    data: "name"
                                }, {
                                    text: "Ext.",
                                    data: "extension"
                                }, {
                                    text: "City",
                                    data: "city"
                                }, {
                                    text: "Start date",
                                    data: "start_date"
                                }
                            ],
                            data
                        }
        })

                    fetch("additional_data.json")
                        .then(response => response.json())
                        .then(data => window.dt.insert(data))
                })
        </script>


@endpush