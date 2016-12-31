<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>
<?php
use App\BITM\PhpCoder\Room\Room;
use App\BITM\PhpCoder\Utility\Utility;
$room = new Room();
$allRoom = $room->index1("obj");
################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) )$allRoom =  $room->search($_REQUEST);
$availableKeywords=$room->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
################## search  block 1 of 5 end ##################

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

################## search  block 2 of 5 start ##################
if(isset($_REQUEST['search']) ) {
    $allRoom = $room->search($_REQUEST);
    $serial = 1;
}
################## search  block 2 of 5 end ##################

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
                        <a href='create_room.php'><button class='btn btn-info'>Add Room </button></a>
                        <a href='trashed_room_list.php'><button class='btn btn-info'>Trash List</button></a>
                    </div>
                    <form id="searchForm" action="view_room.php"  method="get">
                        <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
                        <input type="checkbox"  name="byRoomName"   checked >By Room No
                        <input type="checkbox"  name="byBedNo"  checked>By Bed No
                        <input hidden type="submit" class="btn-primary" value="search">
                    </form>
                    <?php
                    echo "<table class='table table-bordered table-striped' border='5px' >";
                    echo "<th> serial </th>";
                    echo "<th> Id </th>";
                    echo "<th> Room No </th>";
                    echo "<th> Room Name </th>";
                    echo "<th> Room Size </th>";
                    echo "<th> Bed No </th>";
                    echo "<th> Rate </th>";
                    echo "<th> Description </th>";
                    echo "<th> File Path </th>";
                    echo "<th> Action </th>";
                    foreach($allRoom as $oneRoom){      ########### Traversing $someData is Required for pagination  #############
                        echo "<tr style='height: 40px'>";
                        echo "<td>".$serial."</td>";
                        echo "<td> $oneRoom->id </td>";
                        echo "<td>".$oneRoom->room_no ."</td>";
                        echo "<td>".$oneRoom-> room_name."</td>";
                        echo "<td>".$oneRoom->room_size ."</td>";
                        echo "<td>".$oneRoom->bed_no ."</td>";
                        echo "<td>".$oneRoom-> rate."</td>";
                        echo "<td>".$oneRoom->description ."</td>";
                        echo "<td> <img width=\"150\" height=\"100\" src='../../../resource/assets/img/room/".$oneRoom->file_path."'  ></td>";
                        echo "<td>";
                        echo "<a href='room_details.php?id=$oneRoom->id'><button class='btn btn-info'>View</button></a> ";
                        echo "<a href='room_edit.php?id=$oneRoom->id'><button class='btn btn-primary'>Edit</button></a> ";
                        echo "<a href='room_trash.php?id=$oneRoom->id'><button class='btn btn-warning'>Trash</button></a> ";
                        echo "<a href='room_delete.php?id=$oneRoom->id'><button class='btn btn-danger'>Delete</button></a> ";
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
    <!--  ######################## pagination code block#2 of 2 start ###################################### -->
    <div align="left" class="container">
        <ul class="pagination">
            <?php
            $pageMinusOne  = $page-1;
            $pagePlusOne  = $page+1;
            if($page>$pages) Utility::redirect("view_room.php?Page=$pages");
            if($page>1)  echo "<li><a href='view_room.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";
            for($i=1;$i<=$pages;$i++)
            {
                if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';
            }
            if($page<$pages) echo "<li><a href='view_room.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";
            ?>
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
        </ul>
    </div>
    <!--  ######################## pagination code block#2 of 2 end ###################################### -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" >

                <a href="pdf.php" class="btn btn-primary" role="button">Download as PDF</a>
                <a href="xl.php" class="btn btn-primary" role="button">Download as XL</a>
                <a href="email.php?list=1" class="btn btn-primary" role="button">Email to friend</a>

            </div>
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

