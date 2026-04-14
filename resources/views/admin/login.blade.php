<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sars Infotech</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            background: rgba(30, 41, 59, 0.7);
            padding: 3rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
        }
        h2 { text-align: center; margin-bottom: 2rem; font-weight: 800; color: #fff; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; color: #94a3b8; font-weight: 600; }
        input {
            width: 100%; padding: 1rem;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px; color: #fff;
            transition: border-color 0.3s;
        }
        input:focus { outline: none; border-color: #3b82f6; }
        .btn {
            width: 100%; padding: 1rem;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            border: none; border-radius: 10px;
            color: white; font-weight: 600; font-size: 1rem;
            cursor: pointer; cursor: pointer; transition: opacity 0.3s;
        }
        .btn:hover { opacity: 0.9; }
        .error { color: #ef4444; background: rgba(239, 68, 68, 0.1); padding: 0.5rem; border-radius: 5px; margin-bottom: 1rem; font-size: 0.9rem; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Admin Gateway</h2>
        
        @if($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/admin/login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Log In</button>
        </form>
    </div>

</body>
</html>
