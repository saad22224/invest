<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Book</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.sidebar')
    
            <!-- Main Content ms-sm-auto px-md-4 -->
            <main class="col-md-11 ">
                <div class="img_managment2 position-relative">
                    <img src="{{ asset('admin/assets/Vector (5).png') }}" class="position-absolute top-0" alt="">
                    <h1 class="w-100 text-center">Subscription Managment</h1>
                    <a href="{{route('plans.create')}}" 
                    class="button_Adduser position-absolute z-1 ">Create New Plan</a>
                    <img src="{{ asset('admin/assets/Vector (7).png') }}" class="position-absolute img_line" alt="">
                    <img src="{{ asset('admin/assets/Group (3).png') }}" class="position-absolute img_line2" alt="">    
                    <img src="{{ asset('admin/assets/Vector (4).png') }}" class="position-absolute img_line2" alt="">
                    <img src="{{ asset('admin/assets/Vector (8).png') }}" class="position-absolute img_line3" alt="">
                </div>

                <div class="container-fluid container-lg">
                    <div class="mt-4 all-sub">
                        <a href="./submanagment.html"> <h2>All Plans</h2>  </a>
                    </div>

                    <div class="border rounded-5  mt-3 overflow-hidden shadow p-3 sub-table ">
                        <div class="table-responsive">
                            <table class="table table-hover border-0 p-4  align-middle  text-center  ">
                                <thead >
                                  <tr class="pt-3">
                                    <th scope="col">User Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">profit</th>
                                    <th scope="col" >duration</th>
                                    <th scope="col" >price</th>
                                    <th scope="col">ACTIONS</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                    <tr>
                                      <td class="pb-4 basic">
                                        <p class="mt-3 basic">{{$plan->name}}</p>
                                      </td>
                                      <td class="description">{{$plan->description}}</td>
                                      <td class="pe-md-5 pe-0"> 
                                        <button class="button_admin_sub ms-3">{{$plan->profit_margin}}</button>
                                      </td>
                                      <td class="sub-padding ">{{$plan->duration_days}}</td>
                                      <td class="sub-padding ">{{$plan->price}}</td>
                                      <td class="ps-md-5 pe-md-5 ps-0 pe-0"> 
                                        <form action="{{route('plans.destroy' , $plan->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                        <button type="submit" class=" button_admin3 btn btn-danger mt-md-2"><i class="fa-solid fa-trash-can me-2 "></i>Delete</button>
                                      </form>
                                        <a href="{{route('plans.edit' , $plan->id)}}" class="button_admin2 btn btn-secondary ms-lg-2 ms-0"><i class="fa-solid fa-pen-to-square me-2"></i>Edite</a>
                                      </td>
                                    </tr>
                                  @endforeach
                                  </tbody>
                                  
                            </table>
                        </div>
                    </div>

                   
                </div>
            </main>
        </div>
    </div>
</body>
</html>
