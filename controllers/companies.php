<?php

use CompanyApp\DB;
use CompanyApp\Pagination;
use CompanyApp\Request;

$connection=DB::connect();
$companies=new Pagination($connection);
$pg=intval(basename(Request::uri()));
$_SESSION['pg']=$pg;
$_SESSION['totalPg']=$companies->totalPagesCompanies();
if($_SESSION['pg']>$_SESSION['totalPg']){
    header('Location:/company/companies');
    unset($_SESSION['pg']);
    unset($_SESSION['totalPg']);
}
$_SESSION['data']=$companies->paginateCompanies($pg);
$_SESSION['homeCompanies']=false;
require ('view/page/companies.view.php');

