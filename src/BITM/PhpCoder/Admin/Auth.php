<?php
namespace App\BITM\PhpCoder\Admin;
if(!isset($_SESSION) )  session_start();
use App\BITM\PhpCoder\Model\Database as DB;

class Auth extends DB{

    public $email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data = Array()){
        if (array_key_exists('admin_email', $data)) {
            $this->email = $data['admin_email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `admin` WHERE `email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':email'=>$this->email));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `admin` WHERE `email_verified`='" . 'Yes' . "' AND `email`=:email AND `password`=:password";
        $result=$this->conn->prepare($query);
        $result->execute(array(':email'=>$this->email, ':password'=>$this->password));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('admin_email', $_SESSION)) && (!empty($_SESSION['admin_email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['admin_email']="";
        return TRUE;
    }
}

