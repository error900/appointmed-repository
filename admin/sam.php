<?php
include '../connectdatabase.php';
    $sql = mysqli_query($con, "SELECT * FROM account WHERE username LIKE 'CJTayab' ");
    $row = mysqli_fetch_array($sql);

    $last = explode('-',$row['last_logged_in']);
    $date = date('Y-m-d');
    echo $last[1].'<br/>';
    echo $last[0].'<br/>';
    echo $last[2].'<br/>';
    echo date('md');
    $date = explode('-', $date);
    $sub = $date[1] - $last[1];
    echo $sub;

    $date1 = new DateTime($row["last_logged_in"]);
    var_dump($date1->diff($date)->m);
  //  if(($date[1] - $last[1]) >)
?>