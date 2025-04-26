@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@section('auth_header', __('Register a new membership'))

@section('auth_body')
    <form action="{{ route('register') }}" method="post">
        @csrf

        {{-- Full Name --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" placeholder="{{ __('Full name') }}" autofocus autocomplete="name">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Email --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" placeholder="{{ __('Email') }}" autocomplete="email">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ __('Password') }}" autocomplete="new-password">

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

        {{-- Password Confirmation --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control"
                placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        {{-- Role Selection --}}
        <div class="input-group mb-3">
            <select name="role" class="form-control @error('role') is-invalid @enderror">
                <option value="">-- Select Role --</option>
                <option value="dokter" {{ old('role') == 'dokter' ? 'selected' : '' }}>Dokter</option>
                <option value="pasien" {{ old('role') == 'pasien' ? 'selected' : '' }}>Pasien</option>
            </select>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user-tag {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Register Button --}}
        <button type="submit" class="btn btn-block btn-primary">
            <span class="fas fa-user-plus"></span>
            {{ __('Register') }}
        </button>
    </form>
@endsection

@section('auth_footer')
    <p class="my-0">
        <a href="{{ route('login') }}">
            {{ __('I already have a membership') }}
        </a>
    </p>
@endsection
