<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>كود التحقق</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
            direction: rtl;
        }

        h2 {
            font-size: 32px;
            color: #2c3e50;
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
            margin: 20px 0;
        }

        p {
            font-size: 18px;
            color: #333333;
            margin: 10px 0;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>مرحبًا 👋،</p>
        <p>شكرًا لتسجيلك في موقعنا.</p>
        <p>كود التحقق الخاص بك هو:</p>
        <h2>{{ $code }}</h2>
        <p>يرجى إدخال هذا الكود لإتمام عملية التسجيل.</p>

        <div class="footer">
            إذا لم تطلب هذا البريد، يمكنك تجاهله بأمان.<br>
            &copy; {{ date('Y') }} جميع الحقوق محفوظة.
        </div>
    </div>
</body>
</html>
