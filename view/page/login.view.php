<?php require("view/_partials/head.view.php");?>
<?php require ('view/_partials/nav.view.php');?>
<div class="container">
    <h2 class="text-center my-4">Login</h2>
    <form method="post">
        <div class="form-group row">
            <label for="staticName" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <input class="form-control" id="staticName"  type="text" name="email" placeholder="Enter company name">
            </div>
            <?php if (isset($_SESSION['error'])): ?>
                <p class="warning col-12 text-right"><?= $_SESSION['error']['email'];?></p>
            <?php endif;?>
        </div>
        <div class="form-group row">
            <label for="staticCode" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
                <input class="form-control" id="staticCode" type="password" name="password" placeholder="Enter company code">
            </div>
            <?php if (isset($_SESSION['error'])): ?>
                <p class="warning col-12 text-right"><?= $_SESSION['error']['password'];?></p>
            <?php endif;?>
        </div>
        <button class="btn btn-primary" type="submit" name="login">Login</button>
    </form>
</div>
<?php require("view/_partials/footer.view.php");?>
