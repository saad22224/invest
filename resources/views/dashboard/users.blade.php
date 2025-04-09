<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
            <main class="col-md-11">
            

                <div class="img_managment2 position-relative">
                    <img src="{{ asset('admin/assets/Vector (5).png') }}" class="position-absolute top-0"
                        alt="">
                    <h1 class="w-100 text-center">User Managment</h1>
                    <img src="{{ asset('admin/assets/Vector (7).png') }}" class="position-absolute img_line"
                        alt="">
                    <img src="{{ asset('admin/assets/Group (3).png') }}" class="position-absolute img_line2"
                        alt="">
                    <img src="{{ asset('admin/assets/Vector (4).png') }}" class="position-absolute img_line2"
                        alt="">
                    <img src="{{ asset('admin/assets/Vector (8).png') }}" class="position-absolute img_line3"
                        alt="">
                </div>

                <div class="container-fluid container-lg">
                    <div class="d-flex managment-search justify-content-between mt-4">
                        <h2>All Users</h2>
                        <input type="text" id="search" class="form-control w-25 rounded rounded-4"
                            placeholder="Search">
                    </div>

                    <div class="border rounded-5 mt-4 overflow-hidden shadow">
                        <div class="table-responsive">
                            <table id="Table" class="table table-hover border-0 align-middle text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">deposits</th>
                                        <th scope="col">withdraw</th>
                                        <th scope="col">profits</th>
                                        <th scope="col">balance</th>
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="p-0 p-md-3 d-md-flex">
                                                <p class="mt-3 mt-lg-4 mt-sm-1 ms-2">{{ $user->name }}</p>
                                            </td>
                                            <td class="email-column font">{{ $user->email }}</td>
                                            @if ($user->deposits->isEmpty())
                                                <td>لا يوجد</td>
                                            @else
                                                <td style="color: red" class="font">
                                                    {{ $user->deposits->sum('amount') ?? 'لا يوجد' }}
                                                </td>
                                            @endif
                                            @if ($user->withdrawals->isEmpty())
                                                <td>لا يوجد</td>
                                            @else
                                                <td class="font">
                                                    {{ $user->withdrawals->sum('amount') ?? 'لا يوجد' }}</td>
                                            @endif
                                            <td class="pe-md-5 pe-0">
                                                {{ $user->profit == '0' ? 'لا يوجد' : $user->profit }}
                                            </td>

                                            <td class="pe-md-5 pe-0">
                                                {{ $user->balance == '0' ? 'لا يوجد' : $user->balance }}
                                            </td>



                                            <td class="ps-md-5 pe-md-5 ps-0 pe-0">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button_admin3 btn btn-danger mb-md-1 mb-lg-1 mb-1">
                                                        <i class="fa-solid fa-trash-can me-2 pt-1 pt-md-0"></i>Delete
                                                    </button>
                                                </form>
                                                <a href
                                                ="{{ route('users.edit', $user->id) }}"
                                                    class="button_admin2 btn btn-secondary mt-sm-0 mt-3 mt-md-3 mt-lg-0">
                                                    <i class="fa-solid fa-pen-to-square me-2"></i>add money
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- كرر الصفوف يدويًا لو محتاج -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // search
        $(document).ready(function() {
            // حدث عند كتابة شيء في خانة البحث
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase(); // الحصول على النص المدخل وتحويله لحروف صغيرة
                $("#Table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -
                        1); // تصفية الصفوف بناءً على النص
                });
            });
        });
    </script>
</body>

</html>
