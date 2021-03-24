<?php
use CompanyApp\DB;
use CompanyApp\Company;
use CompanyApp\Request;
$id=intval(basename(Request::uri()));
$connection=DB::connect();
$company=new Company($connection);
$_SESSION['data'] = $company->oneCompany($id)[0];
if(empty($_SESSION['data'])){
    header('Location:/company/companies');
}
require('view/page/companies-info.view.php');