<?php
    include 'connectdatabase.php'; 
    if($_POST){
        $search = $_POST['searchword'];
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_name LIKE '%$search%' or specialization LIKE '%$search%' ORDER BY doctor_name LIMIT 5") ;
        while($row = mysqli_fetch_array($result)){
            $doctor_id = $row['doctor_id'];
            $doctor_name  =$row['doctor_name'];
            $specialization  =$row['specialization'];
            $doctor_status = $row['doctor_status'];
            $c_username = $search;
            $b_username = $c_username;
            $final_name = str_ireplace($search, $b_username, $doctor_name);
            $final_specs = str_ireplace($search, $b_username, $specialization);
?>
        <li>
            <?php 
                echo "<a href=\"doctor.php?id=$doctor_id\"><i class='fa fa-user-md'></i>" . $final_name . '</a>';
                echo '<p>' . $final_specs . '</p>';
            ?>
        </li>
        
<?php
        }
    }
?>
