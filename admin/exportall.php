<!DOCTYPE html>
<html lang="en">
	<?php
		$title = "Admin | Dashboard";
		include 'include/head.php';
		include '../connectdatabase.php';
		include 'include/scripts.php';
   ?>

	<?php   
		session_start();
		$loggedIn = $_SESSION['loggedIn'];
		$account_type = $_SESSION['account_type'];
		if($loggedIn == false )
			header("location: index.php");
		else if($account_type != 'Admin')
            header("location: index.php");

        $account_sql = mysqli_query($con, "SELECT * FROM account ");
    //    $account_row = mysqli_fetch_array($account_sql);

      ?>


	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">BenguetLabs</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#">Dashboard</a></li>
			<div class="btn-group navbar-right signedin">
                <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    admin
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
	                <li><a href="#">Profile</a></li>
	                <li><a href="#">Settings</a></li>
	                <li><a href="#">Help</a></li>
	                <li class="divider"></li>
	                <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
                </ul>
            </div>
		  </ul>
		</div>
	  </div>
	</nav>

	<div class="container-fluid">
	  <div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
		  <ul class="nav nav-sidebar">
			<li><a href="dashboard.php">Overview <span class="sr-only">(current)</span></a></li>
			<li><a href="#">Reports</a></li>
			<li><a href="#">Analytics</a></li>
			<li><a href="#">Import</a></li>
			<li class="active"><a href="#">Export</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li><a href="popdoc.php">Add Doctor</a></li>
			<li><a href="remove_user.php">Remove user</a></li>
			<li><a href="notifications.php">Notification</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li><a href="approve.php">Approve Users</a></li>
		  </ul>
		</div>
	</div>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 main">
	<h1 class="page-header">Export</h1>
	<form method="post" action="export_to_file.php">
		<input type="submit" name="export" value="Export Users List">
	</form>
</body>
</html>