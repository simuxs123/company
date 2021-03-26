<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
unset($_SESSION['data']);
unset($_SESSION['userCompanies']);
require('vendor/autoload.php');
use CompanyApp\Request;
use CompanyApp\Router;
require Router::load('routes.php')->direct(Request::uri());
