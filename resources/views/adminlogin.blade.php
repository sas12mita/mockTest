<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1AB08A;
            --primary-dark: #168a6d;
            --text-color: #333;
            --light-gray: #f5f5f5;
        }

        body {
            background-color: var(--light-gray);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .login-container {
            max-width: 420px;
            width: 100%;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .welcome-text {
            color: var(--text-color);
            margin-bottom: 30px;
            font-size: 16px;
            line-height: 1.5;
        }

        .form-label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 5px;
            /* Reduced for error messages */
            font-size: 15px;
            transition: border-color 0.3s;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            text-align: left;
            font-size: 14px;
            margin-bottom: 15px;
            display: block;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(26, 176, 138, 0.2);
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-bottom: 20px;
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me input {
            margin-right: 8px;
        }

        .btn-signin {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-signin:hover {
            background-color: var(--primary-dark);
        }

        .alert-danger {
            margin-bottom: 20px;
            text-align: left;
            padding: 10px 15px;
        }

        .placeholder-text {
            color: #999;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">Mock Test</div>
        <div class="welcome-text">
            Please sign in to your account and start the<br>
        </div>

        <!-- Display general authentication errors -->
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form id="loginForm" action="{{ route('admin.login') }}" method="post">
            @csrf

            <!-- Email Field -->
            <label for="email" class="form-label">EMAIL</label>
            <input type="email" id="email" name="email"
                class="form-control"
                placeholder="Enter your email">
           <!-- Password Field -->
            <label for="password" class="form-label">PASSWORD</label>
            <input type="password" id="password" name="password"
                class="form-control "
                placeholder="Enter your password">



            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>

            <!-- Display any other errors -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $error }}</strong>
                    </span>
                    @endforeach
                </ul>
            </div>
            @endif

            <button type="submit" class="btn-signin">Sign in</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>