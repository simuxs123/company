<?php
use CompanyApp\DB;
use CompanyApp\Company;
use CompanyApp\Request;
session_start();
$id=intval(basename(Request::uri()));
$connection=DB::connect();
$company=new Company($connection);
$_SESSION['data'] = $company->oneCompany($id);
if(empty($_SESSION['data'])){
    header('Location:/company/companies');
}
require('view/page/info.view.php');