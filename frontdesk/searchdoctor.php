<?php
include 'connectdatabase.php';
if ($_POST) {
    $search = mysqli_real_escape_string($con, $_POST['searchword']);
    $result = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule 
        WHERE doctor_name LIKE '%$search%' or specialization LIKE '%$search%' ORDER BY doctor_name LIMIT 5");
    if(mysqli_num_rows($result)>=1){
        while ($row = mysqli_fetch_array($result)) {
            $doctor_id = $row['doctor_id'];
            $doctor_name = $row['doctor_name'];
            $specialization = $row['specialization'];
            $doctor_status = $row['doctor_status'];
            $c_username = $search;
            $b_username = $c_username;
            $final_name = str_ireplace($search, $b_username, $doctor_name);
            $final_specs = str_ireplace($search, $b_username, $specialization);
            $days = $row['days'];
 ?>
            <li>
                <?php
                echo "<a href=\"searchpage.php?q=".$search."\"><i class='fa fa-user-md fa-lg'></i>" . $final_name . '</a>';
                echo '<p>' . $final_specs . '</p>';
                ?>
            </li>
            <?php
        }
    }  else{
        echo '<p class="search-nomatch-text">No matches found.</p>';
    }
}
?>

