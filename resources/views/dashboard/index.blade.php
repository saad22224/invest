<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateBook</title>
    <link href="{{ asset('admin/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <script defer src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
       @include('layouts.sidebar')

            <!-- Main Content ms-sm-auto px-md-4 -->
            <main class="col-md-11 ">
                <!-- Header -->
          

                <div class="img_main position-relative">
                    <img src="{{ asset('admin/assets/Vector (5).png') }}" class="position-absolute top-0" alt="">
                    <h1 class="pt-5">Welcome</h1>
                    <h1 class="color_bakup index-main"> {{ auth('admin')->user()->name }}</h1>
                    <img src="{{ asset('admin/assets/Vector (7).png') }}" class="position-absolute img_line" alt="">
                    <img src="{{ asset('admin/assets/Group (3).png') }}" class="position-absolute img_line2" alt="">    
                    <img src="{{ asset('admin/assets/Vector (4).png') }}" class="position-absolute img_line2" alt="">
                    <img src="{{ asset('admin/assets/Vector (8).png') }}" class="position-absolute img_line3" alt="">
                </div>
                
                <!-- Analytics -->
                <section class="analytics">
                    <div class="container mt-4">
                        <div class="ms-3 ms-md-0 d-flex justify-content-between mb-2">
                            {{-- <h2 class="mt-2">Analytics</h2> --}}
                            <div class="input_analytics d-flex mb-3 mt-2 mt-md-0">
                                {{-- <label for="" class="text-muted w-50 align-self-center me-2">Showing data for:</label>
                                <select name="" id="" class="form-select text-black text-muted">
                                    <option value="">11 May - 11 June 2020</option>
                                </select> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-12 mt-4 ">
                                <div class="w-100 mb-4 ms-2 ms-md-0 ">
                                    <div class="card-1 p-4 shadow rounded-4">
                                        <h6>total users balance</h6>
                                        <div class="visitor d-flex justify-content-between">
                                            <div class="d-flex paper">
                                                <img src="{{ asset('admin/assets/Group.png') }}" class="align-self-center" alt="">
                                                <h3 class="ms-4 align-self-center">{{$totalusersbalance}}</h3>
                                            </div>
                                            <img src="{{ asset('admin/assets/Group 1000008082.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-2 ms-md-0 w-100 mb-4 rounded-4">
                                    <div class="card-1 p-4 shadow rounded-4">
                                        <h6> total users</h6>
                                        <div class="visitor d-flex justify-content-between">
                                            <div class="d-flex paper">
                                                <img src="{{ asset('admin/assets/Group (1).png') }}" class="align-self-center" alt="">
                                                <h3 class="ms-4  align-self-center">{{ $totalusers}}</h3>
                                            </div>
                                            <img src="{{ asset('admin/assets/Group 1000008082 (1).png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-2 ms-md-0 mb-4 rounded-4">
                                    <div class="card-1 p-4 shadow rounded-4">
                                        <h6>total users withdrawals</h6>
                                        <div class="visitor d-flex justify-content-between">
                                            <div class="d-flex paper">
                                                <img src="{{ asset('admin/assets/Group (2).png') }}" class="align-self-center" alt="">
                                                <h3 class="ms-4 align-self-center">{{$totaluserswithdrawals}}</h3>
                                            </div>
                                            <img src="{{ asset('admin/assets/Group 1000008082 (2).png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-2 ms-md-0 mb-4 rounded-4">
                                    <div class="card-1 p-4 shadow rounded-4">
                                        <h6>total withdrawals</h6>
                                        <div class="visitor d-flex justify-content-between">
                                            <div class="d-flex paper">
                                                <img src="{{ asset('admin/assets/Group (2).png') }}" class="align-self-center" alt="">
                                                <h3 class="ms-4 align-self-center">{{$totalwithdrawals}}</h3>
                                            </div>
                                            <img src="{{ asset('admin/assets/Group 1000008082 (2).png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-2 ms-md-0 mb-4 rounded-4">
                                    <div class="card-1 p-4 shadow rounded-4">
                                        <h6>total users deposits</h6>
                                        <div class="visitor d-flex justify-content-between">
                                            <div class="d-flex paper">
                                                <img src="{{ asset('admin/assets/Group (2).png') }}" class="align-self-center" alt="">
                                                <h3 class="ms-4 align-self-center">{{$totalusersdeposits}}</h3>
                                            </div>
                                            <img src="{{ asset('admin/assets/Group 1000008082 (2).png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-2 ms-md-0 mb-4 rounded-4">
                                    <div class="card-1 p-4 shadow rounded-4">
                                        <h6>total  deposits</h6>
                                        <div class="visitor d-flex justify-content-between">
                                            <div class="d-flex paper">
                                                <img src="{{ asset('admin/assets/Group (2).png') }}" class="align-self-center" alt="">
                                                <h3 class="ms-4 align-self-center">{{$totaldeposits}}</h3>
                                            </div>
                                            <img src="{{ asset('admin/assets/Group 1000008082 (2).png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-8 col-md-12 ">
                                <div class="card  p-4 shadow ms-2 ms-md-0">
                                    <div class="d-flex justify-content-between">
                                        <div class="my-3">                            
                                            <h6 class="mb-3">Monthly Revenue</h6>
                                            <div class="d-flex">
                                                <h3>$120,544 </h3><span class="text-muted ms-3">from $180,000</span>
                                            </div>                                       
                                        </div>
                                        <div class="card_profit text-center mt-4">
                                            <span class="ms-5">3,5%</span> 
                                            <p class="text-muted">Overall profit</p>
                                        </div>
                                    </div>
                                    <div class="chart bg-light position-relative">
                                        <img src="{{ asset('admin/assets/Group 1000008120.png') }}" class="position-absolute progress-line " alt="">
                                        <img src="{{ asset('admin/assets/Vector 24.png') }}" class="position-absolute progress-line1 " alt="">
                                    </div>
                                    <div class="container">
                                        <div class="day pt-3 fw-bold d-flex justify-content-between position-relative">
                                            <p>Wed</p>
                                            <p>Thu</p>
                                            <p class="ms-2">Fri</p>
                                            <p>Sat</p>
                                            <p>Sun</p>
                                            <img src="{{ asset('admin/assets/Group 1000008124 (1).png') }}" class="position-absolute" alt="">
                                            <p>Mon</p>
                                            <p>Wed</p>
                                            <p>Thu</p>
                                            <p>Fri</p>
                                            <p class="me-2">Fri</p>
                                        </div>
                                        <div class="day d-flex justify-content-between">
                                            <p class="ms-2">14</p>
                                            <p class="ms-1">15</p>
                                            <p class="ms-2">16</p>
                                            <p>17</p>
                                            <p>18</p>
                                            <p class="ms-3">19</p>
                                            <p class="ms-2">20</p>
                                            <p>21</p>
                                            <p>22</p>
                                            <p class="me-2">23</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

               
                    