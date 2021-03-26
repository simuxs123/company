<div class="row rounded text-center text-dark h6 mb-0">
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
<?php foreach ($_SESSION['data'] as $company):?>
    <div class="row align-items-center border border-top-0" id="list">
        <div class="col-4 px-0 border-right">
            <div class="py-2 px-3 font-weight-bold "><a href="/company/<?= array_key_exists('userCompanies',$_SESSION)?'my-info':'info'?>/<?=$company['company_id']?>">
                    <?= htmlspecialchars(strtoupper($company['company_name']))?></a>
            </div>
        </div>
        <div class="col-4 px-0 border-right">
            <div class="py-2 px-3"><?=htmlspecialchars(ucfirst(strtolower( $company['address'])))?></div>
        </div>
        <div class="col-4 px-0">
            <div class="py-2 px-3"><?= htmlspecialchars($company['email'])?></div>
        </div>
    </div>
<?php endforeach;?>
<?php if(!$_SESSION['homeCompanies']):?>
<nav aria-label="Page navigation example " class="mt-5">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="/company/<?= array_key_exists('userCompanies',$_SESSION)
                ? 'user-companies' : 'companies' ?>/1">First</a></li
        <?php for($i=1; $i<=$_SESSION['totalPg']; $i++) :?>
            <li class="page-item ">
                <a class="page-link <?= $i==$_SESSION['pg'] ||$_SESSION['pg']==0&&$i==1?'actives':'' ?>" href="/company/<?= array_key_exists('userCompanies',$_SESSION)
                    ? 'user-companies' : 'companies' ?>/<?=$i?>">
                    <?=$i?>
                </a>
            </li>
        <?php endfor;?>
        <li class="page-item"><a class="page-link" href="/company/<?= array_key_exists('userCompanies',$_SESSION)
                ? 'user-companies' : 'companies' ?>/<?=$_SESSION['totalPg']?>">Last</a></li>
    </ul>
</nav>
<?php endif; ?>
