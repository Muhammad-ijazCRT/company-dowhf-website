@extends('layouts.admin')

@section('page-title')
    {{ __('Contact Create') }}
@endsection

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> {{ __('Contact Create') }}</h5>
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('contact-us.create') }}">{{ __('Employee Create') }}</a></li>
@endsection

@section('content')
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row justify-content-center align-content-center ">
                {{-- <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0">{{ __('Personal Info') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-2"
                                class="list-group-item list-group-item-action border-0">{{ __('Company Info') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-3"
                                class="list-group-item list-group-item-action border-0">{{ __('Bank Info') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        </div>
                    </div>
                </div> --}}


                <div class="col-xl-9">
                    <form action="{{ route('custom.contact.add') }}" method="POST">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="c_name">Full Name<span class="steric">*</span></label>
                                    <input class="form-control" type="text" id="c_name" name="name" placeholder="John Deo" minlength="2" maxlength="50" required />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="c_email">Email<span class="steric">*</span></label>
                                <input class="form-control" type="email" id="c_email" name="email" placeholder="example@xyz.com" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="branch_id">Branch</label>
                                <select class="form-control select" id="branch_id" name="branch_id" required>
                                    <!-- Options for Branch -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="department_id">Department</label>
                                <select class="form-control select" id="department_id" name="department_id" required>
                                    <!-- Options for Department -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="designation_id">Designation</label>
                                <select class="form-control select" id="designation_id" name="designation_id" required>
                                    <!-- Options for Designation -->
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="joining_date">Date of Joining</label>
                                    <input class="form-control" type="date" id="joining_date" name="joining_date" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="exit_date">Date of Exit</label>
                                    <input class="form-control" type="date" id="exit_date" name="exit_date" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="salary_type">Salary Type</label>
                                    <select class="form-control multi-select" id="salary_type" name="salary_type">
                                        <!-- Options for Salary Type -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="salary">Salary</label>
                                    <input class="form-control" type="number" id="salary" name="salary" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary d-flex align-items-center">Send us a message!</button>
                            </div>
                        </div>
                    </form>

                    

                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection
