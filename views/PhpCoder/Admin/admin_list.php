<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>
<?php
$allData = $obj->index1("obj");
$serial = 1;
?>
<div class="content">
    <div class="header">
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
                    <div class="text-center" style="padding: 8px">
                        <a href='admin_list.php'><button class='btn btn-info'>Admin List</button></a>
                        <a href='create_admin.php'><button class='btn btn-info'>Create Admin</button></a>
                    </div>
                <?php
                $serial=1;
                echo "<table class='table table-bordered table-striped' border='5px' >";
                echo "<th> serial </th>";
                echo "<th> ID </th>";
                echo "<th> First Name </th>";
                echo "<th> Last Name </th>";
                echo "<th> Email </th>";
                echo "<th> Action </th>";
                foreach($allData as $oneData){      ########### Traversing $someData is Required for pagination  #############
                    echo "<tr style='height: 40px'>";
                    echo "<td>".$serial."</td>";
                    echo "<td>".$oneData->id ."</td>";
                    echo "<td>".$oneData->first_name ."</td>";
                    echo "<td>".$oneData->last_name ."</td>";
                    echo "<td>".$oneData->email ."</td>";
                    echo "<td>";
                    echo "<a href='view_admin.php?email=$oneData->email'><button class='btn btn-info'>View</button></a> ";
                    echo "<a href='admin_edit.php?email=$oneData->email'><button class='btn btn-primary'>Edit</button></a> ";
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
</div>
       <?php include('admin_footer.php'); ?>