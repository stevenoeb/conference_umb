<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata-toast="<?= $this->session->flashdata('message') ?>"></div>
    <div class="flash-data-text" data-flashdata-toast-text="<?= $this->session->flashdata('text') ?>"></div>
    <div class="flash-data-icon" data-flashdata-toast-icon="<?= $this->session->flashdata('icon') ?>"></div>

    <!-- Begin Page Content -->
    <div class="container-fluid text-center">
        <div class="welcome-container mt-5">
            <h1 class="display-4">Welcome to</h1>
            <h1 class="display-4">Olimpiade Accounting Challenges and Opportunities in The Global Era</h1>
            <p class="lead mt-4">We are thrilled to have you here for an exciting journey of learning and competition. Embrace the challenges and seize the opportunities as we explore the dynamic world of accounting in the global era.</p>
            <div class="mt-5">
                <img src="<?= base_url('assets/img/logo/LOGO.jpg') ?>" alt="Olimpiade Logo" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
</div>

<!-- Custom CSS for styling -->
<style>
    .welcome-container {
        background-color: #f8f9fc;
        padding: 50px;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .welcome-container h1 {
        color: #2c3e50;
    }

    .welcome-container p {
        color: #34495e;
        font-size: 1.25rem;
    }

    .welcome-container img {
        max-width: 50%;
        /* Adjust the max-width as needed */
        height: auto;
        margin: 0 auto;
        /* Center the image */
        display: block;
    }

    @media (max-width: 768px) {
        .welcome-container h1 {
            font-size: 2.5rem;
        }

        .welcome-container p {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .welcome-container h1 {
            font-size: 2rem;
        }

        .welcome-container p {
            font-size: 0.875rem;
        }

        .welcome-container img {
            max-width: 75%;
        }
    }

    @media (max-width: 400px) {
        .welcome-container h1 {
            font-size: 1rem;
        }

        .welcome-container p {
            font-size: 0.75rem;
        }

        .welcome-container img {
            max-width: 100%;
        }
    }
</style>