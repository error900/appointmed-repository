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
		function checkAllA (form2) {
			var aa= document.getElementById('form2');
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

   		$sql = mysqli_query($con, "SELECT * FROM account WHERE account_type='Patient' AND account_status = 'inactive' ") or die(mysqli_error());
   		$sql_doctor = mysqli_query($con, "SELECT * FROM account WHERE account_type='Doctor' AND account_status = 'inactive' ") or die(mysqli_error());
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
			<li><a href="exportall.php">Export</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li><a href="popdoc.php">Add Doctor</a></li>
			<li><a href="remove_user.php">Remove user</a></li>
			<li><a href="notifications.php">Notification</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li class="active"><a href="#">Approve Users</a></li>
		  </ul>
		</div>
		</div>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		  <h1 class="page-header">Approve Users</h1>
		  <table class = "table table-striped">
		  	<h2>Patient</h2>
		  	<form method="post" action="approve_request.php" id="form1">
			 <?php
			 		if(mysqli_num_rows($sql) >=1){
						echo '<thead>';
						echo '<tr>';
						echo '<th>Name</th>';
						echo '<th>Contact #</th>';
						echo '<th>Occupation</th>';
						echo '<th><input type="checkbox" value="Check All" id="checkall" onClick="checkAll(form1)"></th>';
						echo '</tr>';
						echo '</thead>';
				   		while($row = mysqli_fetch_array($sql)){
				   			$username = $row['username'];
				   		
				   			$select_patient = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'");
				   			$fetch_patient = mysqli_fetch_array($select_patient);
				   			echo '<tr>';
				   			echo '<td>' .$fetch_patient['patient_name'].'</td>';
				   			echo '<td>' .$fetch_patient['patient_contact'].'</td>';
				   			echo '<td>' .$fetch_patient['occupation'].'</td>';
				   			echo "<td><input type='checkbox' name='select[]' id='select' value='$row[username]'></td>";
				   			echo '</tr>';
				   		}
				   			echo '<input type="submit" value="Approve" name="submit">';
			   		}else{
			   			echo '<p>No patient account to be activated</p>';
			   		}
			  ?>
			</form>
		</table>
		  <table class = "table table-striped">
		  	<h2>Doctor</h2>
		  	<form method="post" action="doctor_request.php" id="form2">
		  	 <?php
		  	 		if(mysqli_num_rows($sql_doctor) >=1){
						echo '<thead>';
						echo '<tr>';
						echo '<th>Name</th>';
						echo '<th>Specialization</th>';
						echo '<th>Status</th>';
						echo '<th><input type="checkbox" value="Check All" id="checkallA" onClick="checkAllA(form2)"></th>';
						echo '</tr>';
						echo '</thead>';
			   		while($row = mysqli_fetch_array($sql_doctor)){

			   			$username = $row['username'];
			   		
			   			$select_doctor = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'");
			   			$fetch_doctor = mysqli_fetch_array($select_doctor);
			   			echo '<tr>';
			   			echo '<td>' .$fetch_doctor['doctor_name'].'</td>';
			   			echo '<td>' .$fetch_doctor['specialization'].'</td>';
			   			echo '<td>' .$fetch_doctor['doctor_status'].'</td>';
			   			echo "<td><input type='checkbox' name='select[]' id='select' value='$row[username]'></td>";
			   			echo '</tr>';
			   		}
			   			echo '<input type="submit" value="Approve" name="submit">';
			   		}else{
			   			echo '<p>No doctor account to be activated</p>';
			   		}
			  ?>
			</form>
			</table>
	</div>
</body>
</html>