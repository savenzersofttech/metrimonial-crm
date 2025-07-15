@extends('layouts.main')
@section('title', 'All Roles')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                     <h4 class="mb-0">All Roles</h4>
                    <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                        <i class="fa fa-plus"></i> Add New
                    </a>

                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $index => $role)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ ucfirst(str_replace('-', ' ', $role->name)) }}</td>
                                        <td>
                                           {{ count($role->permissions)}}
                                        </td>
                                        <td>
                                        @if($role->name !='super-admin')
                                            <a href="{{ route('admin.permissions.edit', $role) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @else
                                         <a  class="btn btn-danger btn-sm">
                                                <i class="fas fa-ban"></i>
                                            </a>
                                           
                                        @endif
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
@endsection