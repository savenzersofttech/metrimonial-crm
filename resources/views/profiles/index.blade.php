@extends('layouts.main')
@section('title', 'All Lead')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="mb-0">All Profiles</h4>
                        <a class="btn btn-success" href="{{ route('admin.profiles.create') }}">
                            <i class="fa fa-plus"></i> Add New
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
                                        <th>Name </th>
                                        <th>Email </th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach ($profiles as $key => $profile)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::ucfirst($profile->name ?? '-') }}</td>
                                            <td>{{ $profile->email ?? '-' }}</td>
                                            <td>{{ $profile->phone_code ?? '' }} {{ $profile->phone ?? '-' }}</td>

                                            <td>
                                                @if ($profile->staffAssignment?->employee)
                                                    <div class="badge badge-success badge-shadow">
                                                        {{ $profile->staffAssignment->employee->name }}
                                                    </div>
                                                @else
                                                    <div class="badge badge-warning badge-shadow">Unassigned</div>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.profiles.show', $profile->id) }}"
                                                    class="btn btn-sm btn-success" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.profiles.edit', $profile->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.profiles.destroy', $profile->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
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
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
