<?php

namespace App\BlueOcean;

use App\Message\Message;
use App\Model\Database as DB;
use App\Utility\Utility;
use PDO;



class Admin extends DB
{

    public $id = "";
    public $admin_name = "";
    public $admin_password = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data = NULL)
    {

        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        if (array_key_exists('admin_name', $data)) {
            $this->admin_name = $data['admin_name'];
        }

        if (array_key_exists('admin_password', $data)) {
            $this->admin_password = $data['admin_password'];
        }

    }
/*
    public function store()
    {
        $arrData = array($this->book_title, $this->author_name);
        $sql = "INSERT INTO book_title (book_name,author_name) VALUES (?,?)";
        $STH = $this->DBH->prepare($sql);
        $result = $STH->execute($arrData);

        if ($result)
            Message::message("Data Has Been Inserted Successfully :)");
        else
            Message::message("Failed! Data Has Not Been Inserted Successfully :(");

        Utility::redirect('create.php');
    }

    public function index1($fetchMode = 'ASSOC')
    {


        $STH = $this->DBH->query("SELECT * from book_title WHERE is_delete='No'");

        $fetchMode = strtoupper($fetchMode);
        if (substr_count($fetchMode, 'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData = $STH->fetchAll();
        return $arrAllData;

    }

    public function view($fetchMode = 'ASSOC')
    {

        $STH = $this->DBH->query('SELECT * from book_title WHERE id=' . $this->id);
        //echo $STH;

        $fetchMode = strtoupper($fetchMode);
        if (substr_count($fetchMode, 'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrOneData = $STH->fetch();
        return $arrOneData;

    }

    public function update()
    {

        $arrData = array($this->book_title, $this->author_name);
        $sql = "UPDATE book_title SET book_name=?, author_name=? WHERE id=" . $this->id;//UPDATE `atomic_project_b35`.`book_title` SET `book_name` = 'b1' WHERE `book_title`.`id` = 2
        $STH = $this->DBH->prepare($sql);
        $STH->execute($arrData);
        Utility::redirect('index.php');
    }

    public function delete()
    {

        $sql = "DELETE FROM book_title  WHERE id=" . $this->id;//UPDATE `atomic_project_b35`.`book_title` SET `book_name` = 'b1' WHERE `book_title`.`id` = 2
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
        Utility::redirect('index.php');
    }

    public function trash()
    {


        $sql = "UPDATE book_title SET is_delete=NOW() WHERE id=" . $this->id;//UPDATE `atomic_project_b35`.`book_title` SET `book_name` = 'b1' WHERE `book_title`.`id` = 2
        $STH = $this->DBH->prepare($sql);
        $STH->execute();
       Utility::redirect('index.php');


    }
*/

}

