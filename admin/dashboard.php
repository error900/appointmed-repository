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
			header("location: admin/index.php");
		else if($account_type != 'Admin')
            header("location: admin/index.php");

        $account_sql = mysqli_query($con, "SELECT * FROM account");
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
			<li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
			<li><a href="#">Reports</a></li>
			<li><a href="#">Analytics</a></li>
			<li><a href="#">Import</a></li>
			<li><a href="#">Export</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li><a href="">Add user</a></li>
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
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		  <h1 class="page-header">Dashboard</h1>

		  <div class="row placeholders">
			<div class="col-xs-6 col-sm-3 placeholder">
			  <img data-src="holder.js/128x128/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
			  <h4>Label</h4>
			  <span class="text-muted">Something else</span>
			</div>
			<div class="col-xs-6 col-sm-3 placeholder">
			  <img data-src="holder.js/128x128/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
			  <h4>Label</h4>
			  <span class="text-muted">Something else</span>
			</div>
			<div class="col-xs-6 col-sm-3 placeholder">
			  <img data-src="holder.js/128x128/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
			  <h4>Label</h4>
			  <span class="text-muted">Something else</span>
			</div>
			<div class="col-xs-6 col-sm-3 placeholder">
			  <img data-src="holder.js/128x128/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
			  <h4>Label</h4>
			  <span class="text-muted">Something else</span>
			</div>
		  </div>

		  <h2 class="sub-header">Section title</h2>
		  <div class="table-responsive">
			<table class="table table-striped">
			  <thead>
				<tr>
			      <th>ID</th>
				  <th>Username</th>
				  <th>Name</th>
				  <th>Email</th>
				  <th>Account Status</th>
				</tr>
			  </thead>
			  <tbody>
				<?php 
				while($row = mysqli_fetch_array($account_sql)){
					$username  = $row['username'];
					$d_result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'" );
                    $doc =  mysqli_fetch_array($d_result);
					echo '<tr>';
					echo '<td>'.$row['username'].'</td>';
					echo '<td>'.$row['account_type'].'</td>';
					echo '<td>'.$row['account_type'].'</td>';
					echo '<td>'.$row['account_type'].'</td>';
					echo '<td>'.$row['account_status'].'</td>';
					echo '<tr>';
					 }
				?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>



	<?php
		include 'include/scripts.php';
	?>

  </body>
</html>