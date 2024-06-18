<!-- views/olimpiade/upload.php -->

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Upload Video Link
                </div>
                <div class="card-body">
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?php echo $this->session->flashdata('message'); ?>

                    <?php echo form_open('olimpiade/upload'); ?>
                    <div class="form-group">
                        <label for="video_link">Video Link</label>
                        <input type="text" name="video_link" id="video_link" class="form-control" placeholder="Enter video link">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>