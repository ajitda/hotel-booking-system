<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>
<?php
use App\BITM\PhpCoder\BlueOcean\BookingInfo;
use App\BITM\PhpCoder\Utility\Utility;
$room = new BookingInfo();
$allRoom = $room->index("obj");

######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allRoom);
if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;
$pages = ceil($recordCount/$itemsPerPage);
$allRoom = $room->indexPaginator($page,$itemsPerPage);
$serial = (($page-1) * $itemsPerPage) +1;
####################### pagination code block#1 of 2 end #########################################
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
                    <div class="text-center" style="padding: 8px">
                        <a href='create_room.php'><button class='btn btn-info'>Add Room </button></a>
                        <a href='#'><button class='btn btn-info'>Confirmed List</button></a>
                    </div>
                    <?php

                    echo "<table class='table table-bordered table-striped' border='2px'>";
                    echo "<th> Serial </th><th> ID </th> <th> Customer Email </th> <th> Package </th> <th> Check In </th> <th> Check Out </th> <th>Rooms </th> <th> Adults </th> <th>Childrens</th> <th> Persons </th> <th> Price </th><th> Action </th>";
                    foreach($allRoom as $oneData){  ########### Traversing $someData is Required for pagination  #############
                        echo "<tr style='height: 40px'>";
                        echo "<td> $serial</td>";
                        echo "<td> $oneData->id </td>";
                        echo "<td> $oneData->customer_name </td>";
                        echo "<td> $oneData->package_info </td>";
                        echo "<td> $oneData->check_in </td>";
                        echo "<td> $oneData->check_out </td>";
                        echo "<td> $oneData->rooms </td>";
                        echo "<td> $oneData->adult </td>";
                        echo "<td> $oneData->children </td>";
                        echo "<td> $oneData->person </td>";
                        echo "<td> $oneData->price </td>";
                        echo "<td>
            <a href='view.php?id=$oneData->id'><button class='btn btn-info' role='button'>View</button></a>
            <a href='edit.php?id=$oneData->id'><button class='btn btn-info' role='button'>Edit</button></a>
            <a href='trash_booking.php?id=$oneData->id'><button class='btn btn-danger' role='button'>Confirm</button></a>
            <a href='delete_booking.php?id=$oneData->id'><button class='btn btn-danger' role='button'>Delete</button></a>
        </td>";

                        echo "</tr>";
                        $serial++;
                    } //end of foreach loop

                    echo "</table>";
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!--  ######################## pagination code block#2 of 2 start ###################################### -->
    <div align="left" class="container pagination_selection">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <ul class="pagination">
                    <?php
                    $pageMinusOne=$page-1;
                    $pagePlusOne = $page+1;
                    if($page>$pages) Utility::redirect("bookings.php?Page=$pages");
                    if($page>1) echo "<li><a href='bookings.php?Page=$pageMinusOne'>" . "Previous" . '</a></li>';
                    for($i=1;$i<=$pages;$i++)
                    {
                        if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                        else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';
                    }
                    if($page<$pages) echo "<li><a href='bookings.php?Page=$pagePlusOne'>" . "Next" . '</a></li>';
                    ?>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="select_page">
                    <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                        <?php
                        if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                        if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                        else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                        if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                        if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                        if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                        if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                        else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!--  ######################## pagination code block#2 of 2 end ###################################### -->

    <div class="row">
        <div class="col-md-12">
            <a href="pdf.php" class="btn btn-primary" role="button">Download as PDF</a>
            <a href="xl.php" class="btn btn-primary" role="button">Download as XL</a>
            <a href="email.php?list=1" class="btn btn-primary" role="button">Email to friend</a>
        </div>
    </div>



    <?php include('admin_footer.php'); ?>
<!-- required for search, block 5 of 5 start -->
<script type="text/javascript" language="javascript">
    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });

        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
<!-- required for search, block5 of 5 end -->

