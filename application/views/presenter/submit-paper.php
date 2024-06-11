<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <form enctype="multipart/form-data" method="post" action="<?= base_url('presenter/submitPaper') ?>">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Show your idea
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="Topic">Topic</label>
                                <input type="text" name="topic" id="topic" class="form-control" value="Educational Technology" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="Is_Publihesed">Do you intend to Publish Your Paper?</label>
                                <select class="form-control" name="publish_journal" id="publish_journal">
                                    <!-- <option value="">Select..</option> -->
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="" placeholder>
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="custom-file">
                                <label for="journal_path">File FULLPAPER (Format DOCX Max size : 128MB)</label>
                                <input type="file" class="form-control" name="journal_path" id="journal_path" style="padding-bottom: 35px">
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-12">
                        <div class="form-group">
                            <div class="custom-file">
                                <label for="poster_path">Poster</label>
                                <input type="file" class="form-control" name="poster_path" id="poster_path" style="padding-bottom: 35px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer" style="text-align: center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->