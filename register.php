<?php
session_start();
require 'header.php';

if (isset($_POST['register'])) {
   
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['select_gender'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);
    
    
    if ($password !== $confirm_password) {
        exit("<p class='text-danger'>password mismatch</p><a href='register.php'>try again</a>");
       }

   $check_user_info = mysqli_query($connect, "SELECT * FROM registered_user WHERE USER_NAME = '$username' OR EMAIL = '$email'");

   if (mysqli_num_rows($check_user_info) > 0) {
        exit("username or email address already exist><a href='index.php'>proceed to login</a>");
   }

   $send_user_info = mysqli_query($connect, "INSERT INTO registered_user
   (FIRST_NAME, LAST_NAME, USER_NAME, EMAIL, GENDER, PASSWORD) 
   VALUES ('$fname','$lname','$username','$email','$gender','$password')");


if ($send_user_info) {
    header("location: index.php");
}

}
?>

<div class="container my-5 d-flex justify-content-center p-3">
<div class="card p-5" style="width: 35rem;">
  <div class="card-body">
  <form action="" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">First Name</label>
            <input type="text" name="firstname" require="required" class="form-control" id="">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Last Name</label>
            <input type="text" name="lastname" require="required" class="form-control" id="">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">UserName</label>
            <input type="text" name="username" require="required" class="form-control" id="">
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" require="required" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <select class="form-select mb-3" require="required" name="select_gender">
        <option selected >Select your gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Prefer not to say</option>
        </select>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" require="required" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" require="required" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" name="register" class="btn btn-primary w-100 p-4">CREATE AN ACCOUNT</button>
        <p>Already have an account?<a href="index.php">Login</a></p>

    </form>
  </div>
</div>
</div>

<?php
include 'footer.php';
?>