<?php include("include/conn.php"); ?>

<?php 

$sql = "SELECT * FROM pump_record order by date desc";
$result = $conn->query($sql);

$conn->close();

?>
<?php include("include/header.php"); ?>

</head>
<body class="container" >
  <?php include("include/navs.php"); ?>
  <div class="d-flex justify-content-center">
    <div class="card mt-1" style="width: 100%; border-radius: 20px;">
      <div class="card-body py-0 h6">
        <h2 class="card-title lead m-0 py-3 border-bottom" style="font-family: 'Cooper Black', sans-serif;">
          Pump Control
        </h2>
        <div class="pane py-3">
        <div>
           <!-- #####################################33 -->
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Send by</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result->num_rows > 0): 
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    $n = 1;
                    ?>
                    <?php  foreach ($rows as $row): ?>
                      <tr>
                        <td><?= $n; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['send_by']; ?></td>
                        <td>
                          View
                        </td>
                    </tr>
                    <?php $n++; endforeach; ?>
                    
                    <?php else: ?>
                      <p><?= "No users found in the table."; ?></p>
                    <?php endif; ?>
                    
            </table>
        </div>

        <!-- #########################33 -->
        </div>
        </div>
      </div>
    </div>
  </div>

<?php include("include/footer.php"); ?>
