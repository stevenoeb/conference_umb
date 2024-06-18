<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label>Search:
                            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row overflow-auto mt-4">
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
                                    <span class="badge <?= ($p['is_paid'] == "unpaid") ? "badge-danger" : "badge-success" ?>"><?= $p['is_paid']; ?></span>
                                </td>
                                <td>
                                    <a href="#!" class="badge badge-info">Accept</a>
                                    <a href="#!" class="badge badge-danger">Decline</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="paymentModal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100" id="paymentModalLabel">Bukti Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="w-100" src="<?= base_url('assets/data/pembayaran/') . $p['image']; ?>" />
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
            <div class="d-flex row justify-content-between mt-4">
                <div class="col-sm-12 col-md-6 d-flex justify-content-start">
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->