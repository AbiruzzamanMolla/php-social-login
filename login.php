<?php include('inc/header.php'); ?>
<?php include('fb-init.php'); ?>
<div class="d-flex justify-content-center align-items-center container">
    <div class="row mt-1">
        <form action="">
            <h1 class="h3 mb-3">Please sign in</h1>
            <div class="form-group">
                <label for="inputEmail" class="control-label">Enter Email</label>
                <input type="email" class="form-control" id="inputEmail" aria-labelledby="emailnotification">
                <small id="emailnotification" class="form-text text-muted">Enter Valid Email Id</small>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="control-label">Enter Password</label>
                <input type="password" class="form-control" id="inputPassword" aria-labelledby="passwordnotification">
            </div>

            <button type="submit" class="btn btn-block btn-success text-center">Login </button>
            <p class="m-2 p-2">Not registered yet? <a href="register.php"> click here</a> to register</p>

            <h1>Login with social media </h1>
            <div class="social-buttons text-center">
                <a class="btn btn-social-icon btn-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a href="<?php echo $loginUrl; ?>" class="btn btn-social-icon btn-facebook">
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