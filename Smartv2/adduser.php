<?php include("include/conn.php"); ?>

<?php
    if (isset($_POST['adduser'])) {

        $fullname = $conn->real_escape_string($_POST['fullname']);
        $username = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $role = $conn->real_escape_string($_POST['role']);

        $sql = "select * from users where username = '$username'";
        $run = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($run);

        if ($rows > 0) {
            $message = "Username is alread Exist!!!";
        }else{
            $sql  = "insert into users(fullname, username, email, password, phone, role)";
            $sql .= " values ('$fullname', '$username', '$email', '$password', '$phone', '$role')";

            if ($conn->query($sql) === true) {
                echo '<div class="container mt-3 alert alert-success">User added successfully.</div>';
            } else {
                echo '<div class="container mt-3 alert alert-danger">Error adding user: ' . $conn->error . '</div>';
            }
            
            header("location: users.php");
        }

        $conn->close();
        
    }
    ?>
 
<?php include("include/header.php"); ?>
<div class="container mt-5">
        <h1>Add User</h1>
        <form action="" method="POST" class="col-5">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" class="form-control" name="role" required>
            </div>
            <button type="submit" name="adduser" class="btn btn-primary">Add User</button>
        </form>
</div>

<?php include("include/footer.php"); ?>