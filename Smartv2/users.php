<?php include("include/conn.php"); ?>


<?php
include("include/conn.php");

$sql = "SELECT * FROM users";
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
          Manage users
        </h2>
        <h4 class="d-flex justify-content-start border col-2 mt-1" style="border-radius: 20px;">
            <a href="adduser.php" style="font-family: 'Cooper Black', sans-serif;">Add user</a>
        </h4>
        <!-- #####################################33 -->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Edit</th>
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
                        <td><?= $row['fullname']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td><?= $row['role']; ?></td>
                        <td>
                          edit
                        </td>
                    </tr>
                    <?php $n++; endforeach; ?>
                    
                    <?php else: ?>
                      <p><?= "No users found in the table."; ?></p>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- #########################33 -->
        <div class="pane py-3">
          <div>
            <div class="card-title my-0 mb-2 h2" style="font-family: 'Cooper Black', sans-serif;">
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>

<?php include("include/footer.php"); ?>