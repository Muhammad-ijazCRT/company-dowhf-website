@extends('layouts.auth')

@php
$footer_text = isset(\App\Models\Utility::settings()['footer_text']) ? \App\Models\Utility::settings()['footer_text'] : '';
\App\Models\Utility::setCaptchaConfig();

@endphp
@section('page-title')
    {{__('Register')}}
@endsection
@push('custom-scripts')
@if(\App\Models\Utility::getValByName('recaptcha_module') == 'yes')
        {!! NoCaptcha::renderJs() !!}
@endif
@endpush

@section('language')
    @foreach(Utility::languages() as $code => $language)
    <a href="{{ route('register',$code) }}" tabindex="0" class="dropdown-item {{ $code == $lang ? 'active':'' }}">
        <span>{{ ucFirst($language)}}</span>
    </a>
    @endforeach
@endsection

@section('content')
    <div class="card-body">
        <div>
            <h2 class="mb-3 f-w-600">{{ __('Register') }}</h2>
        </div>
        @if (session('status'))
            <div class="mb-4 font-medium text-lg text-green-600 text-danger">
                {{ __('Email SMTP settings does not configured so please contact to your site admin.') }}
            </div>
        @endif
        <div class="custom-login-form">
            {{ Form::open(['route' => 'register', 'method' => 'post', 'id' => 'loginForm']) }}
                <div class="form-group mb-3">
                    <label class="form-label d-flex">{{ __('Full Name') }}</label>
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Username')]) }}
                    @error('name')
                    <span class="error invalid-name text-danger" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label d-flex">{{ __('Email') }}</label>
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email address')]) }}
                    @error('email')
                    <span class="error invalid-email text-danger" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label d-flex">{{ __('Password') }}</label>
                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'input-password', 'placeholder' => __('Password')]) }}
                    @error('password')
                    <span class="error invalid-password text-danger" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                    <label class="form-control-label d-flex">{{ __('Confirm password') }}</label>
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'confirm-input-password', 'placeholder' => __('Confirm Password')]) }}

                    @error('password_confirmation')
                        <span class="error invalid-password_confirmation text-danger" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <input type="hidden" name="used_referral_code" value="{{ request()->input('ref_id') }}">


                @if(\App\Models\Utility::getValByName('recaptcha_module') == 'yes')
						<div class="form-group mb-4">
							{!! NoCaptcha::display() !!}
							@error('g-recaptcha-response')
								<span class="error small text-danger" role="alert">
									<small>{{ $message }}</small>
								</span>
							@enderror
						</div>
					@endif
                <div class="d-grid">
                <button class="btn btn-primary mt-2">
                    {{ __('Register') }}
                </button>
                </div>
            {{ Form::close() }}

            @if (\App\Models\Utility::getValByName('SIGNUP') == 'on')
                <p class="my-4 text-center">{{__('Already have an account?') }} <a href="{{ url('login/'."$lang") }}" tabindex="0">{{ __('Login') }}</a></p>
            @endif
        </div>
    </div>

@endsection
