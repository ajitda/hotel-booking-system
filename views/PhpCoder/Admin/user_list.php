<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>
<?php
use App\BITM\PhpCoder\User\User;
$objUser = new User();
$allUserData = $objUser->viewAllUser("obj");
$serial = 1;
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
                    <?php
                    echo "<table class='table table-bordered table-striped' border='5px' >";
                    echo "<th> serial </th>";
                    echo "<th> ID </th>";
                    echo "<th> Full Name </th>";
                    echo "<th> Email </th>";
                    echo "<th> Phone </th>";
                    echo "<th> Address </th>";
                    echo "<th> Gender </th>";
                    echo "<th> Nationality </th>";
                    echo "<th> Action </th>";
                    foreach($allUserData as $oneData){      ########### Traversing $someData is Required for pagination  #############
                        echo "<tr style='height: 40px'>";
                        echo "<td>".$serial."</td>";
                        echo "<td>".$oneData->id ."</td>";
                        echo "<td>".$oneData->first_name ." ".$oneData->last_name."</td>";
                        echo "<td>".$oneData->email ."</td>";
                        echo "<td>".$oneData->phone ."</td>";
                        echo "<td>".$oneData->address ."</td>";
                        echo "<td>".$oneData->gender ."</td>";
                        echo "<td>".$oneData->nationality ."</td>";
                        echo "<td>";
                        echo "<a href='view_single_user.php?email=$oneData->email'><button class='btn btn-info'>View</button></a> ";
                        echo "<a href='delete_user.php?id=$oneData->id'><button class='btn btn-primary'>Delete</button></a> ";
                        echo "<a href=''><button class='btn btn-primary'>Email</button></a> ";
                        echo "</td>";
                        echo "</tr>";
                        $serial++;
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
</div>
<?php include('admin_footer.php'); ?>
