<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>
<?php
use App\BITM\PhpCoder\Message\Message;
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
            <li class=""><a href="index.php">Dashboard</a></li>
            <li class="active">Create Admin</li>
        </ul>

    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>

            <div class="col-sm-5">

                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div>

                            <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                                <div  id="message" class="form button"   style="font-size: smaller  " >
                                    <center>
                                        <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                            echo "&nbsp;".Message::message();
                                        }
                                        Message::message(NULL);
                                        ?></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-top-left">
                            <h3>Add Room</h3>
                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="room_store.php" method="post" class="registration-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="sr-only" for="form-first_name">Room No:</label>
                                <input type="text" name="room_no" placeholder="Enter your Room No..." class="form-first-name form-control" id="form-first-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-last-name">Type of Room</label>
                                <input type="text" name="room_name" placeholder="Enter Type of Room..." class="form-last-name form-control" id="form-last-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-room-size">Room Size</label>
                                <input type="text" name="room_size" placeholder="Enter Room Size..." class="form-email form-control" id="form-email">
                            </div>

                            <div class="form-group">
                                <label class="" for="form-bed_no">Number of Beds : </label>
                                <input type="radio" name="bed_no" value="1"> 01
                                <input type="radio" name="bed_no" value="2"> 02
                                <input type="radio" name="bed_no" value="3"> 03
                                <input type="radio" name="bed_no" value="4"> 04
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Rate</label>
                                <input type="number" name="rate" placeholder="Enter Room Price..." class="form-phone form-control" id="form-phone">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="address">Description</label>
                                <input type="text" name="description" placeholder="Enter Room Description..." class="form-address form-control" id="form-address">
                            </div>
                            <div class="form-group">
                                <label for="form-author">Select your Room Picuture</label>
                                <input type="file" name="fileUpload"  class="form-author form-control" id="form-author">
                            </div>

                            <button type="submit" class="btn">Create Room!</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php include('admin_footer.php'); ?>
