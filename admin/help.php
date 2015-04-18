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
    if ($loggedIn == false)
        header("location: index.php");
    else if ($account_type != 'Admin')
        header("location: index.php");

    $account_sql = mysqli_query($con, "SELECT * FROM account ");
    //    $account_row = mysqli_fetch_array($account_sql);
    ?>
    <body class="e4e8e9-bg">
        <?php
        include 'include/admin-nav-start.php';
        ?>
        <ul class="dropdown-menu" role="menu">
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="#">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
        </ul>
        <?php
        include 'include/admin-nav-end.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
                 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4>Signing in as an Admin</h4>
                            <p>
                                
                                There are 2 types of users that are able to login in the Admin login. It is the doctor and the Admin. This time, you are signed in as an admin.
                                </br>
                                
                                Once we are logged in, we will be redirected to the dashboard of the Admin UI.
                                </br>
                               
                                In the left part o the Admin UI, you can see the menu of the Admin Page namely General, User Management, and Registrations. 
                                </br>
                            </p>
                             </br>
                            <h4>GENERAL TAB MENU</h4>
                            <h4>Dashboard</h4>
                            The dashboard is a submenu of the “General” tab menu. This shows you the overview of all the users currently registered in the system.
                            The overview contains the User ID, Username, Name, E-mail and the account status of the user.  
                            </br>

                            <h4>Announcements</h4>
                            The Announcements tab is where the Admin will be posting positing announcements about events, or anything that needs to be announced.
                            </br>
                          
                            <h4>Notifications</h4>
                            Next is the Notification. Here, the admin will be notified if a user has registered or has signed up in the system.  
                            </br>

                            <h4>Import and Export</h4>
                            In the Import menu, the Admin is able to import lists of users in Excel format. 
                            In the Export menu, the Admin is able to export the list of users currently registered in the system. 
                            </br>
                            </br>
                            <h4>USER MANAGEMENT TAB MENU </h4>
                            <h4>Add Doctor</h4>
                            First in the submenu of USER MANAGEMENT is the Add Doctor Menu. 
                            The Admin is the one in charge of creating an account or adding a doctor to the system database. 
                            After Filling up the all text fields and selecting the status of the Doctor, click the SUBMIT button to finalize and add the doctor.
                            </br>

                            <h4>Remove User</h4>
                            The list of active accounts in the system can be seen.  
                            In the right part of the Remove User menu are check boxes. The Admin will activate the check box of the account that will be marked as inactive.
                            After selecting all accounts to be marked inactive, at the left top part of the page, is the INACTIVE button. Upon clicking the page, all selected accounts below will be marked inactive.
                            </br>

                            <h4>Inactive Users</h4>
                            The list of inactive accounts in the system can be seen.  
                            </br>
                            
                    </div>     
                </div>
            </div>
        </div>

        <?php
        include 'include/scripts.php';
        include '../include/scrolltop.php';
        ?>
        <script type="text/javascript" src="js/listslide.js"></script>
        <script type="text/javascript" src="../js/scrolltop.js"></script>

    </body>
</html>