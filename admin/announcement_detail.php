<!DOCTYPE html>
<html lang="en">

    <?php
    $title = "Admin | Announcement List";
    include 'include/head.php';
    include '../connectdatabase.php';
    include 'include/scripts.php';  
    ?>
   <script type="text/javascript">
         $(function () {
            $('#datetimepicker1').datetimepicker({
                pickTime: false
            });
            $('#datetimepicker2').datetimepicker({
                pickTime: false
            });
        })
    </script>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: index.php");
    else if ($account_type != 'Admin')
        header("location: index.php");

    $announcement_id = $_GET['id']; 

    $account_sql = mysqli_query($con, "SELECT * FROM account ");

    $a_result = mysqli_query($con, "SELECT * FROM announcement WHERE announcement_id LIKE '$announcement_id'" );
    $a_row =  mysqli_fetch_array($a_result);
    //$account_row = mysqli_fetch_array($account_sql);
    //if (isset($_POST['submitted'])) {
    //print_r($_POST);
    //}
    ?>

    <body class="e4e8e9-bg">
        <?php 
            include 'include/admin-nav.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Edit Announcement</h1> 
                    <div class="input-group announcement-post">
                        <form class="form-input" method="post" action="edit_announcement.php?id=<?php echo $announcement_id?>">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $a_row['subject']?>"> 
                                <div class="col-xs-12 col-md-3 start-date">
                                    <label for="inputDate">Start Date:</label>
                                </div>
                                <div class="col-xs-12 col-md-3 start-date" id="datetimepicker1">
                                    <span class="input-group date">
                                        <input type="text" class="form-control" name="publish" required/>
                                        <i class="fa fa-calendar field-icon"></i>
                                    </span>
                                </div>
                                <div class="col-xs-12 col-md-3 end-date">
                                    <label for="inputDate">End Date:</label>
                                </div>
                                <div class="col-xs-12 col-md-3 end-date" id="datetimepicker2">
                                    <span class="input-group date">
                                        <input type="text" class="form-control" name="end" required/>
                                        <i class="fa fa-calendar field-icon"></i>
                                    </span>
                                </div>
                                <textarea class="form-control" rows="8" name="message" placeholder="Message"><?php echo $a_row['announcement_details']?>
                                </textarea>
                                <div class="post-buttons">
                                    <select name="pick" class="form-control" required/>
                                      <option value="all">All</option>
                                      <option value="doctor">Doctors</option>
                                      <option value="patient">Patients</option>
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-default blue-btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'include/datepicker.php';
        ?>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    </body>
</html>
