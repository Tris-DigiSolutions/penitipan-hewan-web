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
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">

                                    <form action="<?= base_url("admin/grooming/changeKuota") ?>" method="post">
                                        <div class="form-group">
                                            <label for="kuota">Kuota Pet Boarding:</label>
                                            <input class="form-control" type="number" id="kuota" name="kuota" placeholder="<?= $total_kuota; ?>" required>
                                        </div>
                                        <button class="btn btn-primary mt-3" type="submit">Ubah Kuota</button>
                                    </form>
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

    <!-- SweetAlert2 Script for Flashdata -->
    <script>
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            Swal.fire({
                title: 'Success!',
                text: flashData,
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>

</html>