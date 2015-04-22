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
                    <img src="img/dashboard.JPG" alt="LoginPage" style="width:650px;height:350px" align="left"> 
                    <h4>Signing in as an Admin</h4>

                            <p>
                                There are 2 types of users that are able to login in the Admin login. It is the doctor and the Admin. This time, you are signed in as an admin.
                                                               
                                </br>
                                </br>
                                Once we are logged in, we will be redirected to the dashboard of the Admin UI. In the left part o the Admin UI, you can see the menu of the Admin Page namely General, User Management, and Registrations. 
                                </br>
                            </p>
                            </br>
                            </br>
                            <h4>GENERAL TAB MENU</h4>
                            <h4>Dashboard</h4>
                            <img src="img/notification.JPG" alt="LoginPage" style="width:600px;height:250px" align="right"> 
                            Underthe General Tab Menuis the "Dashboard" This shows you the overview of all the users currently registered in the system.
                            The overview contains the User ID, Username, Name, E-mail and the account status of the user. 
                            </br>
                            <h4>Notifications</h4>
                            Next is the Notification. Here, the admin will be notified if a user has registered or has signed up in the system.  
                            </br>
                            </br>

                            <h4>ANNOUNCEMENTS</h4>
                            <h4>_____</h4>
                            The Announcements tab is where the Admin will be posting positing announcements about events, or anything that needs to be announced. this can be done in the menu
                            
                            </br>
                            </br>

                            <h4>USER MANAGEMENT </h4>
                            <h4>Add Doctor</h4>
                            In the USER MANAGEMENT menu is the Add Doctor . 
                            The Admin is the one in charge of creating an account or adding a doctor to the system database. 
                            After Filling up the all text fields and selecting the status of the Doctor, click the SUBMIT button to finalize and add the doctor.
                            </br>
                            <img src="img/deactivateUsers.JPG" alt="LoginPage" style="width:600px;height:250px" align="right"> 
                            <h4>Deactivate Users</h4>
                            The list of active accounts in the system can be seen.  
                            In the right part of the Remove User menu are check boxes. The Admin will activate the check box of the account that will be marked as inactive.
                            After selecting all accounts to be marked inactive, at the left top part of the page, is the DEACTIVATE button. Upon clicking the page, all selected accounts below will be marked inactive.
                            </br>

                            <h4>Idle Users</h4>
                            The list of inactive accounts in the system can be seen. Users not active for over six monthes can be notified that they have not been active.
                            </br>
                            </br>

                            <h4>REGISTRATIONS</h4>
                            <h4>Pending</h4>
                            Pending accounts for confirmation are listed here. Pending accounts are categorized if it is a patient account or doctor.
                            </br>
                            </br>

                            <h4>CURRENT DATABASE</h4>
                            <h4>Import</h4>
                            Tha admin may import a list of doctors to the database. Thiacan be used if there is an exesting databse of doctors.
                            </br>
                            <h4>Import</h4>
                           The Admin ma also export the current database and it will be saved as an excel file.
                            </br>
                            </br>

                           
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