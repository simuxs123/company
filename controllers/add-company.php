<?php

 use CompanyApp\DB;
 use CompanyApp\Company;
 use CompanyApp\Validation;
session_start();
 if(isset($_POST['send'])){
     $connection=DB::connect();
     $error=Validation::validate($_POST);
     if(empty(implode("",$error))){
         $company=new Company($connection);
         $doesCompanyExist= $company->findError($_POST['name'],$_POST['code'],$_POST['vatCode']);
         if(empty($doesCompanyExist)){
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