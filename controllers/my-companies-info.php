<?php
use CompanyApp\DB;
use CompanyApp\Company;
use CompanyApp\Request;
if(!isset($_SESSION['login'])){
    header("Location:/company");
}
$id=intval(basename(Request::uri()));
$connection=DB::connect();
$company=new Company($connection);
$_SESSION['data'] = $company->oneCompany($id)[0];
if(empty($_SESSION['data'])){
    header('Location:/company/user-companies');
}
require('view/page/my-companies-info.view.php');
