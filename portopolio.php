<?php
require_once "koneksi.php";

$tampilprofile = mysqli_query($conn, "SELECT profiles.id AS idnyaprofile, profiles.photo, profiles.nama, profiles.jabatan, profiles.deskripsi, more_profiles.id_profiles, GROUP_CONCAT(more_profiles.skill SEPARATOR '<br>') AS skl, GROUP_CONCAT(more_profiles.pengalaman SEPARATOR '<br>') AS pgl FROM more_profiles LEFT JOIN profiles ON more_profiles.id_profiles = profiles.id WHERE profiles.status = 1");
$row = mysqli_fetch_assoc($tampilprofile);

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Portofolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 10px;
            background: #333;
            border-radius: 5px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
        }

        .navbar a:hover {
            background: #555;
            border-radius: 5px;
        }

        .profile {
            margin-top: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            border: 3px solid #333;
        }

        .section {
            margin: auto;
            width: 600px;
            text-align: center;
            margin-bottom: 20px;
        }

        .table-section table {
            margin: auto;
            width: 80%;
            border-collapse: collapse;
            text-align: left;
        }

        .table-section th,
        .table-section td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table-section th {
            text-align: center;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <a href="beranda.php">Home</a>
            <a href="portopolio.php">Portopolio</a>
            <a href="logout.php">Logout</a>
            <a href="about.php">About</a>
        </nav>

        <div class="profile">
            <img src="assets/uploads/<?= $row['photo'] ?>" alt="Avatar" class="profile-img">
            <h1><?= $row['nama'] ?></h1>
            <h2><?= $row['jabatan'] ?></h2>
        </div>

        <section class="section">
            <p><?PHP echo $row['deskripsi'] ?></p>
        </section>

        <section class="table-section">
            <table>
                <tr>
                    <th>Skill</th>
                    <th>Pengalaman</th>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><?= str_replace('<br>', '</li><li>', $row['skl']) ?></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><?= str_replace('<br>', '</li><li>', $row['pgl']) ?></li>
                        </ul>
                    </td>
                </tr>
            </table>
        </section>

        <footer>
            <p>Copyright 2024 © Nama pemilik.</p>
        </footer>
    </div>
</body>

</html>