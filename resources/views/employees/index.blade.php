@extends('layouts.main')
@section('title', 'Employees')
@section('meta_description', 'Manage employees and view basic details.')

@section('content')
<div class="section-start">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
          <h4 class="mb-0">Employees</h4>
          <div class="d-flex align-items-center gap-2 flex-wrap">
            <a class="btn btn-success" href="{{ route('admin.employees.create') }}">
              <i class="fa fa-plus"></i> Add New
            </a>
          </div>
        </div>

        <div class="card-body p-3">
          <div class="table-scroll-5rows">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Department</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

               
                </tr>
                 @forelse($employees as $key => $employee)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $employee->user->name }} </td>
                  <td>{{ $employee->user->email }}</td>
                  <td>{{ ucfirst($employee->user->role) }}</td>
                  <td>
                      <a  class="btn btn-info btn-sm" title="View"> <i class="fas fa-user"></i> </a>
                      <a  class="btn btn-warning btn-sm" title="Edit"> <i class="fas fa-edit"></i> </a>
                      <a  class="btn btn-danger btn-sm" title="Delete"> <i class="fas fa-ban"></i> </a>
                          
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center">No employees found</td>
                </tr>
                @endforelse 
              </tbody>
            </table>
          </div>
        </div>
        

      </div>
    </div>
  </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
          <h4 class="mb-0">Assign Leads</h4>
          <div class="d-flex align-items-center gap-2 flex-wrap">
            
          </div>
        </div>

        <div class="card-body">
          
            @csrf
            <div class="mb-3">
              <label for="lead" class="form-label">Select Lead</label>
              <select class="form-select" id="lead" name="lead_id">
                <option value="">-- Select Lead --</option>
                <option value="1">Lead #1 - John Doe</option>
                <option value="2">Lead #2 - Jane Smith</option>
                <option value="3">Lead #3 - Bob Johnson</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="employee" class="form-label">Assign To Employee</label>
              <select class="form-select" id="employee" name="employee_id">
                <option value="">-- Select Employee --</option>
                <option value="1">Abhi Kumar</option>
                <option value="2">Nisha Kumari</option>
                <option value="3">Pramod Rana</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success">
              <i class="fas fa-paper-plane"></i> Assign Lead
            </button>
          </form>
        </div>

      </div>
</div>
@endsection
