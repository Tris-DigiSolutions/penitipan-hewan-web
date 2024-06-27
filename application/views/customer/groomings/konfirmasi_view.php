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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Customer</th>
                                                <td><?= $grooming["customer_name"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone Customer</th>
                                                <td><?= $grooming["customer_phone"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat Customer</th>
                                                <td><?= $grooming["customer_address"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pet Type</th>
                                                <td><?= $grooming["pet_type"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Package</th>
                                                <td><?= $grooming["package_name"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tarif</th>
                                                <td><?= $grooming["tarif"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Check-in</th>
                                                <td><?= $grooming["date_created"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Check-out</th>
                                                <td><?= $grooming["date_finished"] ?></td>
                                            </tr>
                                        </table>
                                        <!-- <button id="pay-button" class="btn btn-success">Bayar</button> -->
                                        <a href="<?= base_url() ?>grooming/payment/<?= $grooming['order_id'] ?>" class="btn btn-success">Bayar</a>
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
                    console.log(result);
                    window.location.href = "<?= base_url() ?>grooming/paymentSuccess";
                },
                onPending: function(result) {
                    console.log(result);
                    window.location.href = "<?= base_url() ?>grooming/paymentPending";
                },
                onError: function(result) {
                    console.log(result);
                    window.location.href = "<?= base_url() ?>grooming/paymentError";
                },
                onClose: function() {
                    console.log('customer closed the popup without finishing the payment');
                }
            })
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