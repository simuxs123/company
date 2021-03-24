<?php require("view/_partials/head.view.php");?>
<?php require ('view/_partials/nav.view.php');?>
<div class="container">
    <h1 class="text-center mt-3">Company information</h1>
    <div class="company-info-box p-4 d-flex flex-column justify-content-between"">
        <?php require ("view/_partials/company-info.view.php")?>
        <a class="btn btn-warning" href="/company/companies/<?=$_SESSION['pg']?>">Go to list</a>
    </div>
</div>

<?php require("view/_partials/footer.view.php");?>

