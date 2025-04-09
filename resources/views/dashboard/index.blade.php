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
          

                <div class="img_main position-relative">
                    <img src="{{ asset('admin/assets/Vector (5).png') }}" class="position-absolute top-0" alt="">
                    <h1 class="pt-5">Welcome</h1>
                    <h1 class="color_bakup index-main">{{ auth('admin')->user()->name }} </h1>
                    <img src="{{ asset('admin/assets/Vector (7).png') }}" class="position-absolute img_line" alt="">
                    <img src="{{ asset('admin/assets/Group (3).png') }}" class="position-absolute img_line2" alt="">
                    <img src="{{ asset('admin/assets/Vector (4).png') }}" class="position-absolute img_line2" alt="">
                    <img src="{{ asset('admin/assets/Vector (8).png') }}" class="position-absolute img_line3" alt="">
                </div>

                <!-- Welcome Section -->
                <section class="analytics">
                    <div class="container mt-4">
                        <div class="d-flex justify-content-center mb-4">
                            <h2>Welcome to the Admin Panel  {{ auth('admin')->user()->name }}</h2>

                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>
</body>
</html>
