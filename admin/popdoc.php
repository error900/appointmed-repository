<!DOCTYPE html>
<html lang="en">
	<?php
		$title = "Admin | Dashboard";
		include 'include/head.php';
		include '../connectdatabase.php';
   ?>

	<?php   
		session_start();
		$loggedIn = $_SESSION['loggedIn'];
		$account_type = $_SESSION['account_type'];
		if($loggedIn == false )
			header("location: index.php");
		else if($account_type != 'Admin')
            header("location: index.php");

    //    $account_sql = mysqli_query($con, "SELECT * FROM account ");
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
		<?php

			$spec = mysqli_query($con, "SELECT * FROM doctor") or die(mysqli_error());
			$row = mysqli_fetch_array($spec);
			$enum_list = explode(",",$row['doctor_status']);
		?>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		  <h1 class="page-header">Add Doctor</h1>
			<form method="post" action="adddoc.php">
				Firstname: <input type="text" name="firstname" required="">
				Lastname: <input type="text" name="lastname" required=""><br/>
				Specialization: <input type="text" name="specialization" required="">
				Doctor Status:
				<select name="select">
				<?php 
				foreach($enum_list as $value)
					echo '<option value='.$value.'>'.$value.'</option>';
				?>
				</select>
				Email: <input type="text" name="email">
				Username: <input type="text" name="username">
				
				<input type="submit" value="Submit" name="submit">
			</form>
		</div>
	</div>
</div>
</body>
</html>