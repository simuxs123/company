<?php

use CompanyApp\DB;
use CompanyApp\Company;
use CompanyApp\Request;
if(!isset($_SESSION['login'])){
    header("Location:/company");
}
$connection = DB::connect();
$companies = new Company($connection);
$companies->deleteCompany(intval(basename(Request::uri())),$_SESSION['login']);