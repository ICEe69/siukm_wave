<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bootstrap Brain</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container-login {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            max-width: 900px;
            width: 100%;
        }

        .login-left {
            background-color: #441752;
            color: white;
            padding: 50px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-left h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .login-left p {
            font-size: 1.1rem;
            text-align: center;
            line-height: 1.5;
        }

        .login-right {
            flex: 1;
            padding: 50px 30px;
        }

        .login-right h2 {
            font-size: 1.8rem;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        .form-control {
            margin-bottom: 20px;
            height: 45px;
            font-size: 1rem;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #441752;
            color: white;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: #f0f0f0;
        }

        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #ab4459;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>
    
    <!-- Login Container -->
    <div class="container-login" id="loginSection">
        <!-- Left Section -->
        <div class="login-left">
            <h1>Selamat Datang!</h1>
            <p>Login untuk memulai perjalanan di SIUKM ALTERRA. Temukan kesempatan dan kembangkan diri bersama kami.<br>Ayo Bergabung!</p>
        </div>

        <!-- Right Section -->
        <div class="login-right">
            <h2>Sign In</h2>
            <?php echo $this->session->flashdata('pesan') ?>
            <form method="POST" action="#">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" required>
                    <?php echo form_error('username','<div class="text-small text-danger"</div>') ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                    <?php echo form_error('password','<div class="text-small text-danger"</div>') ?>
                </div>
                <button type="submit" class="btn btn-login">Log in now</button>
            </form>
        </div>
    </div>

   