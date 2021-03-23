<?php
namespace CompanyApp;
use PDO;
class Pagination{
    protected $pdo;
    private $perPage=6;
    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function totalPages(){
        $statement=$this->pdo->prepare('SELECT COUNT(*) as total FROM `info`');
        $statement->execute();
        $countCompanies= $statement->fetchAll(PDO::FETCH_ASSOC);
        return ceil($countCompanies[0]['total']/6);
    }
    public function paginateCompanies($pg){
        $startPage=$pg>1?($pg-1)*$this->perPage:0;
        $statement=$this->pdo->prepare('SELECT * FROM `info` ORDER BY company_id DESC LIMIT :startPage,:perPage ');
        $statement->bindValue(":startPage",$startPage,PDO::PARAM_INT);
        $statement->bindValue(":perPage",$this->perPage,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function totalPagesMyCompanies($userId){
        $statement=$this->pdo->prepare('SELECT COUNT(*) as total FROM `info` WHERE user_id=:userId');
        $statement->bindValue(":userId",$userId,PDO::PARAM_INT);
        $statement->execute();
        $countCompanies= $statement->fetchAll(PDO::FETCH_ASSOC);
        return ceil($countCompanies[0]['total']/6);
    }
    public function paginateMyCompanies($pg,$userId){
        $startPage=$pg>1?($pg-1)*$this->perPage:0;
        $statement=$this->pdo->prepare('SELECT * FROM `info` WHERE user_id=:userId ORDER BY company_id DESC LIMIT :startPage,:perPage ');
        $statement->bindValue(":userId",$userId,PDO::PARAM_INT);
        $statement->bindValue(":startPage",$startPage,PDO::PARAM_INT);
        $statement->bindValue(":perPage",$this->perPage,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}