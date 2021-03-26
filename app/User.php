<?php
namespace CompanyApp;
use PDO;
class User{
    protected PDO $pdo;
    private string $email="";
    private string $password="";

    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function userData($user){
        $this->email=$user['email'];
        $this->password=$user['password'];

    }
    public function createUser($user){
        $this->userData($user);
        $this->insertUser();
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
    public function emailExist($email): array
    {
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
