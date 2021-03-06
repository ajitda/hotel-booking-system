<?php include('header.php');  ?>
<?php
if(!isset($_SESSION) )session_start();
include_once('vendor/autoload.php');
use App\BITM\PhpCoder\User\User;
use App\BITM\PhpCoder\User\Auth;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
use App\BITM\PhpCoder\Room\Room;
$obj= new User();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('views/PhpCoder/User/Profile/signup.php');
    return;
}
$objRoom = new Room();
$objRoom->prepare($_GET);
$oneRoom = $objRoom->view("obj");
//
//$room = new Room();
//$allRoom = $room->index1("obj");
?>

    <div class="box1">
        <div class="col-md-12">

            <div class="booking-form-section">
                <h1>Book Your Room Now</h1>
            <form role="form" action="views/PhpCoder/BlueOcean/Booking/store_booking.php" method="post" class="boooking-form">
                <div class="form-group">
                    <label for="form-customer_name">Customer Email :</label>
                    <input type="email" name= "customer_name" value="<?php echo $_SESSION['email']; ?>" class="form-customer_name form-control" id="form-customer_name" required>
                </div>
                <div class="form-group">
                    <label for="package_info">Room No : </label>
                    <input name="package_info" value="<?php echo $oneRoom->room_no; ?>" id="package_info">

                </div>
                <div class="form-group">
                    <label for="dateField">Check In: </label>
                    <!--Check In <input type="text"  name="check_in"  class="form-check_in form-control" id="datepicker"> -->
                    <input name="check_in" id="dateField" type="date" min="2014-01-01" disabled>
                </div>
                <div class="form-group">
                    <label for="dateField1">Check Out: </label>
                    <!--Check In <input type="text"  name="check_in"  class="form-check_in form-control" id="datepicker"> -->
                    <input name="check_out" id="dateField1" type="date" min="2014-01-01" disabled>
                </div>
                <div class="form-group">
                    <label for="rooms">Rooms : </label>
                    <select name="rooms" id="rooms">
                        <option >1</option>
                        <option >2</option>
                        <option >3</option></select>
                </div>
                <div class="form-group">
                    <label for="adult">Adults : </label>
                    <select name="adult" >
                        <option >1</option>
                        <option >2</option>
                        <option >3</option>
                        <option >4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="children">Childrens : </label>
                     <select name="children" id="children">
                        <option >0</option>
                        <option >1</option>
                        <option >2</option>
                        <option >3</option></select>
                </div>
                <div class="form-group">
                    <label for="person">Persons : </label>
                     <select name="person" id="person">
                        <option >1</option>
                        <option >2</option>
                        <option >3</option></select>
                </div>

                <div class="form-group">
                     <label class="sr-only" for="form-price">Price : </label>
                    <input type="number" name="price" value="<?php echo $oneRoom->rate; ?>" class="form-price form-control" id="form-price">
                </div>
                <button type="submit" class="btn">Book Now</button>
            </form>
            </div>
        </div>

    </div>

<?php include('footer.php'); ?>
<script>
    var input = document.getElementById("dateField");
    var today = new Date();
    var day = today.getDate();
    // Set month to string to add leading 0
    var mon = new String(today.getMonth()+1); //January is 0!
    var yr = today.getFullYear();

    if(mon.length < 2) { mon = "0" + mon; }

    var date = new String( yr + '-' + mon + '-' + day );
    input.disabled = false;
    input.setAttribute('min', date);

</script>
<script>
    var input = document.getElementById("dateField1");
    var today = new Date();
    var day = today.getDate();
    // Set month to string to add leading 0
    var mon = new String(today.getMonth()+1); //January is 0!
    var yr = today.getFullYear();

    if(mon.length < 2) { mon = "0" + mon; }

    var date = new String( yr + '-' + mon + '-' + day );

    input.disabled = false;
    input.setAttribute('min', date);
</script>
