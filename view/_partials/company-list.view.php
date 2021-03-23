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
            <div class="py-2 px-3 font-weight-bold "><a href="/company/info/<?=$company['company_id']?>"><?= htmlspecialchars(strtoupper($company['company_name']))?></a></div>
        </div>
        <div class="col-4 px-0 border-right">
            <div class="py-2 px-3"><?=htmlspecialchars(ucfirst(strtolower( $company['address'])))?></div>
        </div>
        <div class="col-4 px-0">
            <div class="py-2 px-3"><?= htmlspecialchars($company['email'])?></div>
        </div>
    </div>
<?php endforeach;?>
