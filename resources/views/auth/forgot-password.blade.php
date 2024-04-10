{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('frontend.layouts.master')

@section('title')
    Forgot Password
@endsection

@section('contents')
<section class="login mb-5">
      <div class="row">
        <div class="col-md-12 px-lg-5 pt-3">
            <div class="tab-content px-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Forgot Password</h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-pane mb-5" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="row mt-5">
                                <div class="col-md-3">
                                    <div class="float-start">
                                        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="row">
                                            <h3 class="mt-3">Bạn vui lòng nhập đúng email đang ký chúng tôi sẻ gửi mã xác nhận cho bạn.</h3>
                                            <!-- Email Address -->
                                            <div class="col-md-12 mt-4">
                                                <label for="exampleFormControlInput1" class="form-label fw-bolder">Email</label>
                                                <input type="email" id="email"  name="email" class="form-control shadow-lg mt-2" value="{{ old('email') }}" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <button type="submit" class="btn btn-danger float-start fw-bold shadow-lg text-white">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                        <div class="float-end">
                                        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
      </div>
</section>
@endsection
