<?php
namespace App\BITM\PhpCoder\Room;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
use App\BITM\PhpCoder\Model\Database as DB;
use PDO;


class Room extends DB{
    //public $table="admin";
    public $id="";
    public $roomNo="";
    public $roomName="";
    public $roomSize="";
    public $bedNo="";
    public $rate="";
    public $description="";
    public $file_path="";


    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){

        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('room_no',$data)){
            $this->roomNo=$data['room_no'];
        }
        if(array_key_exists('room_name',$data)){
            $this->roomName=$data['room_name'];
        }
        if(array_key_exists('room_size',$data)){
            $this->roomSize=$data['room_size'];
        }
        if(array_key_exists('bed_no',$data)){
            $this->bedNo=$data['bed_no'];
        }
        if(array_key_exists('rate',$data)){
            $this->rate=$data['rate'];
        }
        if(array_key_exists('description',$data)){
            $this->description=$data['description'];
        }
        if (array_key_exists('file_path', $data)) {

            $this->file_path = $data['file_path'];
        }

        return $this;
    }


    public function store()
    {
        $arrData = array($this->roomNo,$this->roomName, $this->roomSize, $this->bedNo,$this->rate,$this->description, $this->file_path);
        $query = "Insert INTO room (room_no, room_name, room_size, bed_no, rate, description, file_path) VALUES (?,?,?,?,?,?,?)";

        $result = $this->conn->prepare($query);

        $result->execute($arrData);
        if($result)
            Message::setMessage("Success ! Data has been inserted Successfully :)");
        else
            Message::setMessage("Failed ! Data has not been inserted Successfully ):");
        Utility::redirect('view_room.php');

    }



    //crud
    public function index1($fetchMode = 'ASSOC')
    {
        $STH = $this->conn->query("SELECT * from room WHERE is_deleted='No'");
        $fetchMode = strtoupper($fetchMode);
        if (substr_count($fetchMode, 'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();
        return $arrAllData;
    }//end of view admin


    public function view(){
        $query="SELECT * FROM `room` WHERE `id` =:id";
        $result=$this->conn->prepare($query);
        $result->execute(array(':id'=>$this->id));
        $row=$result->fetch(PDO::FETCH_OBJ);
        return $row;
    }// end of view()



    public function update(){

        if(!empty($this->file_path)) {
            $arrData = array($this->roomNo,$this->roomName,$this->roomSize,$this->bedNo,$this->rate,$this->description, $this->file_path);
            $sql = "UPDATE room set room_no=?, room_name=?,room_size=?,bed_no=?, rate=?, description=?, file_path=? WHERE id=" . $this->id;
        }else
        {
            $arrData = array($this->roomNo,$this->roomName,$this->roomSize,$this->bedNo,$this->rate,$this->description);
            $sql = "UPDATE room set room_no=?, room_name=?,room_size=?,bed_no=?, rate=?, description=? WHERE id=" . $this->id;

        }

        $STH = $this->conn->prepare($sql);
        $STH->execute($arrData);
        Utility::redirect('view_room.php');
    }
    public function delete(){
        $sql='DELETE FROM room WHERE id ='.$this->id;
        $STH = $this->conn->prepare($sql);
        $STH->execute();
        Utility::redirect('view_room.php');
    }
    public function trash($fetchMode ='ASSOC'){
        $query = "UPDATE room SET is_deleted=NOW() Where id=".$this->id;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        Utility::redirect('view_room.php');
    }
    public function trashed($fetchMode='ASSOC'){
        $sql = "SELECT * from room where is_deleted <> 'No' ";
        $STH = $this->conn->query($sql);
        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData  = $STH->fetchAll();
        return $arrAllData;
    }

    public function recover(){
        $sql = "Update room SET is_deleted='No' where id=".$this->id;
        $STH = $this->conn->prepare($sql);
        $STH->execute();
        Utility::redirect('trashed.php');
    }// end of recover();

    public function indexPaginator($page=0,$itemsPerPage=3){
        $start = (($page-1) * $itemsPerPage);
        $sql = "SELECT * from room  WHERE is_deleted = 'No' LIMIT $start,$itemsPerPage";
        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator();
    public function trashedPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);
        $sql = "SELECT * from room  WHERE is_deleted <> 'No' LIMIT $start,$itemsPerPage";

        $STH = $this->conn->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }// end of trashedPaginator();

    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byRoomName']) && isset($requestArray['byBedNo']) )  $sql = "SELECT * FROM `room` WHERE `is_deleted` ='No' AND (`room_name` LIKE '%".$requestArray['search']."%' OR `bed_no` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byRoomName']) && !isset($requestArray['byBedNo']) ) $sql = "SELECT * FROM `room` WHERE `is_deleted` ='No' AND `room_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byRoomName']) && isset($requestArray['byBedNo']) )  $sql = "SELECT * FROM `room` WHERE `is_deleted` ='No' AND `bed_no` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }// end of search()

    public function getAllKeywords()
    {
        $_allKeywords = array();
//        $WordsArr = array();
        $sql = "SELECT * FROM `room` WHERE `is_deleted` ='No'";

        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        // for each search field block start
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->room_name);
        }

        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $eachString= strip_tags($oneData->room_name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end

        // for each search field block start
        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->bed_no);
        }
        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->bed_no);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end
        return array_unique($_allKeywords);
    }// get all keywords


}

