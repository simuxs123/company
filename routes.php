<?php
use CompanyApp\Router;
$router=new Router();
$router->define([
    '/'=>'controllers/home.php',
    '/companies'=>'controllers/companies.php',
    '/info'=>'controllers/companies-info.php',
    '/my-info'=>'controllers/my-companies-info.php',
    '/delete-company'=>'controllers/delete-company.php',
    '/update-company'=>'controllers/update-company.php',
    '/add-company'=>'controllers/add-company.php',
    '/login'=>'controllers/login.php',
    '/register'=>'controllers/register.php',
    '/user-companies'=>'controllers/user-companies.php',
    '/logout'=>'controllers/logout.php',
    '404'=>'controllers/404.php'
]);