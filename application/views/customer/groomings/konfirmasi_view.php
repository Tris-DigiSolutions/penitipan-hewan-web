<!DOCTYPE html>
<html lang="en">
<style>
    #payment-form .form-control {
        pointer-events: none;
        background-color: #f0f0f0;

    }
</style>
<?php $this->load->view("customer/layouts/_home/_head"); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("customer/layouts/_home/_sidebar"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("customer/layouts/_home/_topbar"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Konfirmasi Pet Boarding Service</h1>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 mx-auto">
                                            <form id="payment-form" method="post" action="<?= base_url("customer/grooming/finishPayment") ?>">
                                                <!-- alert kuota masih belom fix -->
                                                <div class="alert alert-success d-none" role="alert" id="kuota ">
                                                    <i class="fas fa-check-circle"></i> Kuota Pet Boarding Tersedia
                                                </div>
                                                <div class="alert alert-danger d-none" role="alert" id="kuota">
                                                    <i class="fas fa-times-circle"></i> Kuota Pet Boarding Tidak Tersedia
                                                </div>
                                                <!-- end of alert kuota masih belom fix -->

                                                <input type="hidden" name="result_type" id="result-type" value="">
                                                <input type="hidden" name="result_data" id="result-data" value="">

                                                <div class="form-group mt-5">
                                                    <label for="customer_name"><i class="fas fa-user"></i> Nama Customer</label>
                                                    <input type="text" id="customer_name" name="customer_name" class="form-control" value="<?= $grooming["customer_name"] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="customer_phone"><i class="fas fa-phone"></i> Nomor HP Customer</label>
                                                    <input type="number" id="customer_phone" name="customer_phone" class="form-control " value="<?= $grooming["customer_phone"] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="customer_address"><i class="fas fa-map-marker-alt"></i> Alamat Customer</label>
                                                    <textarea name="customer_address" id="customer_address" rows="3" class="form-control "><?= $grooming["customer_address"] ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="pet_type"><i class="fas fa-paw"></i> Jenis Peliharaan</label>
                                                    <input name="pet_type" id="pet_type" class="form-control" value="<?= $grooming["pet_type"] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="package">Package</label>
                                                    <input name="package" id="package" class="form-control" value="<?= $grooming["package_name"] ?>">
                                                </div>
                                                <div hidden class="form-group">
                                                    <label for="package_id">Package</label>
                                                    <input name="package_id" id="package_id" class="form-control" value="<?= $grooming["package_id"] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tarif">Tarif</label>
                                                    <input name="tarif" id="tarif" class="form-control" value="<?= number_format($grooming["tarif"], '0', '', '.') ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_created"><i class="fas fa-calendar-alt"></i> Tanggal Check-in</label>
                                                    <input id="date_created" name="date_created" class="form-control" value="<?= $grooming["date_created"] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_finished"><i class="fas fa-calendar-alt"></i> Tanggal Check-out</label>
                                                    <input id="date_finished" name="date_finished" class="form-control" value="<?= $grooming["date_finished"] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="notes"><i class="fas fa-sticky-note"></i> Catatan Customer (Opsional)</label>
                                                    <textarea name="notes" id="notes" rows="3" class="form-control"><?= $grooming["notes"] ?></textarea>
                                                </div>

                                                <button id="pay-button" class="btn btn-success">Bayar</button>
                                                <button id="cancel-button" class="btn btn-danger">Cancel</button>
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
                <i class="fas fa-angle-up"></i></a>

            <!-- Bootstrap core JavaScript-->
            <?php $this->load->view("customer/layouts/_home/_scripts"); ?>

            <!-- Midtrans JavaScript -->
            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $this->config->item('midtrans_client_key') ?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <script type="text/javascript">
                $('#pay-button').click(function(event) {
                    event.preventDefault();
                    $(this).attr("disabled", "disabled");

                    var nama = $("#customer_name").val();
                    var phone = $("#customer_phone").val();
                    var alamat = $("#customer_address").val();
                    var pet_type = $("#pet_type").val();
                    var package = $("#package").val();
                    var package_id = $("#package_id").val();
                    var tarif = $("#tarif").val();
                    var check_in = $("#check_in").val();
                    var check_out = $("#check_out").val();
                    var notes = $("#notes").val();
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('customer/grooming/groomingRegistration') ?>",
                        data: {
                            nama: nama,
                            phone: phone,
                            alamat: alamat,
                            pet_type: pet_type,
                            package: package,
                            package_id: package_id,
                            tarif: tarif,
                            check_in: check_in,
                            check_out: check_out,
                            notes: notes,
                        },
                        cache: false,

                        success: function(data) {
                            //location = data;

                            console.log('token = ' + data);

                            var resultType = document.getElementById('result-type');
                            var resultData = document.getElementById('result-data');

                            function changeResult(type, data) {
                                $("#result-type").val(type);
                                $("#result-data").val(JSON.stringify(data));
                                //resultType.innerHTML = type;
                                //resultData.innerHTML = JSON.stringify(data);
                            }

                            snap.pay('<?= $snapToken ?>', {

                                onSuccess: function(result) {
                                    changeResult('success', result);
                                    console.log(result.status_message);
                                    console.log(result);
                                    $("#payment-form").submit();
                                },
                                onPending: function(result) {
                                    changeResult('pending', result);
                                    console.log(result.status_message);
                                    $("#payment-form").submit();
                                },
                                onError: function(result) {
                                    changeResult('error', result);
                                    console.log(result.status_message);
                                    $("#payment-form").submit();
                                }
                            });
                        }
                    });
                });

                var cancelButton = document.getElementById('cancel-button');
                cancelButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, cancel it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?= base_url() ?>";
                        }
                    });
                });
            </script>

</body>

</html>