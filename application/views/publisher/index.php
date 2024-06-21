<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search Name/Title..." autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-primary btn-outline-secondary text-white" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row overflow-auto">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                <?= $this->session->flashdata('message') ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Journal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($submitPaper)) : ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-danger" role="alert">
                                            Data Not Found!
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach ($submitPaper as $sp) : ?>
                                <tr>
                                    <th scope="row"><?= ++$start; ?></th>
                                    <td><?= $sp['name'] ?></td>
                                    <td><?= $sp['title'] ?></td>
                                    <td><?= $sp['journal_path'] ?></td>
                                    <td>
                                        <a href="<?= base_url("publisher/download/$sp[id]") ?>" class="badge badge-success">Download</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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