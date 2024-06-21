<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container mt-5">

        <!-- Payment Proof Upload Form -->
        <form action="<?= base_url('olimpiade/upload_payment') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="payment_proof">Upload Payment Proof</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="payment_proof" name="payment_proof" required onchange="previewFile()">
                    <label class="custom-file-label" for="payment_proof">Choose file...</label>
                </div>
                <div id="previewContainer" class="mt-3" style="display: none;">
                    <img id="filePreview" class="img-thumbnail" src="" alt="Image preview" style="width: 150px; height: auto;">
                    <button type="button" class="btn btn-danger btn-sm mt-2" onclick="cancelPreview()">Cancel</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Button triggers for modals -->
        <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#bankInfoModal">
            Bank Information
        </button>
        <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#billInfoModal">
            Total Bill Info
        </button>

        <!-- Bank Info Modal -->
        <div class="modal fade" id="bankInfoModal" tabindex="-1" aria-labelledby="bankInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bankInfoModalLabel">Bank Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- List of banks -->
                        <ul>
                            <li>Bank A - Account Number: XXXXXXX</li>
                            <li>Bank B - Account Number: XXXXXXX</li>
                            <li>Bank C - Account Number: XXXXXXX</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Bill Info Modal -->
    <div class="modal fade" id="billInfoModal" tabindex="-1" aria-labelledby="billInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="billInfoModalLabel">Total Bill Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Fixed payment amount -->
                    <p><strong>Payment Amount:</strong> 30,000 IDR</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Show the file name and preview of the selected file
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("payment_proof").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName

        previewFile();
    });

    function previewFile() {
        var preview = document.getElementById('filePreview');
        var file = document.getElementById('payment_proof').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
            document.getElementById('previewContainer').style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            cancelPreview();
        }
    }

    function cancelPreview() {
        var preview = document.getElementById('filePreview');
        var fileInput = document.getElementById('payment_proof');
        var fileLabel = document.querySelector('.custom-file-label');

        preview.src = "";
        preview.style.display = 'none';
        document.getElementById('previewContainer').style.display = 'none';
        fileInput.value = "";
        fileLabel.innerText = "Choose file...";
    }
</script>

<style>
    .custom-file-label::after {
        content: "Browse";
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
        content: "Browse";
    }

    .custom-file-label {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

</div>
<!-- /.container-fluid -->