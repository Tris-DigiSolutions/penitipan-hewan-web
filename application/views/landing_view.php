<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->

	<!-- alert -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

	<div class="container mt-3">

		<div class="row">

			<!-- /.col-lg-3 -->

			<div class="col-lg-12">

				<section class="hero">
					<div class="container">
						<div class="row gy-4">
							<div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
								<h2 class="font-weight-bold mb-2 text-primary">Layanan Penitipan Hewan Terpercaya dan
									Nyaman
								</h2>
								<p class="text-">Tempat Terbaik ntuk Menitipkan Hewan
									Kesayanganmu</p>
								<div>
									<a href="<?= base_url("produk") ?>"
										class="btn btn-primary px-4 font-weight-bold text-white shadow text-uppercase mt-2">Booking
										Sekarang</a>
								</div>
							</div>
							<div class="col-lg-6 order-1 order-lg-2 hero-img">
								<img src="<?= base_url("assets/customer/img/cat.png") ?>" class="img-fluid animated"
									alt="">
							</div>
						</div>
					</div>
				</section>

				<section>
					<!-- Pilih kami -->
					<div class="container px-4 py-5 border-bottom" id="featured-3">
						<h2 class="pb-2 text-primary text-center">Mengapa Memilih Kami?</h2>
						<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
							<div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
								<div class="my-3 p-3">
									<h2 class="display-5 mb-2">Pengalaman Bertahun-tahun</h2>
									<p class="lead">Dengan pengalaman lebih dari 10 tahun, kami adalah pilihan terbaik.
									</p>
								</div>
								<div class="bg-dark shadow-sm mx-auto"
									style="width: 80%; height: 300px; border-radius: 21px 21px 0 0; background-image: url('https://cdn.pixabay.com/photo/2020/01/19/16/44/cat-4778387_1280.jpg'); background-size: cover;background-repeat: no-repeat;">
								</div>
							</div>
							<div
								class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
								<div class="my-3 py-3">
									<h2 class="display-5 mb-2">Tim Profesional</h2>
									<p class="lead">Dikelola oleh tim profesional yang berpengalaman.</p>
								</div>
								<div class="bg-light shadow-sm mx-auto"
									style="width: 80%; height: 300px; border-radius: 21px 21px 0 0; background-image: url('https://cdn.pixabay.com/photo/2019/09/04/13/48/team-4451672_1280.jpg'); background-size: cover;background-repeat: no-repeat; background-position: bottom;">
								</div>
							</div>
							<div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
								<div class="my-3 p-3">
									<h2 class="display-5 mb-2">Fasilitas Lengkap</h2>
									<p class="lead">Fasilitas lengkap untuk kenyamanan hewan peliharaanmu</p>
								</div>
							</div>
						</div>
					</div>
					<!-- End of Galleri -->

					<div class="col-lg-4 text-center">
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
							class="bi bi-alarm mb-2" viewBox="0 0 16 16">
							<path
								d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
							<path
								d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
						</svg>
						<h4 class="fw-normal text-primary">Pengelolaan Secara Real-Time</h4>
						<p>Pantau ketersediaan tempat untuk peliharaanmu secara real-time.</p>
					</div>
					<div class="col-lg-4 text-center">
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
							class="bi bi-house-check mb-2" viewBox="0 0 16 16">
							<path
								d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
							<path
								d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514" />
						</svg>
						<h4 class="fw-normal text-primary">Keamanan & Kenyamanan</h4>
						<p>Jaminan keamanan dan kenyamanan untuk hewan peliharaanmu</p>
					</div>
			</div>
		</div>
		<!-- Cara Booking -->
		<div class="container px-4 py-5 border-bottom" id="carabooking">
			<h2 class="pb-2 text-center text-primary font-weight-bold">Cara Booking</h2>
			<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
				<div class="col d-flex align-items-start">
					<div
						class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="100" height="80" fill="currentColor"
							class="bi bi-1-square-fill" viewBox="0 0 16 16">
							<path
								d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm7.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383z" />
						</svg>
					</div>
					<div>
						<h3 class="fs-2 text-body-emphasis">Daftar atau Login ke akun Anda.</h3>
					</div>
				</div>
				<div class="col d-flex align-items-start">
					<div
						class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="100" height="80" fill="currentColor"
							class="bi bi-2-square-fill" viewBox="0 0 16 16">
							<path
								d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm4.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306" />
						</svg>
					</div>
					<div>
						<h3 class="fs-2 text-body-emphasis">Pilih layanan penitipan</h3>
					</div>
				</div>
				<div class="col d-flex align-items-start">
					<div
						class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="100" height="80" fill="currentColor"
							class="bi bi-3-square-fill" viewBox="0 0 16 16">
							<path
								d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm5.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318" />
						</svg>
					</div>
					<div>
						<h3 class="fs-2 text-body-emphasis">Konfirmasi pemesanan</h3>
					</div>
				</div>
			</div>
		</div>

		<!-- Gallery -->
		<div class="container px-4 py-5 border-bottom" id="galleri">
			<h2 class="pb-2 text-center font-weight-bold text-primary">Galleri</h2>

			<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
				<div class="col">
					<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
						style="background-image: url('https://cdn.pixabay.com/photo/2024/02/17/00/18/cat-8578562_1280.jpg'); background-size: cover;">
						<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
							<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Mpus</h3>
							<ul class="d-flex list-unstyled mt-auto">
								<li class="me-auto">
									<img src="https://pbs.twimg.com/media/DpNiWO7UcAUQKEq.png" alt="BSI" width="32"
										height="32" class="rounded-circle border border-white">
								</li>
								<li class="d-flex align-items-center me-3">
									<svg class="bi me-2" width="1em" height="1em">
										<use xlink:href="#geo-fill"></use>
									</svg>
									<small>Tris-Petshop</small>
								</li>
								<li class="d-flex align-items-center">
									<svg class="bi me-2" width="1em" height="1em">
										<use xlink:href="#calendar3"></use>
									</svg>
									<small>2h yang lalu</small>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
						style="background-image: url('https://cdn.pixabay.com/photo/2023/05/20/16/35/dog-8006807_1280.jpg'); background-size: cover;">
						<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
							<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Anjing sedang berpose</h3>
							<ul class="d-flex list-unstyled mt-auto">
								<li class="me-auto">
									<img src="https://pbs.twimg.com/media/DpNiWO7UcAUQKEq.png" alt="BSI" width="32"
										height="32" class="rounded-circle border border-white">
								</li>
								<li class="d-flex align-items-center me-3">
									<svg class="bi me-2" width="1em" height="1em">
										<use xlink:href="#geo-fill"></use>
									</svg>
									<small>Tris-Petshop</small>
								</li>
								<li class="d-flex align-items-center">
									<svg class="bi me-2" width="1em" height="1em">
										<use xlink:href="#calendar3"></use>
									</svg>
									<small>4h yang lalu</small>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
						style="background-image: url('https://cdn.pixabay.com/photo/2014/04/13/20/49/cat-323262_1280.jpg'); background-size: cover;">
						<div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
							<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Si oren</h3>
							<ul class="d-flex list-unstyled mt-auto">
								<li class="me-auto">
									<img src="https://pbs.twimg.com/media/DpNiWO7UcAUQKEq.png" alt="BSI" width="32"
										height="32" class="rounded-circle border border-white">
								</li>
								<li class="d-flex align-items-center me-3">
									<svg class="bi me-2" width="1em" height="1em">
										<use xlink:href="#geo-fill"></use>
									</svg>
									<small>Tris-Petshop</small>
								</li>
								<li class="d-flex align-items-center">
									<svg class="bi me-2" width="1em" height="1em">
										<use xlink:href="#calendar3"></use>
									</svg>
									<small>5h yang lalu</small>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End of Galleri -->

		<!-- Jumbotron -->
		<div class="container my-5" style="background-color: rgb(248, 249, 250) ;">
			<div class="p-5 text-center bg-body-tertiary rounded-3">
				<h1 class="text-body-emphasis" style="font-size: 2.5rem;">Titip Peliharaanmu Tanpa Khawatir
				</h1>
				<p class="col-lg-8 mx-auto fs-5 text-muted">
					Kami memberikan yang terbaik untuk hewan kesayanganmu dengan layanan penitipan kami yang
					aman, nyaman, dan terpercaya. Temukan kenyamanan dan ketenangan saat bepergian.
				</p>
				<div class="d-inline-flex gap-2 mb-5">
					<button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill"
						type="button"> <a class="text-white" href="grooming/register">
							Pesan Sekarang
						</a>
					</button>
				</div>
			</div>
		</div>
		<!-- End of Jumbotron -->

	</div>
	<!-- /.col-lg-9 -->

	</div>
	<!-- /.row -->

	</div>
	<!-- /.container -->

	<!-- Footer -->
	<?php $this->load->view("customer/layouts/_footer"); ?>

	<?php $this->load->view("customer/layouts/_scripts"); ?>
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire({
				title: 'Yeaayy!!!',
				text: 'Item berhasil ' + flashData,
				icon: 'success'
			});
		}
	</script>

</body>

</html>