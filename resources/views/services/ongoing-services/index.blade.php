@extends('layouts.main')

@section('title', 'Ongoing Services')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('services.ongoing-services.index') ? 'active' : '' }}" href="{{ route('services.ongoing-services.index') }}">All Clients <span class="badge badge-white">10</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Basic Plan <span class="badge badge-primary">5</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Premium Plan <span class="badge badge-primary">5</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Active <span class="badge badge-primary">1</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Expiring Soon <span class="badge badge-primary">1</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Expired <span class="badge badge-primary">8</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ongoing Services</h4>
                </div>
                <div class="card-body">
                    <div class="float-left">
                        <div class="selectric-wrapper selectric-form-control selectric-selectric selectric-below">
                            <select class="form-control selectric">
                                <option>Action For Selected</option>
                                <option>Mark as Active</option>
                                <option>Mark as Expiring Soon</option>
                                <option>Mark as Expired</option>
                                <option>Delete Permanently</option>
                            </select>
                        </div>
                    </div>
                    <div class="float-right">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by Client Name">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="pt-2">
                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label"> </label>
                                        </div>
                                    </th>
                                    <th><a href="#" class="sort-link">Client</a></th>
                                    <th><a href="#" class="sort-link">Plan</a></th>
                                    <th><a href="#" class="sort-link">Start Date</a></th>
                                    <th><a href="#" class="sort-link">End Date</a></th>
                                    <th><a href="#" class="sort-link">Status</a></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Rahul Sharma</td>
                                    <td>Premium</td>
                                    <td>2025-06-01</td>
                                    <td>2025-12-31</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-2">
                                            <label for="checkbox-2" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Pooja Verma</td>
                                    <td>Basic</td>
                                    <td>2025-06-10</td>
                                    <td>2025-06-30</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                    <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-3">
                                            <label for="checkbox-3" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Neha Patel</td>
                                    <td>Basic</td>
                                    <td>2025-06-20</td>
                                    <td>2025-07-02</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                     <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-4">
                                            <label for="checkbox-4" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Arjun Mehta</td>
                                    <td>Premium</td>
                                    <td>2025-05-01</td>
                                    <td>2025-06-26</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                     <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-5">
                                            <label for="checkbox-5" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Rohan Das</td>
                                    <td>Premium</td>
                                    <td>2025-04-15</td>
                                    <td>2025-07-15</td>
                                    <td><span class="badge badge-warning">Expiring Soon</span></td>
                                    <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-6">
                                            <label for="checkbox-6" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Simran Kaur</td>
                                    <td>Basic</td>
                                    <td>2025-06-01</td>
                                    <td>2025-06-29</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                     <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-7">
                                            <label for="checkbox-7" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Karan Singh</td>
                                    <td>Premium</td>
                                    <td>2025-05-20</td>
                                    <td>2025-06-28</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                    <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-8">
                                            <label for="checkbox-8" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Aisha Khan</td>
                                    <td>Basic</td>
                                    <td>2025-04-01</td>
                                    <td>2025-06-20</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                    <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-9">
                                            <label for="checkbox-9" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Vikas Jain</td>
                                    <td>Premium</td>
                                    <td>2025-03-01</td>
                                    <td>2025-06-30</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                     <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="ongoing-services" class="custom-control-input" id="checkbox-10">
                                            <label for="checkbox-10" class="custom-control-label"> </label>
                                        </div>
                                    </td>
                                    <td>Priya Iyer</td>
                                    <td>Basic</td>
                                    <td>2025-06-10</td>
                                    <td>2025-06-25</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                     <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <a href="#" class="text-info m-1" title="View">
                                                <i class="fas fa-eye fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-warning m-1" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            <a href="#" class="text-danger m-1" title="Trash" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .sort-link { color: #6777ef; text-decoration: none; }
    .sort-link:hover { text-decoration: underline; }
</style>
@endsection
