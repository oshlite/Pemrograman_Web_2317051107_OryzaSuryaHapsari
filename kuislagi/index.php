<?php
session_start();
include 'koneksi/db.php'; 
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>DASHBOARDDDDDDDD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>DASHBOARDDDDDDDD</h2>
    <?php if(isset($_SESSION['welcome_message'])):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php 
            echo $_SESSION['welcome_message'];
            unset($_SESSION['welcome_message']); 
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <a href="tambahtolonginbah.php" class="btn btn-info mb-3">+ Tambah Akun Anomali Only</a>
    <table class="table table-bordered">
        <thead class="table-hover">
            <tr>
                <th>No</th>
                <th>Username Nama Kau</th>
                <th>Foto Kau</th>
                <th>MAU NGAPAIN ?????</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            $result=mysqli_query($conn,"SELECT*FROM users");
            while($row=mysqli_fetch_assoc($result)){
                $foto=!empty($row['foto'])? $row['foto'] :'default.jpg';
                echo "<tr>
                    <td>$no</td>
                    <td>{$row['username']}</td>
                    <td><img src='foto/$foto' width='50' height='50' class='rounded-circle'></td>
                    <td>
                        <a href='edittolongindit.php?id={$row['id']}' class='btn btn-warning btn-sm'>EDITTTTTTTTTTT</a>
                        <a href='hapustolonginpus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah kamu yakin ingin menghapus akun ini? yang benerrrrrrrrrrr?????\")'>HAPUSSSSSSSS</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-3 gap-2">
        <a href="logout.php" class="btn btn-danger">LOGOUT NAH</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
