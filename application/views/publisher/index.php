<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message') ?>
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
                    <?php $i = 1; ?>
                    <?php foreach ($submitPaper as $sp) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $sp['name'] ?></td>
                            <td><?= $sp['title'] ?></td>
                            <td><?= $sp['journal_path'] ?></td>
                            <td>
                                <a href="<?= base_url("publisher/download/$sp[journal_path]") ?>" class="badge badge-success">Download</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->