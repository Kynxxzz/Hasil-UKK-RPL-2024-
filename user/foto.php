<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('blm lojin bjir');
    location.href='../login.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto | GaleriQu</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow p-2 mb-2 bg-body-tertiary rounded"> 
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

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        Add Foto
                    </div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label for="judulfoto" class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" id="judulfoto" class="form-control mb-1" required>
                            <label for="deskripsifoto" class="form-label mt-1">Deskripsi Foto</label>
                            <textarea name="deskripsifoto" id="deskripsifoto" cols="10" rows="2" class="form-control mb-1" required></textarea>
                            <label for="albumid" class="form-label mt-1">Album</label>
                            <select name="albumid" id="albumid" class="form-control mb-1" required>
                                <option>- pilih album bang -</option>
                                <?php
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) { ?>
                                    <option class="form-control" value="<?php echo $data['albumid'] ?>"><?php echo $data['namaalbum'] ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label mt-1">File foto</label>
                            <input type="file" name="lokasifile" class="form-control mb-4" required>
                            <hr>
                            <button type="submit" class="btn btn-primary" name="tambah">Add Foto</button>
                        </form>
                    </div>
                </div>
            </div>
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
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    $userid = $_SESSION['userid'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM foto  WHERE userid='$userid'");
                                    while ($data = mysqli_fetch_array($sql)) { ?>
                                        <td><?php echo $no++ ?></td>
                                        <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" style="height: 5rem;"></td>
                                        <td><?php echo $data['judulfoto'] ?></td>
                                        <td><?php echo $data['deskripsifoto'] ?></td>
                                        <td><?php echo $data['tanggalunggah'] ?></td>
                                        <td>
                                            
                                    
                                        

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
                                                Del
                                            </button>
                                            
                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | Bagas Athailla</p>
</footer>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>

</html>