<?php include("include/conn.php"); ?>
<?php include("include/header.php"); ?>


<?php 
	$message = "";
	if(isset($_POST['login'])){
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $sql = "select * from users where username = '{$username}' and password = '{$password}'";
		 $run = mysqli_query($conn,$sql);
		 $rows = mysqli_num_rows($run);
		 if ($rows > 0) {
		 	$_SESSION['username'] = $username;
		 	header('location: level.php');
		 }else {
		 	$message = "Incredential login";
		 }

	}



?>


<div class="container mt-5">

<form class=" col-4 m-auto border border-info p-3" method="POST" id="fm">
  <div class="text-center">
  </div>
  <h1 class="text-center text-info">Login</h1>
  <h3 style="color: green;"><?= @$_SESSION['login']; ?></h3>
	<h3 style="color: red;"><?= $message; ?></h3>
  <label>Username:</label>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id=""><i class="fa fa-user"></i></span>
    </div>
    <input type="text" name="username"class="form-control" placeholder="Username" name="username" required>
  </div>
  <label>Password:</label>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id=""><i class="fa fa-expeditedssl"></i></span>
    </div>
    <input type="password" name="password"class="form-control" placeholder="Password"required name="password"/>
  </div>
 
    <button type="submit" class="btn btn-info" name="login"><i class="fa fa-angle-double-right"></i>Login</button>
</form>
</div>


<?php unset($_SESSION['login']); ?>