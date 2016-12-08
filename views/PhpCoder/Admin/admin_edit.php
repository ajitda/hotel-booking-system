<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>

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
                    <div>
                        <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                            <div  id="message" class="form button"   style="font-size: smaller;" >
                                <center>
                                    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                        echo "&nbsp;".Message::message();
                                    }
                                    Message::message(NULL);
                                    ?></center>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-top">

                        <div class="form-top-left">
                            <h3>Update Admin Details</h3>
                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="admin_update.php" method="post" class="registration-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-first_name">First name</label>
                                <input type="text" name="first_name" value="<?php echo $singleAdmin->first_name; ?>" class="form-first-name form-control" id="form-first-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-last-name">Last name</label>
                                <input type="text" name="last_name" value="<?php echo $singleAdmin->last_name; ?>" class="form-last-name form-control" id="form-last-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Email</label>
                                <input type="text" name="email" value="<?php echo $singleAdmin->email; ?>" class="form-email form-control" id="form-email" disabled>
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-email">Phone</label>
                                <input type="text" name="phone" value="<?php echo $singleAdmin->phone; ?>" class="form-phone form-control" id="form-phone" >
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="address">Address</label>
                                <input type="text" name="address" value="<?php echo $singleAdmin->address; ?>" class="form-address form-control" id="form-address">
                            </div>
                            <button type="submit" class="btn">Update Admin!</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
<?php include('admin_footer.php'); ?>
