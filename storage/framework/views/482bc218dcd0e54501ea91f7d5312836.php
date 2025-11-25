<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Sign In — Modern</title>

  <style>
    :root{
      --bg:#7b7b7b;
      --card:#efefef;
      --accent:#5a221f;
      --muted:#9b9b9b;
      --input-bg:#fff;
      --radius:14px;
      --shadow: 0 8px 30px rgba(0,0,0,0.25);
      font-family: "Poppins", sans-serif;
    }

    body{
      margin:0;
      height:100vh;
      background: linear-gradient(180deg, rgba(0,0,0,0.2), rgba(0,0,0,0.3)), url("/mnt/data/3d076c03-96e7-4e72-b424-e5597ef82d42.png");
      background-size:cover;
      background-position:center;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:32px;
    }

    .card {
      width:100%;
      max-width:480px;
      background: var(--card);
      border-radius:16px;
      box-shadow:var(--shadow);
      padding:40px;
      box-sizing:border-box;
      border:6px solid rgba(255,255,255,0.6);
    }

    h1{
      text-align:center;
      margin:0;
      margin-bottom:6px;
      font-size:32px;
      font-weight:700;
      color:var(--accent);
    }

    .subtitle{
      text-align:center;
      color:#444;
      margin-bottom:22px;
    }

    input{
      width:100%;
      padding:14px;
      border-radius:10px;
      border:1px solid #ccc;
      font-size:15px;
      margin-bottom:14px;
      box-sizing:border-box;
    }

    .btn{
      width:100%;
      padding:14px;
      border:none;
      border-radius:10px;
      background:var(--accent);
      color:white;
      font-size:16px;
      font-weight:700;
      cursor:pointer;
    }

    /* Tambahan CREATE ACCOUNT */
    .create {
      margin-top:16px;
      text-align:center;
    }
    .create a{
      display:inline-block;
      padding:10px 18px;
      border-radius:10px;
      border:1px solid var(--accent);
      color:var(--accent);
      text-decoration:none;
      font-weight:600;
    }
  </style>
</head>

<body>

  <div class="card">
    <h1>Sign In</h1>
    <div class="subtitle">Welcome back! Please login to your account.</div>

    <form action="/login" method="POST">
      <?php echo csrf_field(); ?>

      <input type="email" name="email" placeholder="Email" required>

      <input type="password" name="password" placeholder="Password" required>

      <button class="btn" type="submit">Login</button>

      <!-- BAGIAN CREATE ACCOUNT (DITAMBAHKAN) -->
      <div class="create">
        <a href="/register">Create Account</a>
      </div>

    </form>
  </div>

</body>
</html>
<?php /**PATH D:\uaspbw\resources\views/auth/login.blade.php ENDPATH**/ ?>