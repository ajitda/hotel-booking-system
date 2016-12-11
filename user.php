<?php
if(!isset($_SESSION) )session_start();
include_once('vendor/autoload.php');
use App\BITM\PhpCoder\User\User;
use App\BITM\PhpCoder\User\Auth;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;

$obj= new User();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('views/PhpCoder/User/Profile/signup.php');
    return;
}
?>
<?php include('header.php');  ?>
    <div class="box1">
        <div class="col-md-12">

            <h2>Hello <?php echo "$singleUser->first_name $singleUser->last_name"?>! <span class="logout"> <a href= "views/PhpCoder/User/Authentication/logout.php" > LOGOUT </a></span></h2>
             <?php echo Message::getMessage(); ?>
        </div>

    </div>
    <script type="text/javascript">

        $(function(){
            setTimeout(function(){
                $("#almessage").fadeOut('Slow')
            }, 5000);
        });

    </script>
<?php include('footer.php'); ?>