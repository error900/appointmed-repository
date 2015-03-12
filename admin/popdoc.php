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
		  <a class="navbar-brand" href="#">appoint.med</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="dashboard.php">Dashboard</a></li>
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
			<li ><a href="dashboard.php">Overview <span class="sr-only">(current)</span></a></li>
			<li><a href="#">Reports</a></li>
			<li><a href="#">Analytics</a></li>
			<li><a href="#">Import</a></li>
			<li><a href="#">Export</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li class="active"><a href="popdoc.php">Add Doctor</a></li>
			<li><a href="">Remove user</a></li>
			<li><a href="">Notification</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li><a href="">Nav item</a></li>
			<li><a href="">Nav item again</a></li>
			<li><a href="">One more nav</a></li>
			<li><a href="">Another nav item</a></li>
			<li><a href="">More navigation</a></li>
		  </ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 main">
			<h1 class="page-header">Add Doctor</h1>
			<div class="add-form">
				<form method="post" action="adddoc.php">
					<div class="input-group">
						<input type="text" class="form-control" name="firstname" placeholder="Firstname" required="">
						<input type="text" class="form-control" name="lastname" placeholder="Lastname" required=""><br/>
						<input type="text" class="form-control" name="specialization" placeholder="Specialization" required="">
						<label>Doctor Status:</label>
						<select name="status" class="form-control">
							echo '<option value="In">In</option>';
							echo '<option value="Emergency">Emergency</option>';
							echo '<option value="On Leave">On Leave</option>';
							echo '<option value="Out">Out</option>';
							echo '<option value="Sick Leave">Sick Leave</option>';
						</select>
						<input type="email" class="form-control" name="email" placeholder="Email" required="">   
						<input type="text" class="form-control" name="username" placeholder="Username" required="" id="username">

						<input type="submit" class="btn btn-default login-btn" value="Submit" name="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>