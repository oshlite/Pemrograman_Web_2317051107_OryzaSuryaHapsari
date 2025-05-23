<?php
session_start();
include 'koneksi/db.php';
if(isset($_POST['register'])){
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if($password !== $confirm_password){
        $error="Password dan konfirmasi password tidak sama";
    }else{
        $queryCek="SELECT*FROM users WHERE username='$username'";
        $resultCek=mysqli_query($conn, $queryCek);
        if(mysqli_num_rows($resultCek)> 0){
            $error="Username sudahhhhhhhh digunakan, silakan pilih yang lain";
        }else{
            $password_hash=password_hash($password, PASSWORD_DEFAULT);
            $queryInsert="INSERT INTO users(username, password)VALUES('$username', '$password_hash')";
            $resultInsert=mysqli_query($conn, $queryInsert);

            if($resultInsert){
                $_SESSION['success_message']="Pendaftaran berhasil! Silakan login.";
                header("Location:login.php");
                exit();
            }else{
                $error="Terjadi kesalahan saat mendaftarkan user";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REGISTRASI DULUUUUUUUU</title>
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
                    <h3 class="text-center">Yeu belom punya akun Regist dulu dah</h3>
                </div>
                <div class="card-body">
                    <?php if(isset($error)):?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username Kamu</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Kamu</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Ulangi Passwordnya</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary w-100">REGISTTTTTTTTTT</button>
                    </form>
                    <p class="mt-3 text-center">
                        DAH PUNYA AKUN KAN? <a href="login.php">LOGIN SEKARANG</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
