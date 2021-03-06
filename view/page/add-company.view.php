<?php require("view/_partials/head.view.php"); ?>
<?php require ('view/_partials/nav.view.php');?>
    <div class="container">
        <?php if (isset($_SESSION['userError'])): ?>
            <p class='warning text-center mt-5'><?=$_SESSION['userError'] ?></p>
        <?php endif;?>
        <div class="content">
            <h2 class="text-center my-4">Add company</h2>
            <form method="post">
                <div class="form-group row">
                    <label for="staticName" class="col-sm-4 col-form-label">Company name</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="staticName"  type="text" name="name" placeholder="Enter company name">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="warning col-12 text-right"><?= $_SESSION['error']['name'];?></p>
                    <?php endif;?>
                </div>
                <div class="form-group row">
                    <label for="staticCode" class="col-sm-4 col-form-label">Company code</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="staticCode" type="text" name="code" placeholder="Enter company code">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="warning col-12 text-right"><?= $_SESSION['error']['code'];?></p>
                    <?php endif;?>
                </div>
                <div class="form-group row">
                    <label for="staticVat" class="col-sm-4 col-form-label">Company VAT code</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="staticVat"  type="text" name="vatCode" placeholder="Enter company vat code">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="warning col-12 text-right"><?= $_SESSION['error']['vatCode'];?></p>
                    <?php endif;?>
                </div>
                <div class="form-group row">
                    <label for="staticAddress" class="col-sm-4 col-form-label">Company address</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="staticAddress" type="text"  name="address" placeholder="Enter company address">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="warning col-12 text-right"><?= $_SESSION['error']['address'];?></p>
                    <?php endif;?>
                </div>
                <div class="form-group row">
                    <label for="staticPhone" class="col-sm-4 col-form-label">Company phone</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="staticPhone" type="text" name="phone" placeholder="Enter company phone">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="warning col-12 text-right"><?= $_SESSION['error']['phone'];?></p>
                    <?php endif;?>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Company email</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="staticEmail" type="text" name="email" placeholder="Enter company email">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="warning col-12 text-right"><?= $_SESSION['error']['email'];?></p>
                    <?php endif;?>
                </div>
                <div class="form-group row">
                    <label for="staticActivity" class="col-sm-4 col-form-label">Company activity</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="staticActivity" type="text" name="activities" placeholder="Enter company activity">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="warning col-12 text-right"><?= $_SESSION['error']['activities'];?></p>
                    <?php endif;?>
                </div>
                <div class="form-group row">
                    <label for="staticManager" class="col-sm-4 col-form-label">Company manager</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="staticManager" type="text" name="manager" placeholder="Enter manager full name">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="warning col-12 text-right"><?= $_SESSION['error']['manager'];?></p>
                    <?php endif;?>
                </div>
                <input type="hidden" name="userId" value="<?= $_SESSION['login']; ?>">
                <button class="btn btn-primary" type="submit" name="send">Add company</button>
                <a class="btn btn-warning" href="companies">Cancel</a>
            </form>
        </div>
    </div>

<?php require("view/_partials/footer.view.php");?>