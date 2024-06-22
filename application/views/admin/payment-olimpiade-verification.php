<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?> Payment Verification</h1>

    <?= $this->session->flashdata('message') ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search Name..." autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-primary btn-outline-secondary text-white" name="submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row overflow-auto mt-4 table-responsive">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($payment)) : ?>
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-danger" role="alert">
                                        Data Not Found!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($payment as $p) : ?>
                            <tr>
                                <form action="" method="POST">
                                    <th scope="row">
                                        <?= ++$start; ?>
                                        <input type="hidden" name="id" value="<?= $p['olimpiade_id']; ?>">
                                    </th>
                                    <td><?= $p['name'] ?></td>
                                    <td><a href="" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#paymentModal<?= $start; ?>">Lihat Bukti Pembayaran</a></td>
                                    <td>
                                        <span class="badge <?= ($p['is_paid'] == "unpaid") ? "badge-danger" : "badge-success" ?>"><?= $p['is_paid']; ?></span>
                                    </td>
                                    <td>
                                        <?php if ($p['is_paid'] == "paid") : ?>
                                            <input type="button" class="btn btn-sm btn-secondary rounded-pill" value="Accept" disabled />
                                        <?php elseif ($p['is_paid'] == "unpaid") : ?>
                                            <input type="submit" class="btn btn-sm btn-outline-info rounded-pill" name="accept" value="Accept" onclick="return confirm('Are you sure?')" />
                                        <?php endif; ?>
                                    </td>
                                </form>
                            </tr>

                            <div class="modal fade" id="paymentModal<?= $start; ?>" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100" id="paymentModalLabel">Bukti Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="w-100" src="<?= base_url('assets/data/pembayaran_olimpiade/') . $p['image']; ?>" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex row justify-content-between align-items-center px-2 mt-4">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing <?= $total_row; ?> data</div>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->