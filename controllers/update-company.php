<?php
use CompanyApp\DB;
use CompanyApp\Company;
use CompanyApp\Validation;
use CompanyApp\Request;
session_start();
$id=intval(basename(Request::uri()));
$connection=DB::connect();
$company=new Company($connection);
$_SESSION['data'] = $company->oneCompany($id)[0];
if(isset($_POST['send'])){
    $error=Validation::validate($_POST);
    if(empty(implode("",$error))){
        $company->updateCompany($_POST,$id);
    } else {
        $_SESSION['error'] = $error;
        require ('view/page/update-company.view.php');
    }
} else {
    unset($_SESSION['error']);
    require ('view/page/update-company.view.php');
}

