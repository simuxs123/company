<?php

use CompanyApp\DB;
use CompanyApp\Company;
use CompanyApp\Request;

$connection = DB::connect();
$companies = new Company($connection);
$companies->deleteCompany(intval(basename(Request::uri())));