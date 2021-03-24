<?php

 use CompanyApp\DB;
 use CompanyApp\Company;
 use CompanyApp\Validation;
if(!isset($_SESSION['login'])){
    header("Location:/company");
}

 if(isset($_POST['send'])){
     $error=Validation::validateCompany($_POST);
     if(empty(implode("",$error))){
         $connection=DB::connect();
         $company=new Company($connection);
         $doesCompanyExist= $company->findError($_POST['name'],$_POST['code'],$_POST['vatCode']);
         if(empty($doesCompanyExist)){
             $_POST['userId']=$_SESSION['login'];
             $company->createCompany($_POST);
         } else {
             echo "<p class='warning text-center mt-5'>$doesCompanyExist<p>";
             unset($_SESSION['error']);
             require ('view/page/add-company.view.php');
         }
     } else {
             $_SESSION['error'] = $error;
             require ('view/page/add-company.view.php');
     }
 } else {
     unset($_SESSION['error']);
     require ('view/page/add-company.view.php');
 }