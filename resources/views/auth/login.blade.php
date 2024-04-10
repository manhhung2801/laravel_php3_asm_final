{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('frontend.layouts.master')

@section('title')
    Login
@endsection

@section('contents')
<section class="login mb-5">
      <div class="row">
        <div class="col-md-12 px-lg-5 pt-3">
            <div class="tab-content px-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-pane fade show active mb-5" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/images/db1022.webp') }}" class="img-fluid pt-2 pe-5" alt="...">
                                </div>
                                <div class="col-md-4">
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <!-- Email Address -->
                                                <div class="col-md-12">
                                                    <label for="exampleFormControlInput1" class="form-label fw-bolder">Email</label>
                                                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control shadow-lg mt-2"  placeholder="Enter name@gmail.com">
                                                </div>

                                                <!-- Password -->
                                                <div class="col-md-12 mt-4">
                                                    <label for="exampleFormControlTextarea1" class="form-labe fw-bolder">Password</label>
                                                    <input id="password" type="password" name="password" class="form-control shadow-lg mt-2" placeholder="Enter Password">
                                                </div>
                                                <!-- Remember Me -->
                                                <div class=".col-md-12 form-check mt-3 ms-3">
                                                    <input id="remember_me" class="form-check-input" type="checkbox" name="remember" value="" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Check
                                                    </label>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <button type="submit" class="btn btn-success w-100 fw-bold shadow-lg text-white">Submit</button>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    @if (Route::has('password.request'))
                                                        <a class="link-secondary" href="{{ route('password.request') }}">Forgot your password?</a>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <a class="link-danger" href="{{ route('register') }}">Register</a>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/images/db101.webp') }}" class="img-fluid pt-2 ps-5" alt="...">
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

