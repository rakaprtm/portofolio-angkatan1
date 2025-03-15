<?php
require_once "koneksi.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_regenerate_id(true);
}

if (empty($_SESSION["EMAIL"])) {
    header("location: index.php");
    exit();
}

$selectprofile = mysqli_query($conn, "SELECT * FROM profiles");
$rows = mysqli_fetch_all($selectprofile, MYSQLI_ASSOC);

if (isset($_GET['idDel'])) {
    $idDel = base64_decode($_GET['idDel']);
    if (!is_numeric($idDel)) {
        die("ID tidak valid.");
    }

    $query = mysqli_query($conn, "SELECT photo FROM profiles WHERE id = $idDel");
    $data = mysqli_fetch_assoc($query);

    if (!empty($data['photo']) && file_exists("assets/uploads/" . $data['photo'])) {
        unlink("assets/uploads/" . $data['photo']);
    }

    $q_delete = mysqli_query($conn, "DELETE FROM profiles WHERE id = $idDel");

    header("Location: about.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['idSt'])) {
    $id = (int) $_GET['idSt'];
    $status = isset($_POST['status']) ? (int) $_POST['status'] : 0;

    mysqli_query($conn, "UPDATE profiles SET status = 0");

    $update_1 = mysqli_query($conn, "UPDATE profiles SET status = 1 WHERE id = $id");

    if ($update_1) {
        header("Location: portopolio.php");
        exit();
    }
    header("Location: about.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php require_once "inc/style.php"; ?>
    <style>
        body {
            background-color: #000;
            font-family: 'Times New Roman', Times, serif;
        }

        .navbar {
            margin-top: -20px;
            margin-left: -20px;
            margin-bottom: 50px;
        }

        .container {
            background: white;
            width: 90%;
            height: auto;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .table-container {
            margin: 20px 0;
            border-radius: 10px;
        }

        table th,
        table td {
            padding: 10px;
            vertical-align: middle;
        }

        img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            object-fit: cover;
        }

        .btn {
            margin-bottom: 10px;
        }

        footer {
            bottom: 0px;
            position: relative;
            background-color: gray;
            color: white;
            text-align: center;
            margin: auto;
            padding: 20px;
            width: 1200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php require_once "inc/navbar.php"; ?>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <div class="card">
                    <div class="card-header fw-bold">Manage Profile</div>
                    <div class="card-body">
                        <a href="editprofile.php" class="btn btn-primary mb-3">Create New Profile</a>

                        <div class="card table-container">
                            <table class="table table-bordered text-center">

                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>Deskripsi</th>
                                    <th>Settings</th>
                                </tr>
                                <?php $no = 1;
                                foreach ($rows as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><img src="<?php echo "assets/uploads/" . $row['photo'] ?>" width="50" height="50"></td>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php echo $row['jabatan'] ?></td>
                                        <td><?php echo $row['deskripsi'] ?></td>
                                        <td>
                                            <a href="editprofile.php?idEdt=<?php echo base64_encode($row['id']) ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="about.php?idDel=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger" onclick="return confirm('yakin mau menghapus profile?');">Delete</a>
                                            <form action="?idSt=<?php echo $row['id'] ?>" method="post">
                                                <input type="radio" name="status" value="1" onchange="this.form.submit()"
                                                    <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>
                                            </form>


                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>&copy; Website Design By Raka Anugerah Pratama</footer>
</body>

</html>