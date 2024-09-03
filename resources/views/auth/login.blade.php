<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    {{-- @livewireStyles --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            max-width: 500px; /* ปรับขนาดตามที่ต้องการ */
            width: 100%; /* เพื่อให้ฟอร์มเต็มความกว้างที่กำหนด */
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .login-container .form-group {
            margin-bottom: 15px;
        }
        .login-container .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .login-container .form-group input {
            width: 100%;
        }
        .login-container .form-group .form-check-label {
            margin-bottom: 0;
        }
        .login-container .form-group .form-check {
            margin-bottom: 15px;
        }
        .login-container button {
            width: 100%;
        }
        .login-container .text-center {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="login">Email or Username</label>
                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>
                @error('login')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary">Log in</button>
        </form>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

