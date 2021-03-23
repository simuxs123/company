<?php

use CompanyApp\DB;
use CompanyApp\Pagination;
use CompanyApp\Request;


$connection=DB::connect();
$companies=new Pagination($connection);
$pg=intval(basename(Request::uri()));
$_SESSION['pg']=$pg;
$_SESSION['totalPg']=$companies->totalPages();
$_SESSION['data']=$companies->paginateCompanies($pg);

require ('view/page/companies.view.php');

