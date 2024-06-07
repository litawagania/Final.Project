<?php 
require 'function.php';


$no = $_GET["no"];

$ubah = query("SELECT * FROM rfq WHERE No = $no")[0];

if (isset($_POST["submit"])) {

if( ubah3($_POST) > 0) {
    echo "<script> 
     alert('Data berhasil diubah!');
     document.location.href = 'managerPengadaan.php';
     </script>";
} else {
    echo "<script> 
     alert('Data gagal diubah!');
     document.location.href = 'managerPengadaan.php';
     </script>";
}
}

?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesUbah.css" />
    <title>LagalTang</title>
</head>

<body>
<!--CONTENT <START--------------------------------------------------------------------------------------->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-paperclip me-2"></i>
                    <h2 class="fs-2 m-0">Update Data</h2>
                </div>
            </nav>
            
                <form action="" method="post">
                    <input type="hidden" name="no" value="<?= $ubah["no"]; ?>">
                    <div class="row">
                        <div class="col">
                            <label for="id_barang" class="form-label fw-bold">ID Barang</label>
                            <input type="text" name="id_barang" id="id_barang" required value="<?= $ubah["id_barang"]; ?>" class="form-control" placeholder="Nama Barang" aria-label="First name">
                        </div>
                        <div class="col">
                            <label for="nama_barang" class="form-label fw-bold">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" required value="<?= $ubah["nama_barang"]; ?>" class="form-control" placeholder="Nama Barang" aria-label="First name">
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label fw-bold">Jumlah</label>
                            <input type="number" name="jumlah" id="Jumlah" required value="<?= $ubah["jumlah"]; ?>" class="form-control" placeholder="jumlah" aria-label="Last name">
                        </div>
                        <div class="col">
                            <label for="satuan" class="form-label fw-bold">Satuan</label>
                            <input type="text" name="satuan" id="satuan" required value="<?= $ubah["satuan"]; ?>" class="form-control" placeholder="Satuan" aria-label="Last name">
                        </div>
                        <div class="col">
                            <label for="deadline" class="form-label fw-bold">Deadline</label>
                            <input type="date" name="deadline" id="deadline" required value="<?= $ubah["deadline"]; ?>" class="form-control" placeholder="Satuan" aria-label="Last name">
                        </div>
                        <div class="col">
                            <label for="harga" class="form-label fw-bold">Harga</label>
                            <input type="number" name="harga" id="harga" required value="<?= $ubah["harga"]; ?>" class="form-control" placeholder="Satuan" aria-label="Last name">
                        </div>
                    </div>
                        <div>
                            <div class="d-md-flex gap-2 justify-content-md-end">
                            <button type="submit" class="btn btn-success d-grid my-3" name="submit">Ubah</button>
                        </div>
                </form>

        </div>
            
</body>

</html>
