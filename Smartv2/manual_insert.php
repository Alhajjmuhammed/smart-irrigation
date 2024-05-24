<?php include("include/conn.php"); ?>


<?php

$sendby = "Manual";
echo $sendby;
// Prepare the SQL query
$query = "insert into pump_record (send_by) VALUES ('$sendby')";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if ($result) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database conn
mysqli_close($conn);

// header('location: pump.php');
?>
