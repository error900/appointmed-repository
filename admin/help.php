<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Help";
    include 'include/head.php';
    include '../connectdatabase.php';
    ?>

    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: index.php");
    else if ($account_type != 'Admin')
        header("location: index.php");

    $account_sql = mysqli_query($con, "SELECT * FROM account WHERE username <> 'Admin' ");

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
                     <div class="col-xs-12 col-md-7">
                        <img src="img/dashboard.jpg" class="img-responsive" alt="help image"> 
                     </div>
                     <div class="col-xs-12 col-md-5 help-text">
                        <h4>User signin</h4>
                        <p>There are 2 types of users that are able to login in the Admin login. It is the doctor and the Admin. This time, you are signed in as an admin.</p>
                        <p>Once we are logged in, we will be redirected to the dashboard of the Admin UI. In the left part o the Admin UI, you can see the menu of the Admin Page namely General, User Management, and Registrations.</p>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div class="col-xs-12 col-md-6 help-text">
                        <h4>Notifications</h4>
                        <p>Under the General Tab Menu is the "Dashboard". This shows you the overview of all the users currently registered in the system.</p>
                        <p>The overview contains the User ID, Username, Name, E-mail and the account status of the user.</p>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <img src="img/notification.jpg" class="img-responsive" alt="help image"> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div class="col-xs-12 col-md-12 help-text">
                        <p>The Announcements tab is where the Admin could post announcements about events, or anything that needs to be announced. This can be done in the menu.</p>
                     </div>
                     <div class="col-xs-12 col-md-6 help-text">
                        <h4>User Management</h4>
                        <h5 class="row-header-lc">Add doctor</h5>
                        <p>In the USER MANAGEMENT menu is the Add Doctor . 
                            The Admin is the one in charge of creating an account or adding a doctor to the system database. 
                            After filling up the all text fields and selecting the status of the Doctor, click the SUBMIT button to finalize and add the doctor.</p>
                     </div>
                     <div class="col-xs-12 col-md-6">
                        <img src="img/deactivateUsers.JPG" class="img-responsive" alt="help image"> 
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div class="col-xs-12 col-md-4 help-text">
                        <h4>Deactivate Users</h4>
                        <p>The list of active accounts in the system can be seen.  
                            In the right part of the Remove User menu are check boxes. The Admin will activate the check box of the account that will be marked as inactive.
                            After selecting all accounts to be marked inactive, at the left top part of the page, is the DEACTIVATE button. Upon clicking the page, all selected accounts below will be marked inactive.</p>
                     </div>
                     <div class="col-xs-12 col-md-4 help-text">
                        <h4>Idle Users</h4>
                        <p>The list of inactive accounts in the system can be seen. Users not active for 1 or more years would be notified.</p>
                        <h4>Registrations</h4>
                        <p>Pending accounts for confirmation are listed here. Pending accounts are categorized if it is a patient account or doctor. </p>
                     </div>
                     <div class="col-xs-12 col-md-4 help-text">
                        <h4>Export</h4>
                        <p>The Admin ma also export the current database and it will be saved as an excel file.</p>
                     </div>
                </div>
            </div>
        </div>

        <?php
        include 'include/scrolltop.php';
        include 'include/scripts.php';
        ?>
        <script type="text/javascript" src="../js/scrolltop.js"></script>

    </body>
</html>