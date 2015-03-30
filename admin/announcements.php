<!DOCTYPE html>
<html lang="en">


	<?php
		$title = "Admin | Announcements";
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

        $account_sql = mysqli_query($con, "SELECT * FROM account ");
    //    $account_row = mysqli_fetch_array($account_sql);

/*
        if (isset($_POST['submitted'])){
   			 print_r($_POST);
		}	
*/
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
		  <ul class="nav navbar-nav navbar-right nav-pills">
			<li><a href="#">Announcements</a></li>
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
			<li ><a href="#">Overview </a></li>
			<li><a href="#">Reports</a></li>
			<li class="active"><a href="#">Announcements <span class="sr-only">(current)</span></a></li>
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
		  

		  <h1 class="page-header">Announcements </h1> 
				<br>

			  </tbody>



		<div class="form-group">

		        <div class="col-sm-10">
		            <textarea class="form-control" rows="8" name="message" ></textarea>
		            <button type="button" name="postButton" class="btn" style="float: right;">Post Info</button>
		            <button type="button" name="cancelButton" class="btn btn-primary" style="float:right;">cancel</button>
		        </div>
		</div>

			</table>
		  </div>
		</div>
	  </div>
	</div>


<script language="JavaScript">
function setVisibility(id, visibility) {
document.getElementById(id).style.display = visibility;
}
</script>



	<?php
		include 'include/scripts.php';

		/**<div class="container">
	<textarea class="textArea" rows="8"></textarea>
	</div>
<button onclick="addTextArea()">create Announcement</button>
			
					<form class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						<div id="div_quotes"></div>
						<button class="createAnnouncements">Post Info</button>
				
					</form>

<script type="text/javascript">
        function addTextArea(){

            var div = document.getElementById('div_quotes');
            div.innerHTML += "<textarea name='' />";
            div.innerHTML += "\n<br />";
        }
    </script>*/
	?>
  </body>

</html>


