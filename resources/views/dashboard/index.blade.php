<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateBook</title>
    <link href="{{ asset('admin/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <script defer src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Main Content -->
            <main class="col-md-11">
                <!-- Header -->
                <div class="d-flex justify-content-between overflow-hidden border-bottom nav-create py-1">
                    <div class="d-md-flex d-none mb-5 align-self-center create ms-2 position-absolute">
                        <img src="{{ asset('admin/assets/Group 1000007853.png') }}" class="ms-md-3 mb-md-1" alt="logo">
                        <h4 class="text-center mt-md-1 me-5 me-md-5 ms-md-2">CreateBook</h4>
                    </div>
                    <div class="info_nav d-flex align-self-center mt-3 ms-lg-3 ms-md-5 ms-1">
                        <a href=""><p class="ms-2 ms-md-5 about ms-lg-5">About Us</p></a>
                        <a href=""><p class="ms-4">Plan & Pricing</p></a>
                    </div>
                    <div class="btn_nav d-flex justify-content-between">
                        <div class="button-container d-flex align-self-center me-2 ms-sm-5">
                            <button class="upgrade-button w-50 me-3">Upgrade to<span class="p-md-1 ms-1">PRO</span></button>
                            <input type="text" placeholder="Search" class="form-control ps-md-4 position-relative align-self-center">
                        </div>

                        <div class="ms-4 d-flex me-3">
                            <i class="fa-regular img_nav fa-circle-question me-2 align-self-center ps-3"></i>
                            <i class="fa-regular fa-bell me-2 align-self-center ms-md-1"></i>
                            <img src="{{ asset('admin/assets/image (10).png') }}" class="align-self-center ms-md-2" alt="user">
                            <i class="fa-solid fa-chevron-down fa-2xs align-self-center text-muted ms-1"></i>
                        </div>
                    </div>
                </div>

                <div class="img_main position-relative">
                    <img src="{{ asset('admin/assets/Vector (5).png') }}" class="position-absolute top-0" alt="">
                    <h1 class="pt-5">Welcome</h1>
                    <h1 class="color_bakup index-main">Abdul Kader!</h1>
                    <img src="{{ asset('admin/assets/Vector (7).png') }}" class="position-absolute img_line" alt="">
                    <img src="{{ asset('admin/assets/Group (3).png') }}" class="position-absolute img_line2" alt="">
                    <img src="{{ asset('admin/assets/Vector (4).png') }}" class="position-absolute img_line2" alt="">
                    <img src="{{ asset('admin/assets/Vector (8).png') }}" class="position-absolute img_line3" alt="">
                </div>

                <!-- Welcome Section -->
                <section class="analytics">
                    <div class="container mt-4">
                        <div class="d-flex justify-content-center mb-4">
                            <h2>Welcome to the Admin Panel,  {{Auth::user() ? Auth::user()->name : 'A7a'}}</h2>

                            {{-- {{dd(auth()->user())}} --}}
                           {{-- {{ dd(session()->all()) }} --}}
                           {{ dd(Auth::user())}}
                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>
</body>
</html>
