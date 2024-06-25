<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message') ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search Name/Title..." autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-primary btn-outline-secondary text-white" name="submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row overflow-auto mt-4">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
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
                            <?php if (empty($articles)) : ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-danger" role="alert">
                                            Data Not Found!
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach ($articles as $article) : ?>
                                <tr>
                                    <form action="" method="POST">
                                        <th scope="row">
                                            <?= ++$start; ?>
                                            <input type="hidden" name="id" value="<?= $article['id']; ?>">
                                        </th>
                                        <td><?= $article['name'] ?></td>
                                        <td><?= $article['title'] ?></td>
                                        <td>
                                            <a href="<?= base_url('assets/data/jurnal/' . $article['journal_path']) ?>" target="_blank" class="btn btn-primary btn-sm w-100">View Journal</a>
                                        </td>
                                        <td><a href="<?= $article['link_video'] ?>" target="_blank"><?= $article['link_video'] ?></a></td>
                                        <td>
                                            <span class="badge <?= ($article['is_accept'] == "unaccept") ? "badge-danger" : "badge-success" ?>"><?= $article['is_accept']; ?></span>
                                        </td>
                                        <td>
                                            <?php if ($article['is_accept'] == "accepted") : ?>
                                                <input type="button" class="btn btn-sm btn-secondary rounded-pill" value="Accept" disabled />
                                                <!-- <a href="#!" class="badge badge-danger d-none">Decline</a> -->
                                            <?php elseif ($article['is_accept'] == "unaccept") : ?>
                                                <input type="submit" class="btn btn-sm btn-outline-info rounded-pill accept-btn" name="accept" value="Accept" onclick="return confirm('Are you sure?')" />
                                                <!-- <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" name="decline">Decline</button> -->
                                            <?php endif; ?>

                                        </td>
                                    </form>
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