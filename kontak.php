<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        body {
            background-color: #000000;
            margin: 0;
            font-family: "Times New Roman", Times, serif;
        }

        .container {
            width: 1200px;
            height: 895px;
            margin: auto;
            background-color: rgb(219, 172, 102);
        }

        nav {
            background-color: khaki;
            padding: 5px;
            color: white;
            box-shadow: 0 0 8px rgba(0, 0, 0, 1);
        }

        nav ul {
            list-style-type: none;
            overflow: hidden;
        }

        nav ul li {
            float: right;
        }

        nav ul li a {
            display: block;
            color: rgb(8, 8, 8);
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            background-color: crimson;
            border-radius: 5px;
            color: white;
            transition: 0.5s;
        }

        .navbar img {
            float: left;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: -15px;
        }

        .content {
            padding: 10px;
            min-height: 50px;
            width: 400px;
            margin: auto;
        }

        form label {
            font-size: 20px;
            font-weight: bold;
            display: block;
        }

        form input,
        form textarea {
            width: 94%;
            padding: 5px;
            margin-bottom: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5xp;
        }

        button {
            width: 50%;
            padding: 10px;
            margin-top: 5px;
            background-color: rgb(22, 163, 219);
            cursor: pointer;
            border: none;
            font-size: 15px;
            font-weight: bold;
        }


        .kirim {
            text-align: center;
        }

        .kontak {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding: 20px;
            border-radius: 10px;
        }

        footer {
            bottom: 0px;
            position: fixed;
            background-color: gray;
            color: white;
            text-align: center;
            margin: auto;
            padding: 20px;
            width: 1160px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php require_once "inc/navbar.php" ?>
        <div class="kontak">
            <h1>CONTACT ME</h1>
        </div>
        <div class="content">
            <form action="" method="post">
                <label for="">Email</label>
                <input type="email" name="email" id="email" required />

                <label for="">Pesan</label>
                <textarea name="pesan" id="pesan" required></textarea>
                <div class="kirim">
                    <button type="submit">Kirim Pesan</button>
                </div>
            </form>
        </div>
        <footer>&copy;Website Desain By Raka Anugerah Pratama</footer>
    </div>
</body>

</html>