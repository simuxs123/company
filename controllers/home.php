<?php

use CompanyApp\DB;
use CompanyApp\Company;

if(isset($_POST['submit'])){
    $connection=DB::connect();
    $company=new Company($connection);
    if(!empty($_POST['search'])){
        $searchCompany=$company->searchCompany($_POST['search']);
    }
    if(isset($searchCompany)){
        $_SESSION['data'] = $searchCompany;
    } else {
        unset($_SESSION['data']);
    }
    require ('view/page/home.view.php');
}else {
    unset($_SESSION['data']);
    require ('view/page/home.view.php');
}





