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
            <div class="row overflow-auto mt-4">
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
                                <th scope="col">Link Video</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $article) : ?>
                                <tr>
                                    <th scope="row"><?= ++$start; ?></th>
                                    <td><?= $article['name'] ?></td>
                                    <td><?= $article['title'] ?></td>
                                    <td><?= $article['journal_path'] ?></td>
                                    <td><a href="<?= $article['link_video'] ?>" target="_blank"><?= $article['link_video'] ?></a></td>
                                    <td>
                                        <span class="badge <?= ($article['is_accept'] == "unaccept") ? "badge-danger" : "badge-success" ?>"><?= $article['is_accept']; ?></span>
                                    </td>
                                    <td>
                                        <a href="#!" class="badge badge-info">Accept</a>
                                        <a href="#!" class="badge badge-danger">Decline</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->