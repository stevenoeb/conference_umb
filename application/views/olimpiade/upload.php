<!-- views/olimpiade/upload.php -->
<div class="container">
    <div class="flash-data" data-flashdata-toast="<?= $this->session->flashdata('message') ?>"></div>
    <div class="flash-data-text" data-flashdata-toast-text="<?= $this->session->flashdata('text') ?>"></div>
    <div class="flash-data-icon" data-flashdata-toast-icon="<?= $this->session->flashdata('icon') ?>"></div>

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
                        <input type="text" name="video_link" id="video_link" class="form-control" placeholder="Enter video link" onkeyup="stoppedTyping()">
                    </div>
                    <button type="submit" class="btn btn-primary" id="upload_button" disabled>Upload</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    function stoppedTyping() {
        if ($(this).val.length > 0) {
            $('#upload_button').prop('disabled', false)
        } else {
            $('#upload_button').prop('disabled', true)
        }
    }
</script>