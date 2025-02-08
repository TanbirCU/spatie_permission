<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px 20px;
        }
        .btn-primary {
            background: #9b59b6;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background: #8e44ad;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
