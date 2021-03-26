<?php
use CompanyApp\DB;
use CompanyApp\Pagination;
use CompanyApp\Request;
if(!isset($_SESSION['login'])){
    header("Location:/company");
}

$connection=DB::connect();
$companies=new Pagination($connection);
$userId=$_SESSION['login'];
$pg=strval(basename(Request::uri()));
$_SESSION['pg']=intval($pg);
$_SESSION['totalPg']=$companies->totalPagesCompanies($userId);

if($_SESSION['pg']>$_SESSION['totalPg'] OR !is_numeric($pg) AND $pg!="user-companies" ){
    header('Location:/company/user-companies');
}
$_SESSION['data']=$companies->paginateCompanies($_SESSION['pg'],$userId);
$_SESSION['userCompanies']=true;

require ('view/page/user-companies.view.php');