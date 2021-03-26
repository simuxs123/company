<?php

 use CompanyApp\DB;
 use CompanyApp\Company;
 use CompanyApp\Validation;
if(!isset($_SESSION['login'])){
    header("Location:/company");
}
unset($_SESSION['error']);
unset($_SESSION['userError']);
 if(isset($_POST['send'])){
     $error=Validation::validateCompany($_POST);
     if(empty(implode("",$error))){
         $connection=DB::connect();
         $company=new Company($connection);
         $doesCompanyExist= $company->findError($_POST['name'],$_POST['code'],$_POST['vatCode']);
         if($doesCompanyExist>0){
             $_SESSION['userError']='Company already exist. Check company name, code or VAT code';
         } else {
             $company->setCompany($_POST);
         }
     } else {
             $_SESSION['error'] = $error;
     }
 }
 require ('view/page/add-company.view.php');
