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
if(empty($_SESSION['data'])){
    header('Location:/company/companies');
}
if(isset($_POST['send'])){
    $error=Validation::validate($_POST);
    if(empty(implode("",$error))){
        if($_SESSION['data']['company_name']!=$_POST['name']||
            $_SESSION['data']['code']!=$_POST['code']||$_SESSION['data']['vat_code']!=$_POST['vatCode']){
            $doesCompanyExist= $company->findError($_POST['name'],$_POST['code'],$_POST['vatCode']);
        }
        if(empty($doesCompanyExist)){
            $company->updateCompany($_POST,$id);
        } else {
            echo "<p class='warning text-center mt-5'>$doesCompanyExist<p>";
            unset($_SESSION['error']);
            require ('view/page/update-company.view.php');
        }
    } else {
        $_SESSION['error'] = $error;
        require ('view/page/update-company.view.php');
    }
} else {
    unset($_SESSION['error']);
    require ('view/page/update-company.view.php');
}

