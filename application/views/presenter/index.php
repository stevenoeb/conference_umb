<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

    <section class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Conference</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 col-lg-3 text-center">
                            <img src="<?= base_url('assets/img/logo/LOGO.jpg') ?>" alt="User Pic" class="img-responsive rounded" style="width: 100%; height: auto">
                        </div>
                        <div class="col-md-9 col-lg-9">
                            <br>
                            <table class="table table-user-information table-sm">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Event Name</strong>
                                        </td>
                                        <td>Accounting Conference on Sustainability and Technopreneurial International 2024</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Conference Name</strong>
                                        </td>
                                        <td>Accounting Challenges and Opportunities in The Global Era</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Date</strong>
                                        </td>
                                        <td>July 3rd & 19th 2024</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Category</strong>
                                        </td>
                                        <td>Accounting</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center py-5">
                    <div class="col-md-5">
                        <div class="box-footer">
                            <a href="<?= base_url('presenter/submitPaper') ?>" class="btn btn-lg btn-warning col-md-12" role="button">
                                <strong>SUBMIT YOUR PAPER</strong>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="box-footer">
                            <a href="https://docs.google.com/document/d/1H11q4kvlSfZYi2jIs-a0HCjZKnkqDoOk/edit?usp=sharing&ouid=106526089610873602560&rtpof=true&sd=true" class="btn btn-lg btn-info col-md-12" role="button">
                                <strong>DOWNLOAD TEMPLATE</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->