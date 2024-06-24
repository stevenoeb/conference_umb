<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
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
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Video Link</th>
                            <th scope="col">Upload Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($submissions)) : ?>
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-danger" role="alert">
                                        Data Not Found!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($submissions as $submission) : ?>
                            <tr>
                                <td><?= ++$start; ?></td>
                                <td><?= $submission['name']; ?></td>
                                <td><a href="<?= $submission['link_video']; ?>" target="_blank"><?= $submission['link_video']; ?></a></td>
                                <td><?= date('d M Y', strtotime($submission['upload_date'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</div>