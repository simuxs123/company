<?php require("view/_partials/head.view.php");?>
<?php require ('view/_partials/nav.view.php');?>
<div class="container-lg mt-5 ">
    <h1 class="text-center my-5">Companies list</h1>
    <?php if (!empty($_SESSION['data'])): ?>
        <?php require("view/_partials/company-list.view.php") ?>
    <?php else:?>
        <h2 class="text-center">No companies found!</h2>
    <?php endif; ?>

</div>
<?php require("view/_partials/footer.view.php");?>
