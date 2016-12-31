<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
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
    Utility::redirect('Profile/signup.php');
    return;
}
?>


<!DOCTYPE html>
<html>
<head>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../resource/assets/css/style.css">
</head>

<body>

<div class="container">

    <table align="center">
        <tr>
            <td height="100" >

                <div id="message" >

                    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                        echo "&nbsp;".Message::message();
                    }
                    Message::message(NULL);

                    ?>
                </div>

            </td>
        </tr>
    </table>


    <header class="tab-content">
        <h1>Hello <?php echo "$singleUser->first_name $singleUser->last_name"?>! </h1>
    </header>

    <nav>
        <ul>
            <li> <a href= "Authentication/logout.php" > LOGOUT </a></li>
        </ul>
    </nav>

    <div class="container">
        <table border="1">

            <tr>
                <td> First Name </td>
                <td> Last Name </td>
                <td> Gender </td>
                <td> City </td>
                <td> Country </td>
                <td> Nationality </td>
                <td> Nid/Birthcertificate </td>
                <td> Email </td>
                <td> Phone </td>
                <td> Address </td>

            </tr>

            <tr>
                <td><?echo $singleUser->first_name?></td>
                <td><?echo $singleUser->last_name?></td>
                <td><?echo $singleUser->gender?></td>
                <td><?echo $singleUser->city?></td>
                <td><?echo $singleUser->country?></td>
                <td><?echo $singleUser->nationality?></td>
                <td><?echo $singleUser->nid_birthcertificate?></td>
                <td><?echo $singleUser->email?></td>
                <td><?echo $singleUser->phone?></td>
                <td><?echo $singleUser->address?></td>

            </tr>

            <form action="../../PhpCoder/BlueOcean/Booking/create_booking.php" method="post">
                <button type="submit" class="btn"> Make your Reservation</button>

    </div>
</div>




<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>

</html>
