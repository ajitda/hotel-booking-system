<?php
include_once('vendor/autoload.php');
use App\BITM\PhpCoder\Room\Room;

$room = new Room();
$allRoom = $room->index1("obj");
?>
<?php include('header.php');  ?>
<div class="box1">
    <div class="col-md-12">
        <h3 class="page-title">All Rooms <a href="create_room.php">Create Room</a> </h3>
        <?php
        $serial=1;
        foreach($allRoom as $oneRoom){      ########### Traversing $someData is Required for pagination  #############
            echo "<div class='single-room'>";
            echo "<div class='room-img'><img width=\"100%\" height=\"auto\" src='resource/assets/img/room/".$oneRoom->file_path."'  ></div>";
            echo "<div class='room_info'>";
            echo "<div class='room-no'>Room No : ".$oneRoom->room_no ."</div>";
            echo "<div class='room-title'>Type : ".$oneRoom->room_name."</div>";
            echo "<p>Size : ".$oneRoom->room_size ."</p>";
            echo "<p>Number of Beds : ".$oneRoom->bed_no ."</p>";
            echo "<p>Rate : ".$oneRoom-> rate."</p>";
            echo "<div class='room-desc'> Description : ".$oneRoom->description ."</div>";
            echo "<div>";
            echo "<a href='room_details.php?id=$oneRoom->id'><button class='btn btn-info'>View</button></a> ";
            echo "<a href='room_edit.php?id=$oneRoom->id'><button class='btn btn-primary'>Book Now</button></a> ";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div style='clear:both'></div>";
            $serial++;
        }
        ?>
    </div>

</div>
<?php include('footer.php'); ?>