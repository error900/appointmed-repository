<?php
include '../connectdatabase.php';
    $sql = mysqli_query($con, "SELECT * FROM account WHERE username LIKE 'cj' ");
    $row = mysqli_fetch_array($sql);

    $last = explode('-',$row['last_logged_in']);
    $date = date('Y-m-d');
    $diff = (date("md", 
    date("U", mktime(0, 0, 0, $last[1], $last[2], $last[0]))) > date("md") ? ((date("Y") - $last[0]) - 1) : (date("Y") - $last[0]));
    echo $diff;
    // echo date('md');
    if($diff >= 1){
        echo 'asds';
    }else{
        echo 'lol no';
    }
    // $date1 = new DateTime($row["last_logged_in"]);
    // var_dump($date1->diff($date)->m);
  //  if(($date[1] - $last[1]) >)
?>