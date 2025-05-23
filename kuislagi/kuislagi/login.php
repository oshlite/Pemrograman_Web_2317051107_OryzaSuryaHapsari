<?php
session_start();
include 'koneksi/db.php';
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT*FROM users WHERE username='$username'";
    $result=mysqli_query($conn, $query);
    $username=mysqli_fetch_assoc($result);
    if($username&&password_verify($password, $username['password'])){
        $_SESSION['username']=$username['username'];
        $_SESSION['welcome_message']="MET DATANG DI BARAK, ".$username['username']."!!!!!!!!";
        header("Location:index.php");
        exit();
    }else{
        $_SESSION['error']="Login gagal. Username atau password salah.";
        header("Location: index.php");
        exit; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGINNNNNNNNNNN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background-color:red;}
    </style>
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">CEPAT LOGIN KITA KE BARAK!!!!!!</h3></div>
                <div class="card-body">
                    <?php if(isset($error)):?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username Barak</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password BARAK</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary w-100">LOGIN MASUK BARAK</button>
                        </div>
                    <p class="mt-3 text-center">
                        BELOM PUNYA AKUN KANNNN YA? <a href="regisdulu.php">REGIST DULU IH</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 