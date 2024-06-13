<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row overflow-auto">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
        <?= $this->session->flashdata('message') ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Journal</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($payment as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $p['name'] ?></td>
                        <td><?= $p['title'] ?></td>
                        <td><?= $p['journal_path'] ?></td>
                        <td><a href="" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#paymentModal<?= $i; ?>">Lihat Bukti Pembayaran</a></td>
                        <td>
                            <p class="badge badge-success">Paid</p>
                        </td>
                        <td>
                            <a href="#!" class="badge badge-success">Accept</a>
                            <a href="#!" class="badge badge-danger">Decline</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="paymentModal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title w-100" id="paymentModalLabel">
                                        Bukti Pembayaran
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            x
                                        </span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img class="w-100" src="<?= base_url('assets/data/pembayaran/') . $p['image']; ?>" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->