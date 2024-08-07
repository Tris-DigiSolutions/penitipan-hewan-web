<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("admin/layouts/_head"); ?>

<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">

			<!-- topbar -->
			<?php $this->load->view("admin/layouts/_topbar"); ?>

			<!-- sidebar -->
			<?php $this->load->view("admin/layouts/_sidebar"); ?>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header d-flex justify-content-between">
						<h1><?= $page_title; ?></h1>
					</div>
					<!-- alert flashdata -->
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<!-- end alert flashdata -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<b>Nama Customer</b>
									<p><?= $grooming["customer_name"]; ?></p>
									<b>Nomor Ponsel Customer</b>
									<p><?= $grooming["customer_phone"]; ?></p>
									<b>Alamat Customer</b>
									<p><?= $grooming["customer_address"]; ?></p>
									<b>Jenis Peliharaan</b>
									<p><?= $grooming["pet_type"]; ?></p>
									<b>Tarif Grooming</b>
									<p>
										<?php if ($grooming["pet_type"] == "Kucing") : ?>
											IDR. <?= number_format($grooming["cost_for_cat"]) ?>
										<?php else : ?>
											IDR. <?= number_format($grooming["cost_for_dog"]) ?>
										<?php endif; ?>
									</p>
									<b>Metode Pembayaran</b>
									<p><?= $grooming["payment_type"] ?></p>
									<b>Status Transaksi</b>
									<p>
										<?php if ($grooming["status_code"] == 200) : ?>
											<span class="badge badge-success">Success</span>
										<?php elseif ($grooming["status_code"] == 201) : ?>
											<span class="badge badge-warning">Pending</span>
										<?php else : ?>
											<span class="badge badge-danger">Denied</span>
										<?php endif; ?>
									</p>
									<b>Waktu Transaksi</b>
									<p><?= $grooming["transaction_time"]; ?></p>
									<b>Status Grooming</b>
									<p>
										<?php if ($grooming["grooming_status"] == "Didaftarkan") : ?>
											<span class="badge badge-info"><?= $grooming["grooming_status"] ?></span>
										<?php elseif ($grooming["grooming_status"] == "Dikerjakan") : ?>
											<span class="badge badge-warning"><?= $grooming["grooming_status"] ?></span>
										<?php else : ?>
											<span class="badge badge-success"><?= $grooming["grooming_status"] ?></span>
										<?php endif; ?>
									</p>
									<b>Jenis Paket Grooming</b>
									<p><?= $grooming["name"]; ?></p>
									<b>Tanggal Masuk</b>
									<p><?= date('d F Y', strtotime($grooming["date_created"])); ?></p>
									<b>Tanggal Keluar</b>
									<p><?= date('d F Y', strtotime($grooming["date_finished"])); ?></p>
									<b>Catatan Customer</b>
									<p><?= $grooming["notes"] ?></p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- footer -->
			<?php $this->load->view("admin/layouts/_footer"); ?>

		</div>
	</div>

	<!-- scripts -->
	<?php $this->load->view("admin/layouts/_scripts"); ?>
</body>

</html>