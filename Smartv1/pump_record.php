<?php include("include/conn.php"); ?>


<?php
    $query = "SELECT date, id FROM pump_record ORDER BY id DESC LIMIT 1";
    $data = mysqli_query($conn, $query);

    if ($data) {
        $row = mysqli_fetch_assoc($data);
        if ($row) {
            $lastTimestamp = $row['date'];

            // Get the current timestamp
            $currentTimestamp = time();

            // Convert timestamps to DateTime objects
            $lastDateTime = new DateTime($lastTimestamp);
            $currentDateTime = new DateTime();

            // Calculate the difference in minutes
            $interval = $lastDateTime->diff($currentDateTime);
            $timeDifference = $interval->i;

            // Output the time difference
      
            echo "Time difference: " . @$timeDifference . " minutes";

        } else {
            echo "No records found.";
        }

        // Free the result set
        mysqli_free_result($data);
    } else {
        echo "Error executing the query: " . mysqli_error($conn);
    }

  if (@$timeDifference < 30) {
    $sendby = "Automatic";

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
  }
    
mysqli_close($conn);

// header('location: pump.php');
?>
