<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>
<?php
$oneData = $obj->view();
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
                        <h1><?php echo "Admin Name : ". $oneData->first_name ." ". $oneData->last_name; ?></h1>
                        <h3><?php echo "Email : ". $oneData->email; ?></h3>
                        <h3><?php echo "Mobile : ". $oneData->phone; ?></h3>
                        <h3><?php echo "Address : ". $oneData->address; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('admin_footer.php'); ?>