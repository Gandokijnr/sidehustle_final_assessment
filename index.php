<?php
session_start();
require 'header.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];   
    $password = md5($_POST['password']);

    
    $user_exist = mysqli_query($connect, "SELECT * FROM registered_user WHERE USER_NAME = '$username'");

    $user_data = mysqli_fetch_assoc($user_exist);


    if (!mysqli_num_rows($user_exist)) {
    exit("<p class='text-danger'>user not found</p><a href='register.php'>register</a><a href='index.php'>try again</a>");
    }


    if ($password !==  $user_data['PASSWORD']) {
        exit("<p class='text-danger'>incorrect password</p><a href='index.php'>try again</a>");  

}

$_SESSION['login'] = true;
$_SESSION['id'] = $user_data['USER_NAME'];

header("location: landing_page.php");
}
?>

<div class="container my-5 d-flex justify-content-center p-3">
<div class="card p-5" style="width: 35rem;">
  <div class="card-body">
  <form action="index.php" method="POST">
<h3 class="text-center">LOGIN FORM</h3>
        <div class="mb-3 my-5">
            <label for="" class="form-label">UserName</label>
            <input type="text" name="username" require="required" class="form-control" id="">
        </div>

        <div class="mb-3 my-2">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" require="required" class="form-control" id="">
        </div>


        <button type="submit" name="login" class="btn btn-primary w-100 p-4">SECURE LOGIN</button>
        <p>Yet to have an account?<a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
</div>


<?php
require 'footer.php';
?>