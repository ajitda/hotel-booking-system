<?php
namespace App\BITM\PhpCoder\BlueOcean;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
use App\BITM\PhpCoder\Model\Database as DB;
use PDO;

class BookingInfo extends DB
{
    public $table = "booking_info";
    public $customerName = "";
    public $packageInfo = "";
    public $checkIn = "";
    public $checkOut = "";
    public $rooms = "";
    public $adult = "";
    public $children = "";
    public $person = "";
    public $price = "";
    public $id = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data = array())
    {
        if (array_key_exists('customer_name', $data)) {
            $this->customerName = $data['customer_name'];
        }

        if (array_key_exists('package_info', $data)) {
            $this->packageInfo = $data['package_info'];
        }
        if (array_key_exists('check_in', $data)) {
            $this->checkIn = $data['check_in'];
        }
        if (array_key_exists('check_out', $data)) {
            $this->checkOut = $data['check_out'];
        }
        if (array_key_exists('rooms', $data)) {
            $this->rooms = $data['rooms'];
        }
        if (array_key_exists('adult', $data)) {
            $this->adult = $data['adult'];
        }
        if (array_key_exists('children', $data)) {
            $this->children = $data['children'];
        }
        if (array_key_exists('person', $data)) {
            $this->person = $data['person'];
        }
        if (array_key_exists('price', $data)) {
            $this->price = $data['price'];
        }
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        return $this;
    }


    public function store()
    {

//        var_dump($this);
//        die();

        $query = "INSERT INTO `booking_info`(`customer_name`, `package_info`, `check_in`, `check_out`, `rooms`, `adult`, `children`, `person`, `price`)
VALUES (:customerName, :packageInfo, :checkIn, :checkOut, :rooms, :adult, :children, :person, :price)";

        $result = $this->conn->prepare($query);

        $result->execute(array(':customerName' => $this->customerName, ':packageInfo' => $this->packageInfo, ':checkIn' => $this->checkIn, ':checkOut' => $this->checkOut, ':rooms' => $this->rooms, ':adult' => $this->adult, ':children' => $this->children, ':person' => $this->person, ':price' => $this->price));

        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully.
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

    public function view($fetchMode = 'ASSOC')
    {

        $STH = $this->conn->query('SELECT * from `booking_info` where id='.$this->id);

        $fetchMode = strtoupper($fetchMode);
        if (substr_count($fetchMode, 'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrOneData = $STH->fetch();
        return $arrOneData;
    }

        public function index($fetchMode = 'ASSOC')
        {
            $query = "SELECT * from `booking_info` where is_deleted = 'No'";

            $STH = $this->conn->query($query);

            $fetchMode = strtoupper($fetchMode);
            if (substr_count($fetchMode, 'OBJ') > 0)
                $STH->setFetchMode(PDO::FETCH_OBJ);
            else
                $STH->setFetchMode(PDO::FETCH_ASSOC);

            $arrOneData = $STH->fetchAll();
            return $arrOneData;

        }



    public function indexPaginator($page=1,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from `booking_info`  WHERE is_deleted = 'No' LIMIT $start,$itemsPerPage";

        $STH = $this->conn->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator();

    public function confirm(){

        $sql = "Update `booking_info` SET is_deleted=NOW() where id=".$this->id;
        $STH = $this->conn->prepare($sql);
        $STH->execute();
        Utility::redirect('index_booking.php');


    }// end of trash()


    public function delete(){
        $sql='DELETE FROM booking_info WHERE id = '.$this->id;
        $STH = $this->conn->prepare($sql);
        $result = $STH->execute();
        Utility::redirect('bookings.php');
    }//end of delete




    }

?>
