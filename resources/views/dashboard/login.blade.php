<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user/css/all.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <title>إنشاء حساب</title>
    <style>
        body {
            background-color: #f7f3e9; /* لون البودي أصفر باهت */
        }
        .header {
            color: #ffffff;
            padding: 15px;
            border-radius: 8px;
        }

        .registration-form {
            margin-top: 60px; /* رفع النموذج للأعلى */
            background: linear-gradient(145deg, #ffffff, #e6e6e6); /* خلفية متدرجة */
            padding: 60px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .swal2-confirm:focus{
            outline: none;
        }
        .swal2-confirm{
            border: none;
            background-color: aqua;
            outline: none;
        }
        *:not([class*="fa"]) {
    font-family: "El Messiri", sans-serif !important;
}
        .forget::after{
            content: "";
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: #999;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
            <div class="col-md-6 mx-auto">
                <div class="registration-form">
 
                   @if (session('error'))
                  <p style="text-align:  center ; color: red;" >{{ session('error') }} </p> 
                   @endif
                    <form action="{{route('admin.login')}}" method="POST">
                        @csrf
                        <h4 class="text-center header" style="color: black;">تسجيل الدخول</h4>
                        <div class="form-group">
                            <label for="email" style="float: right;">البريد الإلكتروني <span style="color: red;">*</span></label>
                            <input type="email" class="form-control mail " style="border-radius: 10px;" id="email" name="email" placeholder="بريدك الإلكتروني">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass" style="float: right;">كلمة السر <span style="color: red;">*</span></label>
                            <input type="password" class="form-control pass" style="border-radius: 10px;"  id="pass" name="password" placeholder="كلمة السر">
                            <i class="fas fa-eye-slash"
                            style="position: relative; top: -30px; left: 10px; font-size: 15px; cursor: pointer;"
                            id="toggle-icon" onclick="togglePassword()"></i>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="block mt-4" style="text-align: right">
                            <label for="remember_me" class="inline-flex items-center">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('تذكرني') }}</span>
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" style="border-radius: 10px;" class="btn log btn-block btn-info" value="تسجيل الدخول">
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('user/js/jquery.min.js') }}"></script>
  <script src="{{ asset('user/js/bootstrab.min.js') }}"></script>
  <script src="{{ asset('user/js/coursel.js') }}"></script>
  <script defer src="{{ asset('user/js/theme.js') }}"></script>
  <script src="{{ asset('user/js/embed.js') }}"></script>
  <script >function togglePassword() {
    var passwordField = document.getElementById("pass");
    var toggleIcon = document.getElementById("toggle-icon");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
    } else {
      passwordField.type = "password";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
    }
  }</script>
</body>
</html>
