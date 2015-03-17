<!DOCTYPE html>
<html lang="en">
	<?php
		$title = "Admin | Dashboard";
		include 'include/head.php';
		include '../connectdatabase.php';
				include 'include/scripts.php';
   ?>
<script type="text/javascript">
   		checked=false;
		function checkAll (form1) {
			var aa= document.getElementById('form1');
			if (checked == false){
				checked = true
			} else {
				checked = false
			}
			for (var i =0; i < aa.elements.length; i++){ 
				aa.elements[i].checked = checked;
			}
		}
   </script>
	<?php   
		session_start();
		$loggedIn = $_SESSION['loggedIn'];
		$account_type = $_SESSION['account_type'];
		if($loggedIn == false )
			header("location: index.php");
		else if($account_type != 'Admin')
            header("location: index.php");
        $sql = mysqli_query($con, "SELECT * FROM account WHERE account_status = 'Active' AND username <> 'Admin' ");

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
			<li><a href="dashboard.php">Overview <span class="sr-only">(current)</span></a></li>
			<li><a href="#">Reports</a></li>
			<li><a href="#">Analytics</a></li>
			<li><a href="#">Import</a></li>
			<li><a href="exportall.php">Export</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li><a href="popdoc.php">Add Doctor</a></li>
			<li class="active"><a href="#">Remove user</a></li>
			<li><a href="">Notification</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li><a href="approve.php">Approve Users</a></li>
		  </ul>
		</div>
	</div>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 main">
		<h1 class="page-header">Remove User(s)</h1>
			<table class="table table-striped">
			  <thead>
				<tr>
			      <th>ID</th>
				  <th>Username</th>
				  <th>Name</th>
				  <th>Account Type</th>
				  <th><input type="checkbox" value="Check All" id="checkallA" onClick="checkAll(form1)"></th>
				</tr>
			  </thead>
			  <form method="post" action="removal.php" id="form1">
			<?php
				while($row = mysqli_fetch_array($sql)){
					$username  = $row['username'];
					$result = mysqli_query($con, "SELECT patient_id, patient_name FROM patient WHERE username LIKE '$username' 
						UNION (SELECT doctor_id, doctor_name FROM doctor WHERE username LIKE '$username') 
						UNION (SELECT secretary_id, secretary_name FROM secretary WHERE username LIKE '$username')" );
                    $account=  mysqli_fetch_array($result);
                    echo '<tr>';
                    echo '<td>'.$account['patient_id'].'</td>';
					echo '<td>'.$row['username'].'</td>';
					echo '<td>'.$account['patient_name'].'</td>';
					echo '<td>'.$row['account_type'].'</td>';
					echo "<td><input type='checkbox' name='select[]' id='select' value='$row[username]'></td>";
					echo '</tr>';
				}
			?>
			<input type="submit" name="submit" value="Set as Inactive">
		</form>
	</table>
	</div>
</body>
</html>