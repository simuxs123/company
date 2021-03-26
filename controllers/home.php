<?php

use CompanyApp\DB;
use CompanyApp\Company;
if(isset($_POST['submit'])) {
    $connection = DB::connect();
    $company = new Company($connection);
    if (!empty($_POST['search'])) {
        $searchCompany = $company->searchCompany($_POST['search']);
        $_SESSION['data'] = $searchCompany;
    }
    $_SESSION['homeCompanies'] = true;
}
require ('view/page/home.view.php');






