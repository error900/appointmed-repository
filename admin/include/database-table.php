<div class="table-responsive database">
    <table class="table table-striped sortable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Account Status</th>
                <th>Account Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($account_sql)) {
                $username = $row['username'];
                $d_result = mysqli_query($con, "SELECT patient_id, email, patient_name FROM patient WHERE username LIKE '$username' 
            	UNION (SELECT doctor_id, email, doctor_name FROM doctor WHERE username LIKE '$username') 
            	UNION (SELECT secretary_id, email, secretary_name FROM secretary WHERE username LIKE '$username')");
                $doc = mysqli_fetch_array($d_result);
                echo '<tr>';
                echo '<td>' . $doc['patient_id'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $doc['patient_name'] . '</td>';
                echo '<td>' . $doc['email'] . '</td>';
                echo '<td>' . $row['account_status'] . '</td>';
                echo '<td>' . $row['account_type'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>