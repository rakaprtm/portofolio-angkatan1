<?php
require_once "koneksi.php";
session_start();
session_regenerate_id();

if (empty($_SESSION["EMAIL"])) {
    header("location: index.php");
}
if (isset($_POST['add-profile'])) {
    $photo = $_FILES['photo'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];
    var_dump($photo);

    if ($photo['error'] == 0) {
        $fillname = uniqid() . "_" . basename($photo['name']);
        $fillpath = "assets/uploads/" . $fillname;
        move_uploaded_file($photo['tmp_name'], $fillpath);
    }
    $q_insert = mysqli_query($conn, "INSERT INTO profiles (nama, jabatan, deskripsi, photo) VALUES ('$nama', '$jabatan', '$deskripsi', '$fillname')");

    if ($q_insert) {
        header("Location: about.php");
    } else {
        header("Location: editprofile.php");
    }
}
if (isset($_GET['idEdt'])) {
    $idEdt = base64_decode($_GET['idEdt']);
    $edit = mysqli_query($conn, "SELECT * FROM profiles WHERE id = $idEdt");
    $row = mysqli_fetch_assoc($edit);
}
if (isset($_GET['idEdt']) && isset($_POST['edit-profile'])) {
    $idEdt = base64_decode($_GET['idEdt']);

    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];

    
    $update = mysqli_query($conn, "UPDATE profiles SET nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi' WHERE id = $idEdt");

    if ($update) {
        header("Location: about.php");
    } else {
        header("Location: editprofile.php");
    }
}

if (isset($_GET['idEdt'])) {
    $idEdt = base64_decode($_GET['idEdt']);
    $edit = mysqli_query($conn, "SELECT * FROM profiles WHERE id = $idEdt");
    $row = mysqli_fetch_assoc($edit);
}

if (isset($_GET['idEdt']) && isset($_POST['edit-profile'])) {
    $idEdt = base64_decode($_GET['idEdt']);

    if ($_FILES['photo']['error'] == 0) {
        $filename = uniqid() . "_" . basename($_FILES['photo']['name']);
        $filepath = "assets/uploads/" . $filename;
        move_uploaded_file($_FILES['photo']['tmp_name'], $filepath);

        $update = mysqli_query($conn, "UPDATE profiles SET 
            nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi', photo='$filename' 
            WHERE id = $idEdt");
    } else {
        $update = mysqli_query($conn, "UPDATE profiles SET 
            nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi' 
            WHERE id = $idEdt");
    }

    if ($update) {
        header("Location: about.php");
    } else {
        header("Location: editprofile.php");
    }
}
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="beranda.css"> -->
    <?php require_once "inc/style.php" ?>
    <style>
        body {
            background-color: #000000;
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
        }

        .container {
            width: 1200px;
            height: 890px;
            margin: auto;
            background: white;
        }

        footer {
            bottom: 0px;
            position: fixed;
            background-color: gray;
            color: white;
            text-align: center;
            margin: auto;
            padding: 20px;
            left: 360px;
            width: 1200px;
        }

        .table-container {
            width: 80%;
            margin: auto;
        }

        .card-header {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php require_once "inc/navbar.php" ?>
        <div class="table-container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8"></div>
                <div class="card-header text-center fw-bold"><?php echo isset($_GET['idEdt']) ? 'EDIT' : 'ADD' ?>ADD PROFILE</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mt-1">
                            <label for="" class="form-table">photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <?php if (isset($_GET['idEdt']) && !empty($row['photo'])): ?>
                            <div class="mt-1">
                                <img src="assets/uploads/<?php echo $row['photo']; ?>" width="135" alt="Profile Photo">
                            </div>
                        <?php endif; ?>
                        <div class="mt-1">
                            <label for="" class="form-table">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo isset($_GET['idEdt']) ? $row['nama'] : '' ?>" required>
                        </div>
                        <div class="mt-1">
                            <label for="" class="form-table">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="<?php echo isset($_GET['idEdt']) ? $row['jabatan'] : '' ?>" required>
                        </div>
                        <div class="mt-1">
                            <label for="" class="form-table">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" cols="30" rows="3" required> <?php echo isset($_GET['idEdt']) ? $row['deskripsi'] : '' ?>  </textarea>
                        </div>
                        <div class="mt-1">
                            <a class="btn btn-secondary" href="about.php">Back</a>
                            <button class="btn btn-success" type="submit" name="<?php echo isset($_GET['idEdt']) ? 'edit-profile' : 'add-profile'; ?>">
                                <?php echo isset($_GET['idEdt']) ? 'Update' : 'ADD'; ?>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>&copy;Website Desain By Raka Anugerah Pratama</footer>
    </div>
</body>

</html>