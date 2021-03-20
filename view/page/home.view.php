<?php require("view/_partials/head.view.php");?>
    <div class="container">
        <h1 class="text-center mt-5">Companies managment app</h1>
        <form class="form-inline" method="POST">
            <div class="form-group mx-sm-3 mb-2 w-75">
                <input type="text"  class="form-control w-100" id="inputSearch" name="search" placeholder="Search for company name">
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-2">Search</button>
        </form>
        <?php if(!empty($_SESSION['data']) ):?>
            <?php require("view/_partials/company-info.view.php") ?>
        <?php elseif(isset($_POST['submit'])):?>
            <h3 class="text-center mt-4">Nothing found for "<?=$_POST['search']?>". Please try again!</h3>
        <?php endif;?>
    </div>
<?php require("view/_partials/footer.view.php");?>