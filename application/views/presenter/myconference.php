<section class="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">International Conferencer</h6>
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
                                    <td style="width:25%">
                                        <strong>id</strong>
                                    </td>
                                    <td><?= $dataSubmit[0]['id'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <strong>Title</strong>
                                    </td>
                                    <td><?= $dataSubmit[0]['title'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <strong>Name</strong>
                                    </td>
                                    <td><?= $dataSubmit[0]['name'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <strong>To be Published</strong>
                                    </td>
                                    <td>
                                        <a class="badge badge-success text-light">Publish</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <strong>To be Presented</strong>
                                    </td>
                                    <td>
                                        <a class="badge badge-success text-light">Presented</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <strong>Is Accepted</strong>
                                    </td>
                                    <td>
                                        <a class="badge badge-success text-light">Accepted</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <strong>Is Paid?</strong>
                                    </td>
                                    <td>
                                        <a class="badge badge-success text-light">Paid</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <strong>Status Fullpaper</strong>
                                    </td>
                                    <td>Waiting the paper</td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <strong>Notes</strong>
                                    </td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newVideoModal">
                        <!-- <a href="" target="_blank" class="btn btn-info"> -->
                        <i class="fa fa-camera">
                        </i>
                        Upload Video Presentation
                    </a>
                    <a href="" class="btn btn-success">Fullpaper</a>
                    <a class="btn btn-info text-light" data-toggle="modal" data-target="#modal-edit" data-target="#certificateModal">
                        <i class="fa fa-save"></i>
                        Certificate
                    </a>
                    <a href="" class="btn btn-primary">Download Abstract</a>
                    <a href="" class="btn btn-info">
                        <i class="fa fa-save">
                        </i>
                        Submission LOA
                    </a>
                    <form method="POST" action="" class="d-inline confirm" data-confirm="Are you sure to delete this conference? you cant undo all your conference data after delete.">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="newVideoModal" tabindex="-1" aria-labelledby="newVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newVideoModalLabel">Upload Video Presentation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" method="post" action="<?= base_url('presenter/myconference') ?>">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="custom-file">
                                <label for="video_path">File VIDEO PRESENTATION (Format MP4 Max size : 128MB)</label>
                                <input type="file" class="form-control" name="video_path" id="video_path" style="padding-bottom: 35px">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>