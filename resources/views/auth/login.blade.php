@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', __('Sign in to start your session'))

@section('auth_body')
    <form action="{{ route('login') }}" method="post">
        @csrf

        {{-- Username - متوافق مع الـ ERD --}}
        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password Field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('Password') }}" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Sign in Button and Remember Me --}}
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('Sign In') }}
                </button>
            </div>
        </div>
    </form>
@stop

@section('auth_footer')
    {{-- Password Reset Link --}}
    <p class="mb-1">
        <a href="{{ route('password.request') }}">
            {{ __('I forgot my password') }}
        </a>
    </p>

    {{-- Register a new membership --}}
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">
            {{ __('Register a new membership') }}
        </a>
    </p>
@stop