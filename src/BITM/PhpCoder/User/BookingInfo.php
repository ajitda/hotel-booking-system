<?php
namespace App\BITM\PhpCoder\User;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
use App\BITM\PhpCoder\Model\Database as DB;



class BookingInfo extends DB{
    public $table="booking_info";
    public $bookingNumber="";
    public $packageInfo="";
    public $checkIn="";
    public $checkOut="";
    public $rooms="";
    public $adult="";
    public $children="";
    public $person="";
    public $price="";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('booking_number',$data)){
            $this->bookingNumber=$data['booking_number'];
        }
        if(array_key_exists('package_info',$data)){
            $this->packageInfo=$data['package_info'];
        }
        if(array_key_exists('check_in',$data)){
            $this->checkIn=$data['check_in'];
        }
        if(array_key_exists('check_out',$data)){
            $this->checkOut=$data['check_out'];
        }
        if(array_key_exists('rooms',$data)){
            $this->rooms=$data['rooms'];
        }
        if(array_key_exists('adult',$data)){
            $this->adult=$data['adult'];
        }
        if(array_key_exists('children',$data)){
            $this->children=$data['children'];
        }
        if(array_key_exists('person',$data)){
            $this->person=$data['person'];
        }
        if(array_key_exists('price',$data)){
            $this->price=$data['price'];
        }
        return $this;
    }




    public function store() {

//        var_dump($this);
//        die();

        $query="INSERT INTO `booking_info` (`booking_number`, `package_info`, `check_in`, `check_out`, `rooms`, `adult`, `children`, `person`, `price`,)
VALUES (:bookingNumber, :packageInfo, :checkIn, :checkOut, :rooms, :adult, :children, :person, :price)";

        $result=$this->conn->prepare($query);

        $result->execute(array(':bookingNumber'=>$this->bookingNumber,':packageInfo'=>$this->packageInfo,':checkIn'=>$this->checkIn, ':checkOut'=>$this->checkOut,':rooms'=>$this->rooms,':adult'=>$this->adult,':children'=>$this->children,            ':person'=>$this->person,':price'=>$this->price));

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


//        if($result){
//            Message::message("
//             <div class=\"alert alert-info\">
//             <strong>Success!</strong> Booking Succesful!
//              </div>");
//            // Utility::redirect('../../../../views/SEIPXXXX/User/Profile/signup.php');
//        }
//        else {
//            echo "Error";
//        }

    }



 /* public function view(){
        $query="SELECT * FROM `booking_info` WHERE `users`.`email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':email'=>$this->email));
        $row=$result->fetch(PDO::FETCH_OBJ);
        return $row;
    }// end of view()


    public function validTokenUpdate(){
        $query="UPDATE `users` SET  `email_verified`='".'Yes'."' WHERE `users`.`email` =:email";
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
        return Utility::redirect('../../../../views/PhpCoder/User/Profile/signup.php');
    }

    public function update(){

        $query="UPDATE `users` SET `first_name`=:firstName, `last_name` =:lastName , `gender`, `city`, `country`, `nationality`, `nid_birthcertificate`,  `email` =:email, `phone` = :phone,
 `address` = :address  WHERE `users`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':gender'=>$this->gender, ':city'=>$this->city,':country'=>$this->country,':nationality'=>$this->nationality,':nid_birthcertificate'=>$this->nid_birthcertificate,':email'=>$this->email,':phone'=>$this->phone,
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

}*/


