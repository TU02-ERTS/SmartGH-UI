<?php require_once("prologue.php"); ?>

    <title>IIT-B Smart Greenhouse | Dashboard</title>
</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="/gh"><b>IIT Bombay Smart Greenhouse</b></a>
            </div>
            <!-- /.navbar-header -->
        </nav>
        <!-- /.navbar-static-top -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Dashboard</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-caret-square-o-right fa-fw"></i> Camera Feed
                            <div class="pull-right">
                                <div class="btn-toolbar">
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-default"><a id="pause-video-menu-item"><i class="fa fa-pause fa-fw"></i></a></button>
                                        <button type="button" class="btn btn-default"><a id="capture-video-menu-item"><i class="fa fa-camera fa-fw"></i></a></button>
                                    </div>
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-default"><a id="prev-camera-menu-item"><i class="fa fa-chevron-left fa-fw"></i></a></button>
                                        <button type="button" class="btn btn-default"><a id="camera-grid-menu-item"><i class="fa fa-th-large fa-fw"></i></a></button>
                                        <button type="button" class="btn btn-default"><a id="next-camera-menu-item"><i class="fa fa-chevron-right fa-fw"></i></a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <img id="video-feed-area"></img>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 .col-md-6 -->
                <div class="col-lg-5 col-md-6 col-sm-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Sensor Readings
                            <div class="pull-right">
                                <div class="btn-group btn-group-xs">
                                    <button type="button" class="btn btn-default"><a id="pause-sensors-menu-item"><i class="fa fa-pause fa-fw"></i></a></button>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="row">
                                        <div class="col-sm-2 col-xs-3"><strong>T<sub>0</sub></strong></div>
                                        <div class="col-sm-10 col-xs-9">
                                            <div id="current-t0-progress" class="progress progress-striped active">
                                                <div class="progress-bar" role="progressbar" aria-valuemin="5" aria-valuemax="50">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 col-xs-3"><strong>L<sub>0</sub></strong></div>
                                        <div class="col-sm-10 col-xs-9">
                                            <div id="current-l0-progress" class="progress progress-striped active">
                                                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 col-xs-3"><strong>RH<sub>0</sub></strong></div>
                                        <div class="col-sm-10 col-xs-9">
                                            <div id="current-h0-progress" class="progress progress-striped active">
                                                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="row">
                                        <div class="col-sm-2 col-xs-3"><strong>T<sub>1</sub></strong></div>
                                        <div class="col-sm-10 col-xs-9">
                                            <div id="current-t1-progress" class="progress progress-striped active">
                                                <div class="progress-bar" role="progressbar" aria-valuemin="5" aria-valuemax="50">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 col-xs-3"><strong>L<sub>1</sub></strong></div>
                                        <div class="col-sm-10 col-xs-9">
                                            <div id="current-l1-progress" class="progress progress-striped active">
                                                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 col-xs-3"><strong>RH<sub>1</sub></strong></div>
                                        <div class="col-sm-10 col-xs-9">
                                            <div id="current-h1-progress" class="progress progress-striped active">
                                                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
			    <div class="table-responsive">
				<table id="sensor-readings-table" class="table table-bordered table-hover table-striped table-condensed">
				    <thead>
					<tr>
					    <th rowspan="2">Reading<br>Timestamp</th>
					    <th colspan="3">RPi 0 - Master</th>
					    <th colspan="3">RPi 1 - Slave 1</th>
					</tr>
                                        <tr>
                                            <th>T &deg;C</th>
                                            <th>L %</th>
                                            <th>RH %</th>
                                            <th>T &deg;C</th>
                                            <th>L %</th>
                                            <th>RH %</th>
                                        </tr>
				    </thead>
				    <tbody>
				    </tbody>
				</table>
			    </div>
			    <!-- /.table-responsive -->
			</div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-5 .col-md-7 -->
                <div class="col-lg-3 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-3 .col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php require_once("epilogue.php"); ?>
    
    <script src="js/sb-admin.js"></script>
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
