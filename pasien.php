<?php 
include_once('connect.php');

if (isset($_POST['save'])){
    $nama_baru = $_POST['newNama'];
    $alamat_baru = $_POST['newAlamat'];
    $no_hp_baru = $_POST['newNoHP'];
    if (!empty($nama_baru)){
        if (!empty($alamat_baru)){
            if (!empty($no_hp_baru)){
                if (!empty($_POST['id'])){
                    $id_baru = $_POST['id'];
                    $queri3 = mysqli_query($mysqli, "UPDATE pasien SET 
                        nama='$nama_baru',
                        alamat='$alamat_baru',
                        no_hp='$no_hp_baru' WHERE id='$id_baru'");
                } else {
                    $queri4 = mysqli_query($mysqli, "INSERT INTO 
                        pasien(nama,alamat,no_hp) VALUES(
                            '$nama_baru','$alamat_baru','$no_hp_baru')");
                }
                header("Location: pasien.php"); 
                exit(); 
            } else{
                echo "<script>alert('Silakan lengkapi bagian No HP!')</script>";
            }
        } else{
            echo "<script>alert('Silakan lengkapi bagian Alamat!')</script>";
        } 
    } else{
        echo "<script>alert('Silakan lengkapi bagian Nama!')</script>";
    }      
}

if (isset($_GET['aksi'])){
    $aksi=$_GET['aksi'];
    $id=$_GET['id'];
    if ($aksi == 'hapus'){
        $queri5 = mysqli_query($mysqli, "DELETE FROM pasien 
            WHERE id='$id'");
        header("Location: pasien.php"); 
        exit();  
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien-Poliklinik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body data-bs-theme="light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand d-none d-lg-block" href="#">Poliklinik</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbarTogglerDemo01">
                <li class="nav-item">
                    <a class="nav-link text-center" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="dokter.php">Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center active disabled" aria-current="page" href="#">Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="periksa.php">Periksa</a>
                </li>
            </ul>
            <button class="btn btn-lg dark-mode-toggle" id="darkModeToggle">
                <i class="fas fa-sun"></i>
                <i class="fas fa-moon"></i>
            </button>
        </div>
    </nav>

    <div class="container mt-4">
        <h4 class="text-center mb-4">Form Pasien</h4>
        <form class="form-floating" method="POST" action="" name="myForm">
            <?php 
            $nama = '';
            $alamat = '';
            $no_hp = '';
            if (isset($_GET['id'])){
                $id=$_GET['id'];
                $queri1 = mysqli_query($mysqli, 
                    "SELECT * FROM pasien WHERE id='$id'");
                while ($row1 = mysqli_fetch_array($queri1)){
                    $nama = $row1['nama'];
                    $alamat = $row1['alamat'];
                    $no_hp = $row1['no_hp'];
                }?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <?php 
            }?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="newNama" 
                    placeholder="Nama Pasien" value="<?php echo $nama ?>">
                <label for="floatingInput">Nama Pasien</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="newAlamat" 
                    placeholder="Alamat Pasien" value="<?php echo $alamat ?>">
                <label for="floatingInput">Alamat Pasien</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="newNoHP" 
                    placeholder="No HP Pasien" value="<?php echo $no_hp ?>">
                <label for="floatingInput">No HP Pasien</label>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-3" name="save">Simpan</button>
        </form>
        
        <h4 class="text-center mb-4">Tabel Pasien</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i= 1;
                $queri2 = mysqli_query($mysqli, "SELECT * FROM pasien");
                while ($row2 = mysqli_fetch_array($queri2)){?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $row2['nama'] ?></td>
                        <td><?php echo $row2['alamat'] ?></td>
                        <td><?php echo $row2['no_hp'] ?></td>
                        <td>
                            <a class="btn btn-info rounded-pill px-3" 
                                href="pasien.php?id=<?php echo $row2['id'] ?>">Ubah</a>
                            <a class="btn btn-danger rounded-pill px-3" 
                                href="pasien.php?id=<?php echo $row2['id']?>
                                    &aksi=hapus">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>