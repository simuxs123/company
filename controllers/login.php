
<?php

use CompanyApp\DB;
use CompanyApp\User;
use CompanyApp\Validation;

if(isset($_SESSION['login'])){
    header("Location:/company");
}
unset($_SESSION['error']);
unset($_SESSION['userError']);

if (isset($_POST['login'])) {
    $error = Validation::validateUser($_POST);
    if (empty(implode("", $error))) {
        $connection = DB::connect();
        $user = new User($connection);
        $loginUser=$user->emailExist($_POST['email']);
        if(isset($loginUser[0])){
            if (password_verify($_POST['password'], $loginUser[0]['password'])) {
                $_SESSION['login']=$loginUser[0]['usr_id'];
                header('Location: /company');
            } else {
                $_SESSION['userError']='Incorrect password';
            }
        } else {
            $_SESSION['userError']='Email doesnt exist';
        }

    } else {
        $_SESSION['error'] = $error;
    }
}
require('view/page/login.view.php');

