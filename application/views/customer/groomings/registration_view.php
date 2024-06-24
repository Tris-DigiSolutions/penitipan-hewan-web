<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_home/_head"); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("customer/layouts/_home/_topbar"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid d-flex flex-column align-items-center">

                    <!-- Page Heading -->
                    <div class="mb-4 text-center">
                        <h1 class="page-heading h3 text-gray-800"><?= $page_title; ?></h1>
                    </div>

                    <div class="card border border-primary border-3 shadow p-3 mb-5 rounded-5" style="border-radius: 5%; width: 80%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 mx-auto">
                                    <form action="<?= base_url("grooming/register") ?>" method="post">
                                        <!-- alert kuota masih belom fix -->
                                        <div class="alert alert-success d-none" role="alert" id="kuota ">
                                            <i class="fas fa-check-circle"></i> Kuota Pet Boarding Tersedia
                                        </div>
                                        <div class="alert alert-danger d-none" role="alert" id="kuota">
                                            <i class="fas fa-times-circle"></i> Kuota Pet Boarding Tidak Tersedia
                                        </div>
                                        <!-- end of alert kuota masih belom fix -->

                                        <div class="form-group mt-5">
                                            <label for="customer_name"><i class="fas fa-user"></i> Nama Customer</label>
                                            <input type="text" id="customer_name" name="customer_name" class="form-control <?= form_error('customer_name') ? 'is-invalid' : ''; ?>" value="<?= $this->session->userdata("name"); ?>">
                                            <?= form_error('customer_name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_phone"><i class="fas fa-phone"></i> Nomor HP Customer</label>
                                            <input type="number" id="customer_phone" name="customer_phone" class="form-control <?= form_error('customer_phone') ? 'is-invalid' : ''; ?>" value="<?= $this->session->userdata("phone"); ?>">
                                            <?= form_error('customer_phone', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_address"><i class="fas fa-map-marker-alt"></i> Alamat Customer</label>
                                            <textarea name="customer_address" id="customer_address" rows="3" class="form-control <?= form_error('customer_address') ? 'is-invalid' : ''; ?>"><?= $this->session->userdata("address"); ?></textarea>
                                            <?= form_error('customer_address', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="pet_type"><i class="fas fa-paw"></i> Jenis Peliharaan</label>
                                            <select name="pet_type" id="pet_type" class="form-control <?= form_error('pet_type') ? 'is-invalid' : ''; ?>">
                                                <option value="" disabled selected>--Pilih Jenis Peliharaan--</option>
                                                <option value="Kucing">Kucing</option>
                                                <option value="Anjing">Anjing</option>
                                            </select>
                                            <?= form_error('pet_type', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                        </div>
                                        <div class="form-group d-none" id="catPackage">
                                            <label for="package_id"><i class="fas fa-box"></i> Paket Boarding Service Kucing</label>
                                            <select name="package_id" id="package_id" class="form-control">
                                                <option value="" disabled selected>--Pilih Paket Pet Boarding Service--</option>
                                                <?php foreach ($packages as $package) : ?>
                                                    <option value="<?= $package["package_id"] ?>"><?= $package["name"] ?> | IDR. <?= number_format($package["cost_for_cat"]) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group d-none" id="dogPackage">
                                            <label for="package_id"><i class="fas fa-box"></i> Paket Boarding Service Anjing</label>
                                            <select name="package_id" id="package_id" class="form-control">
                                                <option value="" disabled selected>--Pilih Paket Pet Boarding Service--</option>
                                                <?php foreach ($packages as $package) : ?>
                                                    <option value="<?= $package["package_id"] ?>"><?= $package["name"] ?> | IDR. <?= number_format($package["cost_for_dog"]) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_created"><i class="fas fa-calendar-alt"></i> Tanggal Check-in</label>
                                            <input type="date" id="date_created" name="date_created" class="form-control <?= form_error('date_created') ? 'is-invalid' : ''; ?>" value="<?= set_value('date_created'); ?>">
                                            <?= form_error('date_created', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_finished"><i class="fas fa-calendar-alt"></i> Tanggal Check-out</label>
                                            <input type="date" id="date_finished" name="date_finished" class="form-control <?= form_error('date_finished') ? 'is-invalid' : ''; ?>" value="<?= set_value('date_finished'); ?>">
                                            <?= form_error('date_finished', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="notes"><i class="fas fa-sticky-note"></i> Catatan Customer (Opsional)</label>
                                            <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
                                        </div>

                                        <!-- Agreement Section -->
                                        <div class="form-group">
                                            <label><i class="fas fa-clipboard-check"></i> Persetujuan dan Ketentuan</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="agree_terms" name="agree_terms" required>
                                                <label class="form-check-label" for="agree_terms">
                                                    Saya setuju dengan syarat dan ketentuan yang berlaku, termasuk:
                                                    <ul class="mt-2">
                                                        <li>Hewan dalam kondisi sehat dan tidak menular</li>
                                                        <li>Hewan tidak memiliki perilaku agresif</li>
                                                        <li>Pemilik bertanggung jawab atas kerusakan yang ditimbulkan hewan</li>
                                                        <li>Penitipan hewan berhak menolak hewan yang tidak sesuai dengan syarat dan ketentuan</li>
                                                    </ul>
                                                </label>
                                            </div>
                                        </div>

										 <!-- Tips Section -->
										 <div class="form-group">
                                            <label><i class="fas fa-lightbulb"></i> Tips:</label>
                                            <ul>
                                                <li>Baca dengan cermat syarat dan ketentuan penitipan hewan sebelum mengisi formulir.</li>
                                                <li>Pastikan semua informasi yang Anda berikan akurat dan lengkap.</li>
                                                <li>Tanyakan kepada penitipan hewan jika Anda memiliki pertanyaan atau keraguan.</li>
                                            </ul>
                                        </div>
										

                                        <div class="form-action d-flex justify-content-center p-3">
                                            <button type="submit" class="btn btn-primary mr-4 p-2"><i class="fas fa-check"></i> Register Pet Boarding Service</button>
                                            <a href="<?= base_url('landing'); ?>" class="btn btn-warning p-2"><i class="fas fa-times"></i> Batalkan</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("customer/layouts/_home/_footer"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->load->view("customer/layouts/_home/_scripts"); ?>
    <script>
        $('#pet_type').change(function() {
            if ($(this).val() == "Kucing") {
                $('#catPackage').removeClass("d-none");
                $('#dogPackage').addClass("d-none");
            } else if ($(this).val() == "Anjing") {
                $('#dogPackage').removeClass("d-none");
                $('#catPackage').addClass("d-none");
            }
        });

    </script>

</body>

</html>
