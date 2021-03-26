
<?php
use CompanyApp\DB;
use CompanyApp\User;
use CompanyApp\Validation;

if(isset($_SESSION['login'])){
    header("Location:/company");
}
unset($_SESSION['error']);
unset($_SESSION['userError']);
if(isset($_POST['register'])){
    $error=Validation::validateUser($_POST);
    if(empty(implode("",$error))){
        $connection=DB::connect();
        $user=new User($connection);
        if(isset($user->emailExist($_POST['email'])[0])){
            $_SESSION['userError']='This email already exist';
        } else {
            $user->createUser($_POST);
        }

    } else {
        $_SESSION['error'] = $error;
    }
}
require ('view/page/register.view.php');

