@extends('layouts.main')
@section('title', 'Assigned Profiles')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h4 class="mb-0">Profile Assignments</h4>
            <a class="btn btn-success" href="{{ route('admin.assigns.create') }}">
                <i class="fa fa-plus"></i> Assign New
            </a>
        </div>



        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Profile</th>
                            <th>Employee</th>
                            <th>Assigned At</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignments as $index => $assign)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $assign->profile->name ?? 'N/A' }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $assign->employee->name ?? 'N/A' }}</div>
                                    <div class="text-muted small">{{ $assign->employee->email ?? 'N/A' }}</div>
                                </td>
                                <td>{{ $assign->assigned_at ?? $assign->created_at }}</td>
                                <td>{{ $assign->note ?? '-' }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.assigns.edit', $assign->id) }}" class="btn btn-warning btn-sm mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.assigns.destroy', $assign->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this assignment?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
