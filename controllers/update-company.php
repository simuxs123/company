<?php
use CompanyApp\DB;
use CompanyApp\Company;
use CompanyApp\Validation;
use CompanyApp\Request;
if(!isset($_SESSION['login'])){
    header("Location:/company");
}
unset($_SESSION['error']);
$id=intval(basename(Request::uri()));
$connection=DB::connect();
$company=new Company($connection);
$_SESSION['data']=$company->oneCompany($id)[0];
if($_SESSION['login']!=$_SESSION['data']['user_id']){
    unset($_SESSION['data']);
    header('Location:/company/companies');
}
if(isset($_POST['send'])){
    $error=Validation::validateCompany($_POST);
    if(empty(implode("",$error))){
            $company->setCompany($_POST,$id);
    } else {
        $_SESSION['error'] = $error;
    }
}
require ('view/page/update-company.view.php');


