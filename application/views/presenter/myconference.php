<div class="container-fluid">

    <!-- Page Heading -->

    <section class="content">
        <?php if ($this->session->flashdata('show_modal')) : ?>
            <!-- Modal -->
            <div class="modal fade" id="abstractModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Anda belum mengisi abstract.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#abstractModal').modal('show');
                });
            </script>
        <?php endif; ?>
        <?php foreach ($dataSubmit as $submission) : ?>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Accounting Challenges and Opportunities in The Global Era</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-lg-3 text-center">
                                <img src="" alt="User Pic" class="image-responsive-rounded" style="width:75%; height: auto">
                            </div>
                            <div class="col-md-9 col-lg-9">
                                <br>
                                <table class="table table-user-information table-sm">
                                    <tbody>
                                        <tr>
                                            <td style="width:25%"><strong>id</strong></td>
                                            <td><?= $submission['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:25%"><strong>Title</strong></td>
                                            <td><?= $submission['title'] ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:25%"><strong>Name</strong></td>
                                            <td><?= $submission['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:25%"><strong>Is Accepted</strong></td>
                                            <td>
                                                <?php if ($submission['is_accept'] == 'unaccept') : ?>
                                                    <a class="badge badge-danger text-light"><?= $submission['is_accept'] ?></a>
                                                <?php else : ?>
                                                    <a class="badge badge-success text-light"><?= $submission['is_accept'] ?></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:25%"><strong>Is Paid</strong></td>
                                            <td>
                                                <?php if ($submission['is_paid'] == 'unpaid') : ?>
                                                    <a class="badge badge-danger text-light"><?= $submission['is_paid'] ?></a>
                                                <?php elseif ($submission['is_paid'] == 'pending') : ?>
                                                    <a class="badge badge-warning text-light"><?= $submission['is_paid'] ?></a>
                                                <?php else : ?>
                                                    <a class="badge badge-success text-light"><?= $submission['is_paid'] ?></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:25%"><strong>Status Fullpaper</strong></td>
                                            <td>Waiting for the paper</td>
                                        </tr>
                                        <tr>
                                            <td style="width:25%"><strong>Notes</strong></td>
                                            <td><?= $submission['notes'] ?? '-' ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newVideoModal" data-id="<?= $submission['id'] ?>">
                                <i class="fa fa-camera"></i>
                                Upload Link Video Presentation
                            </button>
                            <!-- <a href="" class="btn btn-success">Fullpaper</a> -->
                            <a class="btn btn-info text-light" data-toggle="modal" data-target="#modal-edit" data-target="#certificateModal">
                                <i class="fa fa-save"></i>
                                Certificate
                            </a>
                            <a href="<?= base_url('presenter/view_pdf/') . $submission['id'] ?>" class="btn btn-primary">Download Abstract</a>
                            <a href="" class="btn btn-info">
                                <i class="fa fa-save"></i>
                                Submission LOA
                            </a>
                            <form method="POST" action="" class="d-inline confirm" data-confirm="Are you sure to delete this conference? you can't undo all your conference data after delete.">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

</div>
<!-- /.container-fluid -->

</div>


<!-- Modal -->
<div class="modal fade" id="newVideoModal" tabindex="-1" aria-labelledby="newVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newVideoModalLabel">Upload Link Video Presentation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('presenter/myconference'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="submissionId" name="id">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Link Video Presentation">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>