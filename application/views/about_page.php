<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<title>About Page</title>
	<style>
		.navbar {
        border-bottom: 1px solid #ccc; /* Warna dan ketebalan garis dapat disesuaikan */
    	}
		.landing-page .img-landing {
			max-width: 500px;
			max-height: 500px;
		}
		.list-img {
			max-width: 30px;
			max-height: 30px;
		}

		.icon-service {
			max-width: 70px;
			max-height: 70px;
		}
		.vision-mission {
            padding: 100px 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .vision-mission h1 {
            font-size: 48px;
            font-weight: bold;
        }
        .vision-mission p {
            font-size: 20px;
            line-height: 1.6;
            margin-top: 30px;
        }
        .content {
            padding: 50px 0;
        }
        .content h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .content ul {
            padding-left: 20px;
            list-style-type: none;
        }
        .content ul li {
            font-size: 18px;
            margin-bottom: 15px;
            position: relative;
        }
        .content ul li:before {
            content: "\2022";
            color: #007bff;
            font-size: 24px;
            position: absolute;
            left: -20px;
            top: 6px;
        }
	</style>
</head>
<body>
	<div class="container-d ">
		<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#">
					<h5>PETSHOP <i class="fas fa-paw"></i></h5>
				</a>
				
				<div class="navbar-center d-none d-lg-flex">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Service</a>
						</li>
					</ul>
				</div>
				
				<div class="ml-auto d-flex align-items-center">
					<a href="#"><i class="fas fa-user"></i></a>
				</div>
			</div>
		</nav>
<!-- END NAV -->

<!-- Landing page  ABOUT-->
		<div class="container mt-5 pt-2 mb-5">
			<div class="row landing-page d-flex justify-content-center align-items-center text-start">
				<div class="col-lg-6 d-flex justify-content-center align-items-center">
					<img src="<?php echo base_url('assets/img/cat.png'); ?>" class="img-fluid img-landing" alt="Petshop">
				</div>
				<div class="col-lg-6">
					<h1 class="mb-3 mt-5 text-start">PET<p class="text-primary">SHOP <i class="fas fa-paw"></i></p></h1>
					<p class="text-start">Petshop & Klinik Hewan PETSHOP didirikan dengan visi untuk menjadi penyedia layanan kesehatan hewan dan penitipan hewan peliharaan yang terpercaya dan profesional. Kami memahami betapa pentingnya hewan peliharaan bagi Anda, dan kami berkomitmen untuk memberikan perawatan terbaik dan lingkungan yang aman dan nyaman bagi sahabat bulu Anda.</p>
					<div class="d-flex justify-content-center align-items-center mt-3">
						<img src="<?php echo base_url('assets/assets/img/icon-instagram.png'); ?>" class="list-img me-2" alt="Instagram">
						<img src="<?php echo base_url('assets/assets/img/icon-facebook.png'); ?>" class="list-img me-2" alt="Facebook">
						<img src="<?php echo base_url('assets/assets/img/icon-gmail.png'); ?>" class="list-img me-2" alt="Gmail">
						<img src="<?php echo base_url('assets/assets/img/icon-telegram.png'); ?>" class="list-img me-2" alt="Telegram">
						<img src="<?php echo base_url('assets/assets/img/icon-twiter.png'); ?>" class="list-img me-2" alt="Twitter">
					</div>
				</div>
			</div>
		</div>
<!-- END Landing-page -->

<!-- VISI DAN MISI -->
<div class="container vision-mission text-center bg-info rounded">
	<h2 class="text-white"><i class="fas fa-cat"></i> Visi & Misi</h2>
    </div>

    <!-- Explanation Section -->
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center"><i class="fas fa-paw"></i> Visi Kami</h2>
                <p>Visi kami adalah untuk menciptakan ekosistem yang harmonis antara hewan dan manusia, di mana setiap hewan peliharaan tidak hanya dilihat sebagai binatang, tetapi sebagai anggota keluarga yang berharga. Kami bermimpi untuk menciptakan lingkungan di mana pemilik hewan peliharaan merasa aman, dipercaya, dan dihargai, sementara hewan peliharaan mendapatkan perawatan terbaik yang mungkin, mencakup aspek kesehatan fisik, kesejahteraan emosional, dan perkembangan sosial. Dengan visi ini, kami tidak hanya mengejar keunggulan dalam aspek medis dan teknologi, tetapi juga dalam membentuk hubungan yang kuat antara manusia dan hewan.</p>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Misi Kami <i class="fas fa-dog"></i></h2>
                <ul>
                    <li>Perawatan Berkualitas: Memberikan perawatan kesehatan yang komprehensif dan holistik untuk semua jenis hewan peliharaan dengan menggunakan teknologi modern dan metode terbaik.</li>
                    <li>Kenyamanan dan Keamanan: Menyediakan fasilitas yang aman, nyaman, dan bersih untuk penitipan hewan, sehingga pemilik dapat merasa tenang saat meninggalkan hewan peliharaan mereka.</li>
                    <li>Pendidikan Pemilik Hewan: Menyediakan informasi dan edukasi kepada pemilik hewan tentang perawatan yang tepat, nutrisi, dan kesehatan hewan.</li>
                    <li>Layanan Pelanggan: Memberikan layanan pelanggan yang ramah, responsif, dan profesional, sehingga setiap interaksi dengan kami selalu menjadi pengalaman yang positif.</li>
                    <li>Inovasi Berkelanjutan: Terus berinovasi dan meningkatkan layanan kami agar selalu dapat memenuhi dan melampaui harapan pelanggan.</li>
                </ul>
            </div>
        </div>
    </div>
<!-- END  -->

<!-- PAGE LAYANAN/SERVICE-->
		<div class="container pt-5 pb-5">
			<div class="row justify-content-center text-center mb-5">
				<div class="col-12">
					<h4>Layanan Kami</h4>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-5 mb-4">
					<div class="d-flex">
						<img src="<?php echo base_url('assets/assets/img/icon-home.png'); ?>" class="icon-service me-3" alt="Penitipan hewan">
						<div>
							<h5>Penitipan hewan</h5>
							<p>Kami menawarkan layanan penitipan hewan dengan fasilitas yang lengkap dan nyaman. Hewan peliharaan Anda akan mendapatkan tempat tinggal yang bersih, area bermain yang luas, serta perawatan rutin seperti pemberian makan dan minum.</p>
						</div>
					</div>
				</div>

				<div class="col-md-5 mb-4">
					<div class="d-flex">
						<img src="<?php echo base_url('assets/assets/img/icon-tryning.png'); ?>" class="icon-service me-3" alt="Penitipan hewan">
						<div>
							<h5>Pelatihan hewan</h5>
							<p>Kami menyediakan layanan pelatihan hewan untuk membantu Anda melatih hewan peliharaan Anda dengan cara yang positif dan efektif.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row justify-content-center mt-5">
				<div class="col-md-5 mb-4">
					<div class="d-flex">
					<img src="<?php echo base_url('assets/assets/img/icon-klinik.png'); ?>" class="icon-service me-3" alt="Penitipan hewan">
						<div>
							<h5>Klinik hewan</h5>
							<p>kami menyediakan berbagai macam layanan kesehatan hewan, mulai dari pemeriksaan kesehatan rutin, vaksinasi, pengobatan penyakit, hingga prosedur bedah minor.</p>
						</div>
					</div>
				</div>

				<div class="col-md-5 mb-4">
					<div class="d-flex">
						<img src="<?php echo base_url('assets/assets/img/icon-groming.png'); ?>" class="icon-service me-3" alt="Penitipan hewan">
						<div>
							<h5>Salon hewan</h5>
							<p>Kami menawarkan layanan grooming untuk menjaga kebersihan dan kesehatan bulu serta kulit hewan peliharaan Anda.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- END PAGE 2 -->

	</div>
	<script src="assets/js/scriptsjs"></script>
</body>
</html>