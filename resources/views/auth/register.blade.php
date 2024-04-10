{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- ---------------------------------------------------- --}}

@extends('frontend.layouts.master')

@section('title')
    Register
@endsection

@section('contents')
<section class="login mb-5">
      <div class="row">
        <div class="col-md-12 px-lg-5 pt-3">
            <div class="tab-content px-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Register</h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-pane mb-5" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="row mt-5">
                                        <div class="col-md-4 pt-5">
                                        <div class="float-start mb-4">
                                            <div class="spinner-grow text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-secondary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-success" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-danger" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-warning" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-info" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-dark" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                        <img src="{{ asset('frontend/images/dng.avif') }}" class="img-fluid mt-5 pe-sm-5" alt="...">
                                        </div>
                                        <div class="col-md-4">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="row">
                                                    <!-- Name -->
                                                    <div class="col-md-12">
                                                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Name</label>
                                                        <input type="text" class="form-control shadow-lg mt-2" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                                                    </div>
                                                    <!-- Email Address -->
                                                    <div class="col-md-12 mt-4">
                                                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Email</label>
                                                        <input type="email" id="email" class="form-control shadow-lg mt-2" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                                    </div>
                                                    <!-- Password -->
                                                    <div class="col-md-12 mt-4">
                                                        <label for="exampleFormControlTextarea1" class="form-labe fw-bolder">Password</label>
                                                        <input type="password" id="password"  name="password" class="form-control shadow-lg mt-2"  placeholder="Enter Password">
                                                    </div>
                                                    <!-- Confirm Password -->
                                                    <div class="col-md-12 mt-4">
                                                        <label for="exampleFormControlTextarea1" class="form-labe fw-bolder">Confirm Password</label>
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control shadow-lg mt-2"  placeholder="Enter Confirm Password">
                                                    </div>
                                                    <div class="col-md-12 mt-4">
                                                            <button type="submit" class="btn btn-warning w-100 fw-bold shadow-lg text-white">Register</button>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <a class="link-success" href="{{ route('login') }}">Already registered? Login</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4 pt-5">
                                            <div class="float-end mb-4">
                                            <div class="spinner-grow text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-secondary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-success" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-danger" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-warning" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-info" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-light" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-dark" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            </div>
                                            <img src="{{ asset('frontend/images/dng.avif') }}" class="img-fluid mt-5 ps-5" alt="...">
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
