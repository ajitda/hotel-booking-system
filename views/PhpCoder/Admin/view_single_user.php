<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>
<?php
use App\BITM\PhpCoder\User\User;
$objUser = new User();
$objUser->prepare($_GET);
$singleUser = $objUser->view();
?>

<div class="content">
    <div class="header">
        <div class="stats">
            <p class="stat"><span class="label label-info">5</span> Tickets</p>
            <p class="stat"><span class="label label-success">27</span> Tasks</p>
            <p class="stat"><span class="label label-danger">15</span> Overdue</p>
        </div>
        <h1 class="page-title">Dashboard</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li class="active">Dashboard</li>
        </ul>
    </div>
    <div class="main-content">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-12">
                    <div class="one-content" style="padding: 10px;">
                        <?php // var_dump($singleUser); die;?>
                        <h1><?php echo "Name : ". $singleUser->first_name ." ". $singleUser->last_name; ?></h1>
                        <h3><?php echo "Email : ". $singleUser->email; ?></h3>
                        <h3><?php echo "Mobile : ". $singleUser->phone; ?></h3>
                        <h3><?php echo "Address : ". $singleUser->address; ?></h3>
                        <h3><?php echo "Gender : ". $singleUser->gender; ?></h3>
                        <h3><?php echo "City : ". $singleUser->city; ?></h3>
                        <h3><?php echo "Country : ". $singleUser->country; ?></h3>
                        <h3><?php echo "Nationality : ". $singleUser->nationality; ?></h3>
                        <h3><?php echo "NID/Birthcertificate : ". $singleUser->nid_birthcertificate; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php include('admin_footer.php'); ?>
