<!DOCTYPE html>
<html lang="en">

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
                    <h1 class="h3 mb-4 text-gray-800"><?= $page_title ?></h1>

                    <form id="payment-form" method="post" action="<?= base_url("customer/grooming/konfirmasiGrooming") ?>">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        <input type="hidden" name="result_data" id="result-data" value="">
                    </form>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Customer</th>
                                                <td id="customer_name"><?= $grooming["customer_name"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone Customer</th>
                                                <td id="customer_phone"><?= $grooming["customer_phone"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat Customer</th>
                                                <td id="customer_address"><?= $grooming["customer_address"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pet Type</th>
                                                <td id="pet_type"><?= $grooming["pet_type"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Package</th>
                                                <td id="package"><?= $grooming["package_name"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tarif</th>
                                                <td id="tarif">Rp<?= number_format($grooming["tarif"], '0', '', '.') ?></td>
                                            </tr>
                                            <tr>
                                                <th>Check-in</th>
                                                <td id="check_in"><?= $grooming["date_created"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Check-out</th>
                                                <td id="check_out"><?= $grooming["date_finished"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Notes</th>
                                                <td id="notes"><?= $grooming["notes"] ?></td>
                                            </tr>
                                        </table>
                                        <!-- <button id="pay-button" class="btn btn-success">Bayar</button> -->
                                        <button id="pay-button" class="btn btn-success">Bayar</button>
                                        <button id="cancel-button" class="btn btn-danger">Cancel</button>
                                    </div>
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
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            snap.pay('<?= $snapToken ?>', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    Swal.fire({
                        title: 'Payment Success!',
                        text: 'Your payment has been processed successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        window.location.href = "<?= base_url('grooming') ?>";
                    });
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>

</body>

</html>