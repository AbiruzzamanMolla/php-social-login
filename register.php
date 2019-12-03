<?php
include "fnc/regFunc.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $confirmEmail = $_POST['email2'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        register($name, $email, $phone, $password);
    }
}
?>

<?php include('inc/header.php'); ?>
<div class="d-flex justify-content-center align-items-center container p-5">
    <div class="row mt-1">
        <form action="">
            <h1 class="h3 mb-3">Please register</h1>
            <div class="form-group">
                <label for="name" class="control-label">Enter Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="inputEmail" class="control-label">Enter Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
            </div>
            <div class="form-group">
                <label for="inputEmail2" class="control-label">Confirm Email</label>
                <input type="email" name="email2" class="form-control" id="inputEmail2">
            </div>
            <div class="form-group">
                <label for="inputEmail" class="control-label">Enter Phone</label>
                <input type="number" name="phone" class="form-control" id="inputEmail">
            </div>
            <div class="form-group">
                <label for="inputPassword" name="password" class="control-label">Enter Password</label>
                <input type="password" class="form-control" id="inputPassword">
            </div>

            <button type="submit" name="submit" class="btn btn-block btn-success text-center">Register </button>
            <p class="m-2 p-2">already registered? <a href="login.php"> click here</a> to login</p>

            <h1>Register with social media </h1>
            <div class="social-buttons text-center">
                <a class="btn btn-social-icon btn-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a class="btn btn-social-icon btn-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <a class="btn btn-social-icon btn-google">
                    <span class="fa fa-google"></span>
                </a>
                <a class="btn btn-social-icon btn-linkedin">
                    <span class="fa fa-linkedin"></span>
                </a>
                <a class="btn btn-social-icon btn-github">
                    <span class="fa fa-github"></span>
                </a>
            </div>

        </form>
    </div>
</div>

<?php include('inc/footer.php'); ?>