<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        small {
            color: #999;
        }

        input:invalid {
            border-color: red;
        }
    </style>
</head>

<body style="background-image: url('images/hero_1_a.jpg');" >

    <div class="container" style="width: 35%;">
        <h2 style=" text-align: center; " ><a href="/chothuexe/controller/System.php?cv=tranghome">Trang chủ</a>/Đăng Nhập</h2>
        <h1><span style=" color: red;"><?php 
        if(isset($thongbao)){
            echo $thongbao;
        }
         ?></span></h1>

        <form id="register-form" action="/chothuexe/controller/System.php?cv=dangnhap" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="xxx@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" placeholder="Vui lòng nhập đúng mật khẩu!" required>
            </div>
            <div style=" text-align: center; " >
            <button type="submit">Đăng Nhập</button>
            <a href="/chothuexe/views/user/dangky.php">Bạn chưa có tài khoản?</a>
            
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("register-form");
            const passwordInput = document.getElementById("password");
            const confirmPasswordInput = document.getElementById("confirm-password");

            // Kiểm tra xem mật khẩu và mật khẩu xác nhận có khớp nhau không
            confirmPasswordInput.addEventListener("input", function () {
                if (passwordInput.value !== confirmPasswordInput.value) {
                    confirmPasswordInput.setCustomValidity("Mật khẩu không khớp");
                } else {
                    confirmPasswordInput.setCustomValidity("");
                }
            });

            // Kiểm tra định dạng email
            const emailInput = document.getElementById("email");
            emailInput.addEventListener("input", function () {
                if (!isEmailValid(emailInput.value)) {
                    emailInput.setCustomValidity("Email không hợp lệ");
                } else {
                    emailInput.setCustomValidity("");
                }
            });

            // Hàm kiểm tra định dạng email
            function isEmailValid(email) {
                return /\S+@\S+\.\S+/.test(email);
            }
        });

    </script>
    <script src="script.js">

    </script>
</body>

</html>