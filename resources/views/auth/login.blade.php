<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shorcut icon" href="images/logo1.png">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding:50px;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 24px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="checkbox"] {
            margin-right: 8px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .login-container a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        <!-- Session Status -->
        @if (session('status'))
            <p style="color: green; text-align: center; font-size: 14px;">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                <p style="color: red; font-size: 12px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password')
                <p style="color: red; font-size: 12px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <!-- Forgot Password -->
            {{-- <div style="text-align: right; margin-bottom: 20px;">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot your password?</a>
                @endif
            </div> --}}

            <!-- Submit Button -->
            <button type="submit">Log in</button>
        </form>

        {{-- <!-- Register Link -->
        <div class="register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div> --}}
    </div>
</body>
</html>
