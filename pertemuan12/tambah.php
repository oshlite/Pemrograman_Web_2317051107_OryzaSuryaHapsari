<?php include "koneksi/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Data Mahasiswa</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Usia</label>
            <input type="text" name="usia" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn 
        btn-secondary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $usia = $_POST['usia'];

        $query = "INSERT INTO mahasiswa (nama, nim, usia) VALUES ('$nama', '$nim', '$usia')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<div class='alert alert-success mt-3'>Data berhasil disimpan.</div>";
            echo "<script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menyimpan data: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</body>
</html>
