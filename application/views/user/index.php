<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-fluid rounded-start" alt="Profile Picture">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name'] ?></h5>
                    <p class="card-text"><strong>Email:</strong> <?= $user['email'] ?></p>
                    <p class="card-text"><strong>Phone:</strong> <?= $user['phone'] ?></p>
                    <p class="card-text"><strong>University:</strong> <?= $user['univ'] ?></p>
                    <p class="card-text"><strong>Country:</strong> <?= $countries[$user['country']] ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']) ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->