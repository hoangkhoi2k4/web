<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* background: linear-gradient(45deg, #6b48ff, #00ddeb); */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2), 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-group label {
            display: block;
            color: #555;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
        }

        button {
            width: 100%;
            padding: 1rem;
            background: #4CAF50;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            /* transition: background 0.3s, transform 0.2s; */
        }

        button:hover {
            background: #45a049;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }

        .forgot-password a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password a:hover {
            text W-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <form action="/public/index.php?page=login" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Nhập email" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit">Đăng Nhập</button>
        </form>
        <div class="forgot-password">
            <a href="#">Quên mật khẩu?</a>
        </div>
    </div>

    <script>
        function handleLogin() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            // if (username && password) {
            //     alert('Đang xử lý đăng nhập cho ' + username);
            //     // Thêm logic đăng nhập thực tế tại đây (gọi API, v.v.)
            // } else {
            //     alert('Vui lòng điền đầy đủ thông tin!');
            // }
            window.location.href = "dashboard.html";

            
        }
    </script>
</body>
</html>