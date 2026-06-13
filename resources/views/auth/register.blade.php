<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f4f4f4;
        }

        .card{
            width:400px;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        .form-group{
            margin-bottom:15px;
        }

        label{
            display:block;
            margin-bottom:5px;
        }

        input{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        button{
            width:100%;
            padding:10px;
            border:none;
            background:#2563eb;
            color:white;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            opacity:.9;
        }

        .error{
            color:red;
            font-size:14px;
            margin-top:5px;
        }

        .success{
            background:#d1fae5;
            color:#065f46;
            padding:10px;
            margin-bottom:15px;
            border-radius:5px;
        }

        .login-link{
            text-align:center;
            margin-top:15px;
        }
    </style>
</head>
<body>

    <div class="card">

        <h2>Register</h2>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/register" method="POST">

            @csrf

            <div class="form-group">
                <label>Username</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                >

                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                >

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                >

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                >
            </div>

            <button type="submit">
                Register
            </button>

        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="/login">Login</a>
        </div>

    </div>

</body>
</html>