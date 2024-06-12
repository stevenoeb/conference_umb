<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <section class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Upload your Presentation</h6>
                    </div>
                    <form action="<?php echo base_url('olimpiade/upload');?>" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="video_file" name="video_file" required="">
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Submit Presentation</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if (isset($uploaded_file)): ?>
                    <div class="card-footer">
                        <h5>File Details:</h5>
                        <ul>
                            <li>Nama File: <?= $uploaded_file['file_name']; ?></li>
                            <li>Tipe File: <?= $uploaded_file['file_type']; ?></li>
                            <li>Ukuran File: <?= $uploaded_file['file_size']; ?> KB</li>
                        </ul>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </section>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
