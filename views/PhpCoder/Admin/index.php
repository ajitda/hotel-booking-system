<?php include('admin_header.php'); ?>
<?php include('admin_sidebar.php'); ?>

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
        <a href="#page-stats" class="panel-heading" data-toggle="collapse">Latest Stats</a>
        <div id="page-stats" class="panel-collapse panel-body collapse in">

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="knob-container">
                        <input class="knob" data-width="200" data-min="0" data-max="3000" data-displayPrevious="true" value="2500" data-fgColor="#92A3C2" data-readOnly=true;>
                        <h3 class="text-muted text-center">Accounts</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="knob-container">
                        <input class="knob" data-width="200" data-min="0" data-max="4500" data-displayPrevious="true" value="3299" data-fgColor="#92A3C2" data-readOnly=true;>
                        <h3 class="text-muted text-center">Subscribers</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="knob-container">
                        <input class="knob" data-width="200" data-min="0" data-max="2700" data-displayPrevious="true" value="1840" data-fgColor="#92A3C2" data-readOnly=true;>
                        <h3 class="text-muted text-center">Pending</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="knob-container">
                        <input class="knob" data-width="200" data-min="0" data-max="15000" data-displayPrevious="true" value="10067" data-fgColor="#92A3C2" data-readOnly=true;>
                        <h3 class="text-muted text-center">Completed</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
<?php include('admin_footer.php'); ?>

