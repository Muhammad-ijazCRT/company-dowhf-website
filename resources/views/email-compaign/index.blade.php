@extends('layouts.admin')

@section('page-title')
    {{ __('Email Compaign') }}
@endsection

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> {{ __('Run Email Compaign') }}</h5>
    </div>
    <style>
        .select-items {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 5px;
        }
        .select-items span {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            display: inline-block;
        }
    </style>

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('emailCompaign') }}">{{ __('Email Compaign') }}</a></li>
@endsection

@section('content')

    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row justify-content-center align-content-center ">
                <div class="col-xl-9">
                    <form action="{{ route('runCompaign') }}" method="POST">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{-- <label for="email" class="form-label">Select E-Mail></label> --}}

                                    <label for="email-input" class="form-label">Select or Enter Emails</label>
                <input type="text" id="email-input" class="form-control" list="email-options" placeholder="Select or enter emails">
                <datalist id="email-options">
                    @foreach ($emails as $email)
                        <option value="{{ $email->email }}">{{ $email->email }}</option>
                    @endforeach
                </datalist>
                <input type="hidden" name="selected_emails" id="selected-emails">
                <div class="select-items" id="select-items"></div>

                                    {{-- <div class="col-sm-12">
                                        <input type="text" class="form-control" name="datalist" list="datalist">
                                         <select class="form-select" name="datalist" list="datalist" multiple aria-label="multiple select example">
                                            <datalist id="datalist">
                                                @foreach ($emails as $email)
                                                    <option value="{{ $email->email }}">{{ $email->email }}</option>
                                                @endforeach
                                            </datalist>
                                        </select> --}}

                                    </div> 
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label" for="c_email">Subject<span class="steric">*</span></label>
                                <input class="form-control" type="email" id="c_email" name="name" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea3">Message<span class="steric">*</span></label>
                                <textarea class="form-control" id="exampleFormControlTextarea3" name="message" rows="7"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary d-flex align-items-center">Run
                                    Compaign!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email-input');
            const selectedEmailsInput = document.getElementById('selected-emails');
            const selectItemsContainer = document.getElementById('select-items');

            emailInput.addEventListener('change', function () {
                const email = emailInput.value.trim();

                if (email && !selectedEmailsInput.value.split(',').includes(email)) {
                    // Add to the hidden input value
                    if (selectedEmailsInput.value) {
                        selectedEmailsInput.value += `,${email}`;
                    } else {
                        selectedEmailsInput.value = email;
                    }

                    // Add to the display container
                    const emailSpan = document.createElement('span');
                    emailSpan.textContent = email;
                    selectItemsContainer.appendChild(emailSpan);
                }

                // Clear the input field
                emailInput.value = '';
            });
        });
    </script>
@endsection
