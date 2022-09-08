@extends('layouts.app2')

@section('content')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/ceres-html-pro/assets/media/illustrations/dozzy-1/14.png">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Logo-->
        <a href="#" class="mb-12">
            <img alt="Logo" src="assets/img/logo.png" class="h-30px" />
        </a>
        <!--end::Logo-->
        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form method="post" class="form w-100" action="{{ route('register') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">{{ __('Register') }}</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4">Already have account? 
                    <a href="login" class="link-success fw-bolder">Login here</a></div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->

                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">{{ __('Name') }}</label>
                    <input class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" required />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
                    <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email" required />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">{{ __('Role') }}</label>
                    <select class="form-control form-control-lg form-control-solid @error('role') is-invalid @enderror" name="role" required>
                      <option value="user">User</option>
                      <option value="gardener">Gardener</option>
                      <option value="designer">Designer</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
                    </div>
                    <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" required />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Confirm Password') }}</label>
                    </div>
                    <input class="form-control form-control-lg form-control-solid " type="password" name="password_confirmation" autocomplete="off" required />
                </div>

                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <!--begin::Submit button-->
                    <button type="submit" id="kt_sign_in_submit" name="register" class="btn btn-lg btn-success w-100 mb-5">
                        {{ __('Register') }}
                    </button>
                    <!--end::Submit button-->
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
@endsection
