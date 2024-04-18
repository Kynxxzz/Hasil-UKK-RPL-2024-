<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Galeri Bagas</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow p-2 mb-2 bg-body-tertiary rounded"> =
        <div class="container"> 
        <a class="navbar-brand" href="index.php">GaleriQu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto"> 
                <a href="album.php" class="nav-link">Album</a>
                <a href="foto.php" class="nav-link">Foto</a>
            </div>
            
            <a href="../config/aksi_logout.php" type="submit" class="btn btn-outline-danger m-1">Log out</a>
        </div>
        </div>
    </nav>
    <?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
}
?>
    <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        Data Foto
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Judul Foto</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    $userid = $_SESSION['userid'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM foto  WHERE userid='$userid'");
                                    while ($data = mysqli_fetch_array($sql)) { ?>
                                        <td><?php echo $no++ ?></td>
                                        <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" style="height: 15rem;"></td>
                                        <td><?php echo $data['judulfoto'] ?></td>
                                        <td><?php echo $data['deskripsifoto'] ?></td>
                                        <td><?php echo $data['tanggalunggah'] ?></td>
                                            
                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                            <?php } ?>

</body>
</html>