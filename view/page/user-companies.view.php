<?php require("view/_partials/head.view.php");?>
<?php require ('view/_partials/nav.view.php');?>
<div class="container-lg mt-5 ">
    <h1 class="text-center">My companies list</h1>
    <div class="text-center my-4">
        <a class=" btn btn-primary" href="/company/add-company">Add company</a>
    </div>
    <?php if (!empty($_SESSION['data'])): ?>
        <?php require("view/_partials/company-list.view.php") ?>
    <?php else:?>
        <h2 class="text-center">You dont have any added companies!</h2>
    <?php endif; ?>
</div>
<?php require("view/_partials/footer.view.php");?>
