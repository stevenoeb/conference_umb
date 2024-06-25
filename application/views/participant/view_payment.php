<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container mt-5">
        <h3>Your Payment Proof</h3>
        <?php if ($payment) : ?>
            <img src="<?= base_url('assets/data/pembayaran_participant/' . $payment['image']) ?>" alt="Payment Proof" class="img-thumbnail" style="width: 150px; height: auto;">
            <p>Uploaded on: <?= $payment['upload_date'] ?></p>
        <?php else : ?>
            <p>No payment proof uploaded yet.</p>
        <?php endif; ?>
        <a href="<?= base_url('participant/upload_payment') ?>" class="btn btn-primary mt-3">Upload New Payment Proof</a>
    </div>
</div>
<!-- /.container-fluid -->
</div>