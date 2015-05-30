<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Help";
    include 'include/head.php';
    include '../connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: ../admin/index.php");
    else if ($account_type != 'FrontDesk')
        header("location: ../admin/index.php");

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule WHERE doctor_status = 'In' ORDER BY doctor_name");

    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
             include 'include/fd-nav-start.php';
            ?>
                <ul class="nav navbar-nav">
                    <li class="tooltip-bottom" data-tooltip="Online Doctors">
                        <a href="index.php"><i class="fa fa-users fa-lg"></i>On Deck</a>
                    </li>
                <?php
                include 'include/fd-nav-end.php';
                ?>
                <div class="row">
                    <h2 class="row-header text-center">Help</h2>
                   </br>
                    <h4>Doctors Available</h4>
                    <p>This account is for the fontdesk. The frontdesk personnel can view the available doctors for the day. This will be the guide 
                    of the personnel if the there is a doctor if a  patient is looking for a specific doctor or specific specialization of a doctor. 
                    This is also used for walk in patients who are not yet informed about the sytem and has no account yet.</p>
                   </br>
                    <h4>Find your Doctor</h4>
                    <p>Type name of doctor or specialization in search bar above.</p>
                    <p>Choose and click on the name of your doctor in the result/s shown below the search bar and it will redirect you to the list of the search result. 
                        there is a + icon where when clicked, you can add a walk in patient to the queue if there is still an available slot.</p>
                    </br>
                    <h4>Change Password</h4>
                    <p>The front desk personnel may change this account's password. The old password is required for verification and also new pasword matching is required</p>
                </div>
                <script type="text/javascript" src="js/scrolltop.js"></script>
                <script type="text/javascript" src="js/search.js"></script>
        </div>
    </body>
</html>