<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit();
}

include "koneksi/db.php";
if(!isset($_GET['id'])){
    die("ID gak ketemu");
}

$id=$_GET['id'];

if(!$conn){
    die("Koneksi database gagal coy:".mysqli_connect_error());
}

$result=mysqli_query($conn,"SELECT foto FROM users WHERE id=$id");
if(!$result){
    die("Error ambil data mangapa sih:".mysqli_error($conn));
}
$row=mysqli_fetch_assoc($result);
if($row&&$row['foto']!='default.jpg'){
    $foto_path='foto/'.$row['foto'];
    if(file_exists($foto_path)){
        unlink($foto_path);
    }
}

$delete=mysqli_query($conn,"DELETE FROM users WHERE id=$id");

if($delete){
    echo "<script>
        alert('Dah YAK Dah ke Hapus');
        window.location.href='index.php';
    </script>";
}else{
    echo "<script>
        alert('Lah gagal hapus data dah:".mysqli_error($conn)."');
        window.location.href='index.php';
    </script>";
}
?>