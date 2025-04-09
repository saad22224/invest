<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Plan</title>
    <link href="{{ asset('admin/css/poppins.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <!-- Main Content -->
            <main class="col-md-11 ">
                <!-- Header -->
                <div class="d-flex justify-content-between overflow-hidden border-bottom nav-create py-1">
                    <div class="d-md-flex d-none mb-5 align-self-center create ms-2 position-absolute ">
                        <img src="{{ asset('admin/assets/Group 1000007853.png') }}" class="ms-md-3 mb-md-1" alt="logo">
                        <h4 class="text-center mt-md-1 me-5 me-md-5 ms-md-2">Edit Plan</h4>
                    </div>
                </div>

                <div class="container-fluid container-lg backup security">
                    <div class="d-flex justify-content-between mt-4">
                        <h3 class="me-2 mb-4 fw-bold">Edit Plan</h3>
                    </div>

                    <!-- Form to Update Plan -->
                    <form action="{{ route('plans.update', $plan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="shadow rounded-3 overflow-hidden p-4 border mb-3 mt-3">
                            <div class="info_security pb-2">
                                <h4>Edit Plan Details</h4>
                            </div>

                            <div class="input_group">

                                <!-- Plan Name -->
                                <div class="d-flex my-4 align-items-center">
                                    <p class="mt-2 me-5 w-25">Plan Name*</p>
                                    <input type="text" name="name" class="form-control w-50 mx-auto" required value="{{ $plan->name }}">
                                </div>

                                <!-- Description -->
                                <div class="d-flex my-4 align-items-center">
                                    <p class="mt-2 me-5 w-25">Description*</p>
                                    <textarea name="description" class="form-control w-50 mx-auto" rows="2" required>{{ $plan->description }}</textarea>
                                </div>

                                <!-- Profit Margin -->
                                <div class="d-flex my-4 align-items-center">
                                    <p class="mt-2 me-5 w-25">Profit Margin (%)*</p>
                                    <input type="number" step="0.01" name="profit_margin" class="form-control w-50 mx-auto" required value="{{ $plan->profit_margin }}">
                                </div>

                                <!-- Duration Days -->
                                <div class="d-flex my-4 align-items-center">
                                    <p class="mt-2 me-5 w-25">Duration (Days)*</p>
                                    <input type="number" name="duration_days" class="form-control w-50 mx-auto" required value="{{ $plan->duration_days }}">
                                </div>

                                <!-- Price -->
                                <div class="d-flex my-4 align-items-center">
                                    <p class="mt-2 me-5 w-25">Price ($)*</p>
                                    <input type="number" step="0.01" name="price" class="form-control w-50 mx-auto" required value="{{ $plan->price }}">
                                </div>

                                <!-- Submit -->
                                <div class="d-flex mb-4">
                                    <button type="submit" class="button_Adduser">Update Plan</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
