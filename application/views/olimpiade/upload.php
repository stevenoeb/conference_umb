<div class="container">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <form action="<?= base_url('olimpiade/upload'); ?>" method="post">
        <div class="form-group">
            <label for="video_link">Video Link</label>
            <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Enter video link (e.g., YouTube)">
            <?= form_error('video_link', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>