<?php require("view/_partials/head.view.php");?>
<?php require ('view/_partials/nav.view.php');?>
<div class="container">
    <h1 class="text-center mt-3">Company information</h1>
    <div class="company-info-box p-4 d-flex flex-column justify-content-between"">
    <?php require ("view/_partials/company-info.view.php")?>
    <div>
        <a class="btn btn-success" href="/company/update-company/<?= $_SESSION['data']['company_id'] ?>">Update</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
            Delete
        </button>
        <a class="btn btn-warning" href="/company/user-companies/<?=$_SESSION['pg']?>">Go to list</a>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you really want to DELETE this company?!
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="/company/delete-company/<?= $_SESSION['data']['company_id'] ?>">Delete</a>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning ">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php require("view/_partials/footer.view.php");?>


