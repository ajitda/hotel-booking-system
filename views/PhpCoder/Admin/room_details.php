<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>
<?php
use App\BITM\PhpCoder\Room\Room;
$objRoom=new Room();
$objRoom->prepare($_GET);
$singleRoom=$objRoom->view();
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
                <div class="col-md-6">
                `<table class="table table-bordered table-striped">
                    <?php
                    echo "<tr>"."<th>Room No: </th>"."<td>".$singleRoom->room_no."</td>"."</tr>";
                    echo "<tr>"."<th>Room Name: </th>"."<td>".$singleRoom->room_name."</td>"."</tr>";
                    echo "<tr>"."<th>Room Size: </th>"."<td>".$singleRoom->room_size."</td>"."</tr>";
                    echo "<tr>"."<th>Number of Bed: </th>"."<td>".$singleRoom->bed_no."</td>"."</tr>";
                    echo "<tr>"."<th>Rate: </th>"."<td>".$singleRoom->rate."</td>"."</tr>";
                    echo "<tr>"."<th>Description: </th>"."<td>".$singleRoom->description."</td>"."</tr>";
                    echo "<tr>"."<th>Room Image: </th>"."<td>"."<img src='../../../resource/assets/img/room/".$singleRoom->file_path."'></td>"."</tr>";
                    ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include('admin_footer.php'); ?>