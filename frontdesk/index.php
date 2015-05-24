<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Front Desk | Available Doctors";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".appo").click(function() { // Click to only happen on announce links
                $("#appo_id").val($(this).data('id'));
                $("#pat_id").val($(this).data('patient-id'));
                $("#app_id").val($(this).data('a-id'));
                $("#pats_id").val($(this).data('p-id'));
            });
            $('#hideshow').on('click', function() {
                $('#clinics').show();
            });
            $('#showsec').on('click', function() {
                $('#secretary').show();
            });
        });
    </script>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: ../admin/index.php");
    else if ($account_type != 'FrontDesk')
        header("location: ../admin/index.php");
    if(isset($_GET['page'])){
         $page = (int)mysqli_real_escape_string($con, $_GET['page']);
    }else{
        $page =0;
    }
    if($page=="" || $page=="1"){
        $page1 = 0;
    }else{
        $page1 = ($page*8)-8;
    }
    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    if(is_int($page1)){
        $sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule WHERE doctor_status = 'In' ORDER BY 2 LIMIT $page1,8");
    }else{
        echo "<script> alert('Woops you seem lost, let me help you'); </script>";
        echo "<script> location.replace('index.php') </script>";
    }
    $count_sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule WHERE doctor_status = 'In' ORDER BY 2 ");
    $count = mysqli_num_rows($count_sql);
    $cout = ceil($count/8);

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
                <div class="container-fluid" id="frontdesk-md">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center row-header-black">&mdash; Available Doctors &mdash;</h1>
                        </div>
                        <?php
                            while($row = mysqli_fetch_array($sql)){
                                $doctor_id = $row['doctor_id'];
                                $date = date('Y-m-d', strtotime($date));
                                $available_days = explode("/", $row['days']);
                                foreach($available_days as $values){

                                } 
                            echo '<div class="col-xs-12 col-md-3">';
                                echo '<div class="panel panel-default doctor-panel">';
                                    echo '<div class="panel-heading">';
                                        echo $row['doctor_name'];
                                    echo '</div>';
                                    echo '<div class="panel-body">';
                                        echo '<p class="clinic-days">'.$row['days'].'</p>';
                                        echo '<p class="clinic-info">'.$row['time'].'</p>';
                                    echo '</div>';
                                    echo '<div class="doctor-panel-btns">';
                                            echo "<a href=\"walk_in.php?did=$doctor_id\" class='tooltip-bottom' data-tooltip='Add to queue'onclick='return confirm(\"Add patient to queue?\")' title=\"Add to Queue\"> <i class=\"fa fa-plus\"></i></a>";
                                            echo '<p class="doctor-panel-specs">'.$row['specialization'].'</p>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            }
                        ?>
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <nav class="text-center">
                                <ul class="pagination">
                                    <?php 
                                        for($i=1; $i<=$cout; $i++) {
                                            echo "<li><a href=\"index.php?page=".$i."\" id='num-page'>" .$i. "</a></li>";
                                        }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <?php 
                include 'include/add_to_queue.php';
                ?>
                <script type="text/javascript" src="js/search.js"></script>
                <script>
                    $(document).ready(function() {
                        $(".pagination a").on("click",function() {
                                $(".pagination a").addClass("border-bottom");
                        });
                    });
                </script>
        </div>
    </body>
</html>