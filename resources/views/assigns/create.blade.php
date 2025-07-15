@extends('layouts.main')
@section('title', 'Assign Profiles to Employee')
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Assign Profiles to Employee</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.assigns.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="employee_id">Select Employee</label>
                <select name="employee_id" class="form-control" required>
                    <option value="">-- Select Employee --</option>
                    @foreach ($employees as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }} ({{ $emp->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="profile_ids">Select Profiles</label>
                <select name="profile_ids[]" class="form-control select2" multiple required>
                    @foreach ($profiles as $profile)
                        <option value="{{ $profile->id }}">{{ $profile->name }} - {{ $profile->email }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="note">Note (Optional)</label>
                <textarea name="note" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.select2').select2({
        placeholder: "Select profiles",
        allowClear: true
    });
</script>
@endpush
