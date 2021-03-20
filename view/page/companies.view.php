<?php require("view/_partials/head.view.php");?>
<div class="container-lg mt-5 ">
    <h1 class="text-center">Companies list</h1>
    <div class="text-center my-4">
        <a class=" btn btn-primary" href="/company/add-company">Add company</a>
    </div>
    <div class="row rounded text-center ">
        <div class="col-4 px-0 border border-dark">
            <div class=" title-box">Company name</div>
        </div>
        <div class="col-4 px-0 border border-left-0 border-dark">
            <div class=" title-box">Company address</div>
        </div>
        <div class="col-4 px-0 border border-left-0 border-dark">
            <div class=" title-box">Company email</div>
        </div>
    </div>
    <?php require('view/_partials/company-info.view.php') ?>
    <nav aria-label="Page navigation example " class="mt-5">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="/company/companies/1">First</a></li
                <?php for($i=1; $i<=$_SESSION['totalPg']; $i++) :?>
                    <li class="page-item ">
                        <a class="page-link <?= $i==$_SESSION['pg'] ||$_SESSION['pg']==0&&$i==1?'actives':'' ?>" href="/company/companies/<?=$i?>"><?=$i?></a>
                    </li>
                <?php endfor;?>
            <li class="page-item"><a class="page-link" href="/company/companies/<?=$_SESSION['totalPg']?>">Last</a></li>
        </ul>
    </nav>
</div>
<?php require("view/_partials/footer.view.php");?>
