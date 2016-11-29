<?php
namespace App\BITM\PhpCoder\Admin;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
use App\BITM\PhpCoder\Model\Database as DB;
use PDO;


class Admin extends DB{
    //public $table="admin";
    public $firstName="";
    public $lastName="";
    public $email="";
    public $phone="";
    public $address="";
    public $password="";
    public $id="";
    public $email_token="";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){

        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('first_name',$data)){
            $this->firstName=$data['first_name'];
        }
        if(array_key_exists('last_name',$data)){
            $this->lastName=$data['last_name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }

        if(array_key_exists('email_token',$data)){
            $this->email_token=$data['email_token'];
        }
        return $this;
    }

    public function store() {

        $query="INSERT INTO `admin` (`first_name`, `last_name`, `email`, `password`, `phone`, `address`,`email_verified`)
VALUES (:firstName, :lastName, :email, :password,:phone, :address, :email_token)";

        $result=$this->conn->prepare($query);

        $result->execute(array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':email'=>$this->email,':password'=>$this->password,
':phone'=>$this->phone,':address'=>$this->address,':email_token'=>$this->email_token));
        
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your email and active your account.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password(){
        $query="UPDATE `admin` SET `password`=:password  WHERE `email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':password'=>$this->password,':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
           // Utility::redirect('../../../../views/SEIPXXXX/User/Profile/login.php');
        }
        else {
            echo "Error";
        }

    }

    public function view(){
        $query="SELECT * FROM `admin` WHERE `email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':email'=>$this->email));
        $row=$result->fetch(PDO::FETCH_OBJ);
        return $row;
    }// end of view()

    
    public function validTokenUpdate(){
        $query="UPDATE `admin` SET  `email_verified`='".'Yes'."' WHERE `email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/PhpCoder/User/Profile/login.php');
    }

    public function update(){

        $query="UPDATE `admin` SET `first_name`=:firstName, `last_name` =:lastName ,  `email` =:email, `phone` = :phone,
 `address` = :address  WHERE `email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':email'=>$this->email,':phone'=>$this->phone,
 ':address'=>$this->address,':email_token'=>$this->email_token));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }


    //crud
    public function index1($fetchMode = 'ASSOC')
    {
        $STH = $this->conn->query("SELECT * from admin WHERE is_deleted='No' AND email_verified='Yes'");
        $fetchMode = strtoupper($fetchMode);
        if (substr_count($fetchMode, 'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData = $STH->fetchAll();
        return $arrAllData;
    }

}

