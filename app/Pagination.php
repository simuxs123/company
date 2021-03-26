<?php
namespace CompanyApp;
use PDO;
class Pagination{
    protected PDO $pdo;
    private int $perPage=6;
    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    public function totalPagesCompanies($userId=null){
        try{
            if(isset($userId)){
                $query='SELECT * FROM `info` WHERE user_id=:userId';
                $statement=$this->pdo->prepare($query);
                $statement->bindValue(":userId",$userId,PDO::PARAM_INT);
            } else {
                $query='SELECT * FROM `info`';
                $statement=$this->pdo->prepare($query);
            }
            $statement->execute();
            $countCompanies= $statement->rowCount();
            return ceil($countCompanies/6);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }
    public function paginateCompanies($pg,$userId=null): array
    {
        $startPage=$pg>1?($pg-1)*$this->perPage:0;
        try{
            if(isset($userId)){
                $query='SELECT * FROM `info` WHERE user_id=:userId ORDER BY company_id DESC LIMIT :startPage,:perPage ';
                $statement=$this->pdo->prepare($query);
                $statement->bindValue(":userId",$userId,PDO::PARAM_INT);
            } else {
                $query='SELECT * FROM `info` ORDER BY company_id DESC LIMIT :startPage,:perPage ';
                $statement=$this->pdo->prepare($query);
            }
            $statement->bindValue(":startPage",$startPage,PDO::PARAM_INT);
            $statement->bindValue(":perPage",$this->perPage,PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }
}