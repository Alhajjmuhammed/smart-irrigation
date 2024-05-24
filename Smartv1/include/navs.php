<?php include("include/conn.php"); ?>
<?php
    $sql = "select * from users where username = '{$_SESSION['username']}'";
    $run = mysqli_query($conn,$sql);
    $fetch = mysqli_fetch_array($run);
?>
<div class="d-flex justify-content-center">
  <div class="card" style="width: 100%; border-radius: 20px;" >
    <div class="card-body py-0 lead text-center">
        <h1 style="font-family: 'Cooper Black', sans-serif;">
            Smart Irrigation
        </h1>
      
        <nav aria-label="breadcrumb" style="width: 100%; border-radius: 20px;">
          <ol class="breadcrumb">
          <?php if ($fetch['role'] == 'admin'): ?>
            <li class="breadcrumb-item">
              <a href="level.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Level</span></a>
            </li>
            <li class="breadcrumb-item">
            <a href="pump.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Pump</span></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
            <a href="report.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Report</span></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
            <a href="users.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Users</span></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
            <a href="logout.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Logout</span></a>
            </li>
          <?php else: ?>
            <li class="breadcrumb-item">
              <a href="level.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Level</span></a>
            </li>
            <li class="breadcrumb-item">
            <a href="pump.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Pump</span></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
            <a href="report.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Report</span></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
            <a href="logout.php"><span class="text-dark" style="font-family: 'Cooper Black', sans-serif;">Logout</span></a>
            </li>
            <?php endif; ?>
          </ol>
        </nav>
    </div>
  </div>
</div>

