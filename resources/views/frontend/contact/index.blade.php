@extends('layouts.admin')


@section('page-title')
    {{ __('Clients-Contacted Us') }}
@endsection

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Clients - Contacted Us') }}</h5>
    </div>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Contacted Us') }}</li>
@endsection



@section('content')
    <div class="row">
        @foreach ($contacts as $contact)
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card hover-shadow-lg">
                    <div class="card-header border-0 pb-0 pt-2 px-3">
                        <div class="row">
                            <div class="col-6 text-start">
                                <span class="badge bg-primary p-2 px-3 rounded">
                                    Contact US
                                </span>
                            </div>
                            <div class="col-6 text-end">
                                <div class="dropdown action-item">
                                    <a href="#" class="action-item" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- <!-- <a href="{{ route('contacts.edit', $contact->id) }}" class="dropdown-item"> --> --}}
                                        <a href="#" class="dropdown-item">
                                            <i class="ti ti-edit"></i> Edit
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            {{-- <!-- <a href="{{ route('contacts.show', $contact->id) }}" class="dropdown-item"> --> --}}
                                            <i class="ti ti-eye"></i> View
                                        </a>
                                        {{-- <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item show_confirm">
                                                <i class="ti ti-trash"></i> Delete
                                            </button>
                                        </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center client-box">
                        {{-- <div class="avatar-parent-child mb-3">
                            <!-- Placeholder for avatar or initials -->
                            <img src="https://via.placeholder.com/80" class="avatar rounded-circle avatar-lg" alt="Avatar"
                                style="width:80px;">
                        </div> --}}
                        <h5 class="h6 mt-4 mb-0">{{ $contact->client_name }}</h5>
                        <a href="mailto:{{ $contact->email }}" class="text-sm text-muted mb-3">{{ $contact->email }}</a>
                        <p class="card-text mt-2"><strong>Message:</strong> {{ $contact->message }}</p>
                        <p class="card-text"><strong>Budget:</strong> {{ $contact->budget }}</p>
                        <p class="card-text"><strong>NDA Agreement:</strong> {{ $contact->nda_agreement }}</p>
                        <p class="card-text"><strong>Document:</strong> {{ $contact->document }}</p>
                        <p class="card-text"><strong>Purpose:</strong></p>
                        @foreach (json_decode($contact->purpose) as $purpose)
                            <span class="badge bg-primary">{{ $purpose }}</span>
                        @endforeach
                        <p class="card-text mt-2"><strong>Services:</strong></p>
                        @foreach (json_decode($contact->services) as $service)
                            <span class="badge bg-success">{{ $service }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ route('contact-us.create') }}" class="btn-addnew-project">
                <div class="bg-primary proj-add-icon">
                    <i class="ti ti-plus"></i>
                </div>
                <h6 class="mt-4 mb-2">{{ __('New Contact') }}</h6>
                <p class="text-muted text-center">{{ __('Click here to add new contact') }}</p>
            </a>
        </div>

    </div>
@endsection
