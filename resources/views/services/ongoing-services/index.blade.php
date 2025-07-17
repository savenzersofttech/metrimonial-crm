@extends('layouts.sb2-layout')
@section('title', 'Ongoing Services')
@section('content')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-fluid px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Ongoing Services
                            </h1>
                           
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
                <div class="card-header">Personnel Management</div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Plan</th>
                               
                                <th>Start Date</th>
                                <th>End Date</th>
                              
                                <th>Status</th>
                                <th>Actions</th>
                             
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Plan</th>
                                
                                <th>Start Date</th>
                                <th>End Date</th>
                              
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          
                           
                           
                            <tr>
                                <td><a href="">Rahul Sharma</td>
                                    <td>Premium</td>
                                    <td>2025-06-01</td>
                                   
                                    <td>2025-12-31</td>

                                    
                                
                                <td>
                                    <div class="badge bg-success text-white rounded-pill">Active</div>
                                </td>
                                <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i
                                            class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
