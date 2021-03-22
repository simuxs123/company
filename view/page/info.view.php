<?php require("view/_partials/head.view.php");?>

<div class="container">
    <h1 class="text-center mt-3">Company information</h1>
    <div class="company-info-box p-4 d-flex flex-column justify-content-between"">
    <div>
        <p> Company name: <span class="font-weight-bold"><?= htmlspecialchars(ucfirst(strtolower($_SESSION['data'][0]['company_name']))) ?></span></p>
        <p>Company code: <span class="font-weight-bold"><?= htmlspecialchars($_SESSION['data'][0]['code']) ?></span></p>
        <p>Company vat code: <span class="font-weight-bold">LT-<?= htmlspecialchars($_SESSION['data'][0]['vat_code']) ?></span></p>
        <p>Company address: <span class="font-weight-bold"><?= htmlspecialchars($_SESSION['data'][0]['address']) ?></span></p>
        <p>Company phone: <span class="font-weight-bold"><?= htmlspecialchars($_SESSION['data'][0]['phone']) ?></span></p>
        <p>Company email: <span class="font-weight-bold"><?= htmlspecialchars($_SESSION['data'][0]['email']) ?></span></p>
        <p>Company activity: <span class="font-weight-bold"><?= htmlspecialchars(ucfirst(strtolower($_SESSION['data'][0]['activities']))) ?></span></p>
        <p>Company manager: <span class="font-weight-bold"><?= htmlspecialchars(ucwords($_SESSION['data'][0]['manager'])) ?></span></p>
    </div>
        <div>
            <a class="btn btn-success" href="/company/update-company/<?= $_SESSION['data'][0]['id'] ?>">Update</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                Delete
            </button>
            <a class="btn btn-warning" href="/company/companies/<?=$_SESSION['pg']?>">Go to list</a>
        </div>

        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
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
                        <a class="btn btn-danger" href="/company/delete-company/<?= $_SESSION['data'][0]['id'] ?>">Delete</a>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning ">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require("view/_partials/footer.view.php");?>

