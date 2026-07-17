@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@section('auth_header', __('Register a new membership'))

@section('auth_body')
    <form action="{{ route('register') }}" method="post">
        @csrf

        {{-- حقل الاسم الكامل - يرسل كـ name ليتم حفظه في 'name' و 'full_name' [1] --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="{{ __('Full name') }}" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- حقل اسم المستخدم (Username) - مطلوب بطول 50 حرفاً في الـ ERD [2] --}}
        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}" placeholder="{{ __('Username') }}" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-badge"></span>
                </div>
            </div>
            @error('username')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- حقل البريد الإلكتروني (Email) - أساسي في قاعدة البيانات [2] ومطلوب في الكود [1] --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="{{ __('Email') }}" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- حقل كلمة المرور --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('Password') }}" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- حقل تأكيد كلمة المرور --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control"
                   placeholder="{{ __('Retype password') }}" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        {{-- زر التسجيل --}}
        <button type="submit" class="btn btn-primary btn-block btn-flat">
            <span class="fas fa-user-plus"></span> {{ __('Register') }}
        </button>
    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ route('login') }}" class="text-center">
            {{ __('I already have a membership') }}
        </a>
    </p>
@stop