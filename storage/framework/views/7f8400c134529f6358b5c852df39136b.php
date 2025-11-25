<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: url('<?php echo e(asset("img/bg-shoe.jpg")); ?>') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            width: 100%;
            height: 100vh;
            background: rgba(0,0,0,0.45);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 420px;
            background: rgba(255,255,255,0.85);
            padding: 35px;
            border-radius: 12px;
            text-align: center;
        }

        .login-box h2 {
            font-size: 28px;
            font-weight: 600;
            color: #4b1f1e;
        }

        .login-box input {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            background: #fff;
            margin-top: 8px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            background: #5b2423;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-create {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            background: #d9a59c;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>

</head>

<body>

<div class="container">
    <div class="login-box">

        <h2>Sign Up</h2>
        <p>Welcome back! Please login to your account.</p>

        <?php if(session('error')): ?>
            <p style="color:red"><?php echo e(session('error')); ?></p>
        <?php endif; ?>

        <form action="<?php echo e(route('login.process')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>

            <button class="btn-login">Login</button>
        </form>

        <a href="<?php echo e(route('register')); ?>">
            <button class="btn-create">Create Account</button>
        </a>

    </div>
</div>

</body>
</html>
<?php /**PATH E:\uas_pbw\resources\views/auth/login.blade.php ENDPATH**/ ?>