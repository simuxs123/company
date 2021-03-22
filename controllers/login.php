<?php

use CompanyApp\DB;
use CompanyApp\User;
use CompanyApp\Validation;
if(isset($_SESSION['login'])){
    header("Location:/company");
}
if (isset($_POST['login'])) {
    $error = Validation::validateUser($_POST);
    if (empty(implode("", $error))) {
        $connection = DB::connect();
        $user = new User($connection);
        $user->loginUser($_POST);
        require('view/page/login.view.php');
    } else {
        $_SESSION['error'] = $error;
        require('view/page/login.view.php');
    }
} else {
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }
    require('view/page/login.view.php');
}