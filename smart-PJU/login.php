<?php
session_start();
include 'includes/koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM users
         WHERE username='$username'
         AND password='$password'"
    );

    if(mysqli_num_rows($cek) > 0){

        $_SESSION['login'] = true;

        header("Location: admin/dashboard.php");
        exit;

    }else{
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#001f6b);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-box{
            background:white;
            width:400px;
            padding:30px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.2);
        }
    </style>

</head>
<body>

<div class="login-box">

    <h2 class="text-center mb-4">
        Login Admin
    </h2>

    <?php if(isset($error)){ ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="mb-3">
            <label>Username</label>
            <input
                type="text"
                name="username"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                required>
        </div>

        <button
            type="submit"
            name="login"
            class="btn btn-primary w-100">

            Login

        </button>

    </form>

</div>

</body>
</html>