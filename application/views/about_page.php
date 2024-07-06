<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->

	<div class="container-d " id="about">

		<!-- Landing page  ABOUT-->
		<div class="container mt-5 pt-2 mb-5">
			<div class="row landing-page d-flex justify-content-center align-items-center text-start">
				<div class="col-lg-6 d-flex justify-content-center align-items-center">
					<img src="<?php echo base_url('assets/assets/img/cat.png'); ?>" class="img-fluid img-landing"
						alt="Petshop">
				</div>
				<div class="col-lg-6">
					<h1 class="mb-3 mt-5 text-start">PET<p class="text-primary">SHOP <i class="fas fa-paw"></i></p>
					</h1>
					<p class="text-start">Petshop & Klinik Hewan PETSHOP didirikan dengan visi untuk menjadi penyedia
						layanan kesehatan hewan dan penitipan hewan peliharaan yang terpercaya dan profesional. Kami
						memahami betapa pentingnya hewan peliharaan bagi Anda, dan kami berkomitmen untuk memberikan
						perawatan terbaik dan lingkungan yang aman dan nyaman bagi sahabat bulu Anda.</p>
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
					<p>Visi kami adalah untuk menciptakan ekosistem yang harmonis antara hewan dan manusia, di mana
						setiap hewan peliharaan tidak hanya dilihat sebagai binatang, tetapi sebagai anggota keluarga
						yang berharga. Kami bermimpi untuk menciptakan lingkungan di mana pemilik hewan peliharaan
						merasa aman, dipercaya, dan dihargai, sementara hewan peliharaan mendapatkan perawatan terbaik
						yang mungkin, mencakup aspek kesehatan fisik, kesejahteraan emosional, dan perkembangan sosial.
						Dengan visi ini, kami tidak hanya mengejar keunggulan dalam aspek medis dan teknologi, tetapi
						juga dalam membentuk hubungan yang kuat antara manusia dan hewan.</p>
				</div>
				<div class="col-md-6">
					<h2 class="text-center">Misi Kami <i class="fas fa-dog"></i></h2>
					<ul>
						<li>Perawatan Berkualitas: Memberikan perawatan kesehatan yang komprehensif dan holistik untuk
							semua jenis hewan peliharaan dengan menggunakan teknologi modern dan metode terbaik.</li>
						<li>Kenyamanan dan Keamanan: Menyediakan fasilitas yang aman, nyaman, dan bersih untuk penitipan
							hewan, sehingga pemilik dapat merasa tenang saat meninggalkan hewan peliharaan mereka.</li>
						<li>Pendidikan Pemilik Hewan: Menyediakan informasi dan edukasi kepada pemilik hewan tentang
							perawatan yang tepat, nutrisi, dan kesehatan hewan.</li>
						<li>Layanan Pelanggan: Memberikan layanan pelanggan yang ramah, responsif, dan profesional,
							sehingga setiap interaksi dengan kami selalu menjadi pengalaman yang positif.</li>
						<li>Inovasi Berkelanjutan: Terus berinovasi dan meningkatkan layanan kami agar selalu dapat
							memenuhi dan melampaui harapan pelanggan.</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- END  -->

		<!-- PAGE LAYANAN/SERVICE-->
		<div class="container pt-5 pb-5">
			<div class="row justify-content-center text-center mb-5">
				<div class="col-12">
					<h3>Layanan Kami</h3>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-5 mb-4">
					<div class="d-flex">
						<img src="<?php echo base_url('assets/assets/img/icon-home.png'); ?>" class="icon-service me-3"
							alt="Penitipan hewan">
						<div class="ml-3">
							<h5>Penitipan hewan</h5>
							<p>Kami menawarkan layanan penitipan hewan dengan fasilitas yang lengkap dan nyaman. Hewan
								peliharaan Anda akan mendapatkan tempat tinggal yang bersih, area bermain yang luas,
								serta perawatan rutin seperti pemberian makan dan minum.</p>
						</div>
					</div>
				</div>

				<div class="col-md-5 mb-4">
					<div class="d-flex">
						<img src="<?php echo base_url('assets/assets/img/icon-tryning.png'); ?>"
							class="icon-service me-3" alt="Penitipan hewan">
						<div class="ml-3">
							<h5>Pelatihan hewan</h5>
							<p>Kami menyediakan layanan pelatihan hewan untuk membantu Anda melatih hewan peliharaan
								Anda dengan cara yang positif dan efektif.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row justify-content-center mt-5">
				<div class="col-md-5 mb-4">
					<div class="d-flex">
						<img src="<?php echo base_url('assets/assets/img/icon-klinik.png'); ?>"
							class="icon-service me-3" alt="Penitipan hewan">
						<div class="ml-3">
							<h5>Klinik hewan</h5>
							<p>kami menyediakan berbagai macam layanan kesehatan hewan, mulai dari pemeriksaan kesehatan
								rutin, vaksinasi, pengobatan penyakit, hingga prosedur bedah minor.</p>
						</div>
					</div>
				</div>

				<div class="col-md-5 mb-4">
					<div class="d-flex">
						<img src="<?php echo base_url('assets/assets/img/icon-groming.png'); ?>"
							class="icon-service me-3" alt="Penitipan hewan">
						<div class="ml-3">
							<h5>Salon hewan</h5>
							<p>Kami menawarkan layanan grooming untuk menjaga kebersihan dan kesehatan bulu serta kulit
								hewan peliharaan Anda.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE 2 -->

		<?php $this->load->view("customer/layouts/_footer"); ?>

	</div>
	<!-- Footer -->
	<?php $this->load->view("customer/layouts/_footer"); ?>

	<?php $this->load->view("customer/layouts/_scripts"); ?>
	<script src="assets/js/scriptsjs">
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire({
				title: 'Sorry',
				text: flashData,
				icon: 'warning',
				confirmButtonText: 'OK'
			});
		}
	</script>
</body>

</html>