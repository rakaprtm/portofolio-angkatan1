<?php
require_once 'koneksi.php';

if (isset($_POST['kirim'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$pesan = $_POST['pesan'];
	$cekEmail = mysqli_query($conn, "SELECT * FROM contact WHERE email = '$Email'");
	$rowEmail = mysqli_fetch_assoc($cekEmail);

	if ($rowEmail) {
		header("location: index.php");
		die;
	} else {
		$insert = mysqli_query($conn, "INSERT INTO contact (nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subject',' $pesan')");
		if ($insert) {
			header("location: index.php?#contact-section&contact=berhasil");
		}
	}
}
$selectresume = mysqli_query($conn, "SELECT * FROM resume");
$rowsresume = mysqli_fetch_all($selectresume, MYSQLI_ASSOC);

$selectskill = mysqli_query($conn, "SELECT * FROM skill");
$rowsskill = mysqli_fetch_all($selectskill, MYSQLI_ASSOC);

$selectservice = mysqli_query($conn, "SELECT * FROM service");
$rowsservice = mysqli_fetch_all($selectservice, MYSQLI_ASSOC);

$selectabout = mysqli_query($conn, "SELECT * FROM setting Where id= 1");
$rowsabout = mysqli_fetch_assoc($selectabout);

$selectproject = mysqli_query($conn, "SELECT * FROM project");
$project = mysqli_fetch_all($selectproject, MYSQLI_ASSOC);

$selectblog = mysqli_query($conn, "SELECT * FROM blog");
$rowsblog = mysqli_fetch_all($selectblog, MYSQLI_ASSOC);

$blog = mysqli_query( $conn,"SELECT blog.*, categories.nama_kategori FROM blog JOIN categories ON blog.id_kategori = categories.id"
);
$rows = mysqli_fetch_all($blog, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Clark - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="assets/fe/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="assets/fe/css/animate.css">

	<link rel="stylesheet" href="assets/fe/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/fe/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/fe/css/magnific-popup.css">

	<link rel="stylesheet" href="assets/fe/css/aos.css">

	<link rel="stylesheet" href="assets/fe/css/ionicons.min.css">

	<link rel="stylesheet" href="assets/fe/css/flaticon.css">
	<link rel="stylesheet" href="assets/fe/css/icomoon.css">
	<link rel="stylesheet" href="assets/fe/css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">RAKAPRTM</a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
					<li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
					<li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
					<li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
					<li class="nav-item"><a href="#blog-section" class="nav-link"><span>My Blog</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<section id="home-section" class="hero" style="margin-top: 100px;">
		<div class="home-slider  owl-carousel">
			<div class="slider-item ">
				<div class="overlay"></div>
				<div class="container">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<div class="one-third js-fullheight order-md-last img" style="background-image:url(images/bg_1.png);">
							<div class="overlay"></div>
						</div>
						<div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">Hello!</span>
								<h1 class="mb-4 mt-3">Raka<span>Anugerah Pratama</span></h1>
								<h2 class="mb-4">A Freelance Web Designer</h2>
								<p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
							</div>
						</div>
						<div class="colmd-6 d-flex justify-content-md-end" style="margin-top: 250px;">
							<img src="img/rakahd.png" alt="raka" class="img-fluid" style="width: 100%;">
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container">
					<div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<div class="one-third js-fullheight order-md-last img" style="background-image:url(images/bg_2.png);">
							<div class="overlay"></div>
						</div>
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">Hello!</span>
								<h1 class="mb-4 mt-3">I'm a <span>web designer</span> based in Jakarta</h1>
								<p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
							</div>
						</div>
						<div class="colmd-7 d-flex justify-content-md-end" style="margin-top: 100px; margin-left: 200px;">
							<img src="img/batikhd.png" alt="raka" class="img-fluid" style="width: 100%;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-about img ftco-section ftco-no-pb" style="margin-top: 100px;">
		<div class="container" id="about-section">
			<div class="row d-flex">
				<!-- Gambar di sebelah kiri -->
				<div class="col-md-6 col-lg-5 d-flex order-md-first">
					<div class="img-about img d-flex align-items-stretch">
						<div class="overlay"></div>
						<div class="img d-flex align-self-stretch align-items-center"
							style="background-image:url(img/<?= $rowsabout['logo'] ?>)">
						</div>
					</div>
				</div>

				<!-- Isi About di sebelah kanan -->
				<div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
					<div class="row justify-content-start pb-3">
						<div class="col-md-12 heading-section ftco-animate" style="margin-top: 50px;">
							<h1 class="big">About</h1>
							<h2 class="mb-4">About Me</h2>
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							<ul class="about-info mt-4 px-md-0 px-2">
								<li class="d-flex"><span>Name:</span> <span><?= $rowsabout['nama_lengkap'] ?></span></li>
								<li class="d-flex"><span>Date of birth:</span> <span><?= $rowsabout['tanggal_lahir'] ?></span></li>
								<li class="d-flex"><span>Address:</span> <span><?= $rowsabout['alamat'] ?></span></li>
								<li class="d-flex"><span>Url Website:</span> <span><?= $rowsabout['alamat_website'] ?></span></li>
								<li class="d-flex"><span>Email:</span> <span><?= $rowsabout['email'] ?></span></li>
								<li class="d-flex"><span>Phone: </span> <span><?= $rowsabout['tlpn'] ?></span></li>
							</ul>
						</div>
					</div>

					<div class="counter-wrap ftco-animate d-flex mt-md-3">
						<div class="text" style="margin-top: 50px;">
							<p class="mb-4">
								<span class="number" data-number="120">0</span>
								<span>Project complete</span>
							</p>
							<p><a href="#" class="btn btn-primary py-3 px-3">Download CV</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pb" id="resume-section" style="margin-top: 100px;">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-10 heading-section text-center ftco-animate">
					<h1 class="big big-2">Resume</h1>
					<h2 class="mb-4">Resume</h2>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
				</div>
			</div>
			<div class="row">
				<?php foreach ($rowsresume as $row) { ?>
					<div class="col-md-6">
						<div class="resume-wrap ftco-animate">
							<span class="date"><?php echo $row['tahun_awal'] . "-" . $row['tahun_akhir'] ?></span>
							<h2><?php echo $row['skill'] ?></h2>
							<span class="position"><?php echo $row['instansi'] ?></span>
							<p class="mt-4"><?php echo $row['deskripsi'] ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="row justify-content-center mt-5">
				<div class="col-md-6 text-center ftco-animate">
					<p><a href="#" class="btn btn-primary py-4 px-5">Download CV</a></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section" id="services-section">
		<div class="container">
			<div class="row justify-content-center py-5 mt-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h1 class="big big-2">Services</h1>
					<h2 class="mb-4">Services</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row">
				<?php foreach ($rowsservice as $row) { ?>
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1">
							<span class="icon">
								<i class="<?= $row['icon'] ?>"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5"><?= $row['nama_service'] ?></h3>
							</div>
						</a>
					</div>
				<?php } ?>

			</div>
		</div>
	</section>


	<section class="ftco-section" id="skills-section">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h1 class="big big-2">Skills</h1>
					<h2 class="mb-4">My Skills</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row">
				<?php foreach ($rowsskill as $row) {
				?>
					<div class="col-md-6 animate-box">
						<div class="progress-wrap ftco-animate">
							<h3><?php echo $row['nama_skill'] ?></h3>
							<div class="progress">
								<div class="progress-bar color-1" role="progressbar" aria-valuenow="90"
									aria-valuemin="0" aria-valuemax="100" style="width:<?= $row['persentase'] ?>%">
									<span><?= $row['persentase'] ?>%</span>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>


			</div>
		</div>
	</section>


	<section class="ftco-section ftco-project" id="projects-section">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h1 class="big big-2">Projects</h1>
					<h2 class="mb-4">Our Projects</h2>
					<p>hasil karya saya</p>
				</div>
			</div>
			<div class="row">
				<?php
				$colclass = ["col-md-4", "col-md-8", "col-md-8", "col-md-4"];
				?>
				<?php foreach ($project as $index => $project) : ?>
					<?php $col = $colclass[$index % 4]; ?>
					<div class="<?php echo $col ?>">
						<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?= "assets/uploads/" . $project['foto'] ?>);">
							<div class="overlay"></div>
							<div class="text text-center p-4">
								<h3><a href="#"><?php echo $project['nama'] ?></a></h3>
								<span><?= $project['kategori'] ?></span>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>


	<section class="ftco-section" id="blog-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h1 class="big big-2">Blog</h1>
					<h2 class="mb-4">Our Blog</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row d-flex">
				<?php foreach ($rowsblog as $row) { ?>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry justify-content-end">
							<a href="single.html" class="block-20" style="background-image: url(<?php echo "assets/uploads/" . $row['foto'] ?>);">
							</a>
							<div class="text mt-3 float-right d-block">
								<div class="d-flex align-items-center mb-3 meta">
									<p class="mb-0">
										<span class="mr-2"><?php echo $row['created'] ?></span>
										<a href="#" class="mr-2"><?php echo isset($row['nama_kategori']) ? $row['nama_kategori'] : 'Tanpa Kategori'; ?></a>
										<a href="#" class="meta-chat"><span class="icon-chat"><?php echo $row['status'] ?></span></a>
									</p>
								</div>
								<h3 class="heading"><a href="single.html"><?php echo $row['judul'] ?></a></h3>
								<p><?php echo $row['penulis'] ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
		<div class="container">
			<div class="row d-md-flex align-items-center">
				<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
					<div class="block-18">
						<div class="text">
							<strong class="number" data-number="100">0</strong>
							<span>Awards</span>
						</div>
					</div>
				</div>
				<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
					<div class="block-18">
						<div class="text">
							<strong class="number" data-number="1200">0</strong>
							<span>Complete Projects</span>
						</div>
					</div>
				</div>
				<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
					<div class="block-18">
						<div class="text">
							<strong class="number" data-number="1200">0</strong>
							<span>Happy Customers</span>
						</div>
					</div>
				</div>
				<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
					<div class="block-18">
						<div class="text">
							<strong class="number" data-number="500">0</strong>
							<span>Cups of coffee</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-hireme img margin-top" style="background-image: url(images/bg_1.jpg)">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 ftco-animate text-center">
					<h2>I'm <span>Available</span> for freelancing</h2>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5">Hire me</a></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h1 class="big big-2">Contact</h1>
					<h2 class="mb-4">Contact Me</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>

			<div class="row d-flex contact-info mb-5">
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-map-signs"></span>
						</div>
						<h3 class="mb-4">Address</h3>
						<p>198 West 21th Street, Suite 721 New York NY 10016</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-phone2"></span>
						</div>
						<h3 class="mb-4">Contact Number</h3>
						<p><a href="tel://1234567920">+ 1235 2355 98</a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-paper-plane"></span>
						</div>
						<h3 class="mb-4">Email Address</h3>
						<p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-globe"></span>
						</div>
						<h3 class="mb-4">Website</h3>
						<p><a href="#">yoursite.com</a></p>
					</div>
				</div>
			</div>

			<div class="row no-gutters block-9">
				<div class="col-md-6 order-md-last d-flex">

					<form action="" method="post" class="bg-light p-4 p-md-5 contact-form">
						<div class="form-group">
							<input type="text" name="nama" class="form-control" required placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="text" name="email" class="form-control" required placeholder="Your Email">
						</div>
						<div class="form-group">
							<input type="text" name="subject" class="form-control" required placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea name="pesan" id="" cols="30" rows="7" class="form-control" required placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="kirim" value="Send Message" class="btn btn-primary py-3 px-5">
						</div>
					</form>

				</div>

				<div class="col-md-6 d-flex">
					<div class="img" style="background-image: url(images/about.jpg);"></div>
				</div>
			</div>
		</div>
	</section>


	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">About</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-4">
						<h2 class="ftco-heading-2">Links</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Services</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Design</a></li>
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Development</a></li>
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Business Strategy</a></li>
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Data Analysis</a></li>
							<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Graphic Design</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="assets/fe/js/jquery.min.js"></script>
	<script src="assets/fe/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="assets/fe/js/popper.min.js"></script>
	<script src="assets/fe/js/bootstrap.min.js"></script>
	<script src="assets/fe/js/jquery.easing.1.3.js"></script>
	<script src="assets/fe/js/jquery.waypoints.min.js"></script>
	<script src="assets/fe/js/jquery.stellar.min.js"></script>
	<script src="assets/fe/js/owl.carousel.min.js"></script>
	<script src="assets/fe/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/fe/js/aos.js"></script>
	<script src="assets/fe/js/jquery.animateNumber.min.js"></script>
	<script src="assets/fe/js/scrollax.min.js"></script>

	<script src="assets/fe/js/main.js"></script>

</body>

</html>