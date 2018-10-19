<?php
namespace App\BITM\PhpCoder\Model;

use PDO;
use PDOException;


class Database{
   public $conn;


    public $username="root";
    public $password="";
   public $host = 'localhost';
   public $db_name = 'phpcoder_finalproject_b35';
    
    public function __construct()
    {
        try {

            # MySQL with PDO_MYSQL
            $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $this->username, $this->password);

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

