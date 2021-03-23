<?php
namespace CompanyApp;
use PDO;
class User{
    protected $pdo;
    private $email="";
    private $password="";
    private $error="";

    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function userData($user){
        $this->email=$user['email'];
        $this->password=$user['password'];

    }
    public function createUser($user){
        $this->userData($user);
        if(isset($this->emailExist($user['email'])[0])){
            echo "<p class='warning text-center mt-5'>This email already exist</p>";
        } else {
            $this->insertUser();
        }

    }
    public function LoginUser($user){
        $this->userData($user);
        $this->checkLoginUser();
    }

    public function checkLoginUser(){
        try{
            $statement=$this->pdo->prepare('SELECT * FROM `user` WHERE `email`=:email');
            $statement->bindValue(":email",$this->email,PDO::PARAM_STR);
            $statement->execute();
            $loginUser=$statement->fetchAll(PDO::FETCH_ASSOC);
            if(isset($loginUser[0])){
                if (password_verify($this->password, $loginUser[0]['password'])) {
                    $_SESSION['login']=$loginUser[0]['usr_id'];
                    header('Location: /company');
                } else {
                    echo "<p class='warning text-center mt-5'>Incorrect password</p>";
                }
            } else {
                echo "<p class='warning text-center mt-5'>Email doesnt exist</p>";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function insertUser(){
        try{
            $query="INSERT INTO `user` (`email`,`password`) 
                VALUE (:email,:password)";
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(':email',$this->email,PDO::PARAM_STR);
            $stmt->bindParam(':password',$hash,PDO::PARAM_STR);
            $stmt->execute();
            header('Location:/company/login');
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function emailExist($email){
        try{
            $stmt=$this->pdo->prepare("SELECT * FROM `user` WHERE email=:email");
            $stmt->bindValue(":email",$email,PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
