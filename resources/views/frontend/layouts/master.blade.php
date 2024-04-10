<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!--Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="container-fluid bg-white">
        <div class="row">
             {{-- Start header --}}
            @include('frontend.layouts.header')
             {{-- Etart header --}}
            <main>
                @yield('contents')

                <section class="end">
                    <div class="row bg-primary h-50 mt-5">
                         <div class="col-md-12">
                              <h3 class="text-white text-center pt-3">Tháng 11, đăng ký HỘI VIÊN COOLCLUB - Nhận voucher 15% + quà độc quyền</h3>
                         </div>
                         <div class="col-md-12 pt-3 pb-3">
                              <div class="row">
                                  <div class="col-md-6">
                                    <button class="btn btn-light fw-bold rounded-pill text-primary float-end">THAM GIA MIỄN PHÍ hoặc ĐĂNG NHẬP</button>
                                  </div>
                                  <div class="col-md-6">
                                    <button class="btn btn-primary fw-bold border-white rounded-pill text-white float-start">Tìm hiểu đặc quyền Hội viên CoolClub</button>
                                  </div>
                              </div>
                         </div>
                    </div>
                </section>
            </main>

             {{-- Start footer --}}
            @include('frontend.layouts.footer')
             {{-- End footer --}}
        </div>
    </div>

    <script src="https://kit.fontawesome.com/20e78b6934.js" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.7.1.js') }}"></script>
    <!--Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                // Set an error toast, with a title
                toastr.error("{{$error}}", 'Error');
            @endforeach
        @endif
    </script>
    @stack('scripts')
</body>
</html>
