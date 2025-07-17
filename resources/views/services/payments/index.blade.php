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
                            Dashboard
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container-fluid px-4 mt-n10">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Payments</span>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                    <i class="fas fa-plus"></i> Add New
                </button>
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Plan</th>
                            <th>Price</th>
                            <th>Status</th>
                        
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Plan</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>

                    @foreach($payments as $payment)
                        <tr>
                            <td><a href="#"><strong>{{ $payment->profile->name ?? '-'}}</strong></a></td>
                            <td>{{ $payment->plan ?? '-'}}</td>
                            <td>{{ $payment->price ?? '-'}}</td>
                            @php
                                $status = $payment->status ?? '-';
                                $badgeClass = match($status) {
                                    'active' => 'bg-success',
                                    'pending' => 'bg-warning text-dark',
                                    'expired', 'failed' => 'bg-danger',
                                    'cancelled' => 'bg-secondary',
                                    default => 'bg-primary',
                                };
                            @endphp

                            <td>
                                <span class="badge rounded-pill {{ $badgeClass }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>

                    @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Payment Modal -->
    <div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('services.payments.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPaymentModalLabel">Create Payment Link</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">

                    <div class="mb-3">
                            <label for="profile_id" class="form-label">Prospect</label>
                            <select class="form-select select2" name="profile_id"  required>
                                <option value="">Select Prospect</option>
                                @foreach($profiles as $profile)
                            <option value="{{ $profile->id }}" @if(old('profile_id') == $profile->id) selected @endif>
                                {{ $profile->name }}
                            </option>                             
                               @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="plan" class="form-label">Plan Name</label>
                            <select id="plan" class="form-select" name="plan" required>
                                <option value="">Select Plan</option>
                                <option value="Exclusive 1 month">Exclusive 1 month</option>
                                <option value="Exclusive 3 month">Exclusive 3 month</option>
                                <option value="Exclusive 6 month">Exclusive 6 month</option>
                                <option value="Elite 3 months">Elite 3 months</option>
                                <option value="Exclushiv 45 days">Exclushiv 45 days</option>
                                <option value="1 year Exclusive">1 year Exclusive</option>
                                <option value="Open duration">Open duration</option>
                                <option value="Exclusive">Exclusive</option>
                            </select>

                     
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Amount (₹)</label>
                            <input type="number" value="{{ old('price')}}" name="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <select id="discount" class="form-select" name="discount">
                                <option value="0">No Discount</option>
                                <option value="5">5%</option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                            </select>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="expires_in" class="form-label">Link Expiration (Days)</label>
                            <input type="number" name="expires_in" class="form-control" placeholder="e.g. 7" required>
                        </div> -->
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Generate Link</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@push('css')

<style>
span.select2-dropdown.select2-dropdown--below {
    z-index: 999999;
}
    </style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
      
         @if ($errors->any())
                @if(old('plan'))
                    plan.value = "{{ old('plan') }}";
                @endif

                @if(old('discount'))
                    discount.value = "{{ old('discount') }}";
                @endif

            var addPaymentModal = new bootstrap.Modal(document.getElementById('addPaymentModal'));
            addPaymentModal.show();
           @endif


    });
</script>

@endpush




