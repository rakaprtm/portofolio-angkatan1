<?php
require_once "../koneksi.php";
session_start();

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $foto = $_FILES['foto'];

    if ($foto['error'] == 0) {
        $fileName = uniqid() . '' . basename($foto['name']);
        $filePath = "../assets/uploads/" . $fileName;
        move_uploaded_file($foto['tmp_name'], $filePath);

        $insert = mysqli_query($conn, "INSERT INTO project (nama, kategori, foto) VALUES ('$nama', '$kategori', '$fileName')");
        if ($insert) {
            header("Location: project.php");
        }
    }
}
if (isset($_GET['edit'])) {
    $idEdt = base64_decode($_GET['edit']);
    $edit = mysqli_query($conn, "SELECT * FROM project WHERE id = $idEdt");
    $rowEdt = mysqli_fetch_assoc($edit);
}
if (isset($_GET['edit']) && isset($_POST['edit'])) {
    $idEdt = base64_decode($_GET['edit']);

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];


    $update = mysqli_query($conn, "UPDATE project SET nama='$nama' WHERE id = $idEdt");

    if ($update) {
        header("Location: project.php");
    } else {
        header("Location: tambahproject.php");
    }
}

if (isset($_GET['edit'])) {
    $idEdt = base64_decode($_GET['edit']);
    $edit = mysqli_query($conn, "SELECT * FROM service WHERE id = $idEdt");
    $row = mysqli_fetch_assoc($edit);
}

if (isset($_GET['edit']) && isset($_POST['edit'])) {
    $idEdt = base64_decode($_GET['edit']);

    if ($_FILES['foto']['error'] == 0) {
        $filename = uniqid() . "_" . basename($_FILES['foto']['name']);
        $filepath = "../assets/uploads/" . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], $filepath);
        $cekFoto = mysqli_query($conn, "SELECT foto FROM project WHERE id = $idEdt");
        $fotoLama = mysqli_fetch_assoc($cekFoto);
        if ($fotoLama && file_exists("../assets/uploads/" . $fotoLama['foto'])) {
            unlink("../assets/uploads/" . $fotoLama['foto']);
        }

        $update = mysqli_query($conn, "UPDATE project SET 
            nama='$nama', kategori='$kategori', foto='$filename' 
            WHERE id = $idEdt");
    } else {
        $update = mysqli_query($conn, "UPDATE project SET 
            nama='$nama', kategori='$kategori' WHERE id = $idEdt");
    }

    if ($update) {
        header("Location: project.php");
    } else {
        header("Location: tambahproject.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?php require_once "../inc/navbar.php"; ?>
    <?php require_once "../inc/sidebar.php"; ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Blank Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Project</h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">Nama</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Website" required value="<?php echo isset($_GET['idEdt']) ? $rowEdt['nama_service'] : ''; ?>">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">Kategori</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kategori" placeholder="Masukkan Nama Kategori" required value="<?php echo isset($_GET['idEdt']) ? $rowEdt['nama_service'] : ''; ?>">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">LOGO</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="foto">
                                    </div>
                                </div>
                                <?php if (isset($_GET['edit']) && !empty($row['foto'])): ?>
                                    <div class="mt-1">
                                        <img src="../assets/uploads/<?php echo $row['foto']; ?>" width="135" alt="Profile Photo">
                                    </div>
                                <?php endif; ?>
                                <div class="row mb-3">
                                    <div class="col-md-2 offset-md-2">
                                        <?php if (isset($_GET['edit'])) {
                                        ?>
                                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                        <?php
                                        } ?>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>