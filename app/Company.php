<?php
namespace CompanyApp;
use PDO;
class Company{
    protected $pdo;
    private $name="";
    private $code="";
    private $vatCode="";
    private $address="";
    private $phone="";
    private $email="";
    private $activities="";
    private $manager="";
    private $userId=0;
    private $error="";

    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function companyData($company){
        $this->name=$company['name'];
        $this->code=$company['code'];
        $this->vatCode=$company['vatCode'];
        $this->address=$company['address'];
        $this->phone=$company['phone'];
        $this->email=$company['email'];
        $this->activities=$company['activities'];
        $this->manager=$company['manager'];
        $this->userId=$company['userId'];
    }
    public function createCompany($company){
        $this->companyData($company);
        $this->insertCompany();
    }
    public function updateCompany($company, $id){
        $this->companyData($company);
        $this->setCompany($id);
    }

    public function findError($name,$code,$vatCode){
        $query1="SELECT * FROM `info` WHERE company_name=:name OR code=:code OR vat_code=:vatCode";
        $stmt=$this->pdo->prepare($query1);
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":code",$code,PDO::PARAM_STR);
        $stmt->bindValue(":vatCode",$vatCode,PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->fetch()){
            $this->error="Company already exist. Check company name, code or VAT code";
        } else{
            $this->error='';
        }
        return $this->error;
    }
    public function insertCompany(){
        try{
            $query="INSERT INTO `info` (`company_name`,`code`,`vat_code`,`address`,`phone`,`email`,`activities`,`manager`,`user_id`) 
                VALUE (:name,:code,:vatCode,:address,:phone,:email,:activities,:manager,:userId)";
            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(':name',$this->name,PDO::PARAM_STR);
            $stmt->bindParam(':code',$this->code,PDO::PARAM_STR);
            $stmt->bindParam(':vatCode',$this->vatCode,PDO::PARAM_STR);
            $stmt->bindParam(':address',$this->address,PDO::PARAM_STR);
            $stmt->bindParam(':phone',$this->phone,PDO::PARAM_STR);
            $stmt->bindParam(':email',$this->email,PDO::PARAM_STR);
            $stmt->bindParam(':activities',$this->activities,PDO::PARAM_STR);
            $stmt->bindParam(':manager',$this->manager,PDO::PARAM_STR);
            $stmt->bindParam(':userId',$this->userId,PDO::PARAM_INT);
            $stmt->execute();
            header('Location:/company/user-companies');
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function setCompany($id){
        try{
            $query="UPDATE info SET 
                        company_name= :name,
                        code=:code,
                        vat_code=:vatCode,
                        address=:address,
                        phone=:phone,
                        email=:email,
                        activities=:activities,
                        manager=:manager
                    WHERE `company_id`=:id";
            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(':name',$this->name,PDO::PARAM_STR);
            $stmt->bindParam(':code',$this->code,PDO::PARAM_STR);
            $stmt->bindParam(':vatCode',$this->vatCode,PDO::PARAM_STR);
            $stmt->bindParam(':address',$this->address,PDO::PARAM_STR);
            $stmt->bindParam(':phone',$this->phone,PDO::PARAM_STR);
            $stmt->bindParam(':email',$this->email,PDO::PARAM_STR);
            $stmt->bindParam(':activities',$this->activities,PDO::PARAM_STR);
            $stmt->bindParam(':manager',$this->manager,PDO::PARAM_STR);
            $stmt->bindValue(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
            header('Location:/company/my-info/'.$id);
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function deleteCompany($id,$userId){
        try{
            $stmt=$this->pdo->prepare("DELETE FROM info WHERE `company_id`=:id AND `user_id`=:userId");
            $stmt->bindValue(":id",$id,PDO::PARAM_INT);
            $stmt->bindValue(":userId",$userId,PDO::PARAM_INT);
            $stmt->execute();
            header('Location:/company/user-companies');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function oneCompany($id){
        try{
            $statement=$this->pdo->prepare('SELECT * FROM `info` WHERE `company_id`=:id');
            $statement->bindValue(":id",$id,PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }
    public function searchCompany($search){
        try {
            $statement=$this->pdo->prepare("SELECT * FROM `info` WHERE `company_name` LIKE CONCAT('%',:search, '%') OR `code`=:search");
            $statement->bindValue(":search",$search,PDO::PARAM_STR);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }

}

