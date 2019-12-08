<?php
include "db/conn.php";
include "fb-init.php";

if (isset($_SESSION['access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['access_token']);
    $res = $fb->get('/me?local=en_US&fields=name,email');

    $user = $res->getGraphUser();
    $name = $user->getField('name');
    $_SESSION['name'] = $name;
    $fbid = $user->getField('id');


    $query = "SELECT * FROM `users` WHERE `fb_id` = '$fbid'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (is_null($row['email'])) {
            if (isset($_POST['update'])) {
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                $id = $_POST['id'];

                $query = "UPDATE `users` SET `email` = '$email', `phone` = '$phone', `password` = '$password' WHERE `users`.`id` = $id";
                $result = $conn->query($query);
                if ($result) {
                    header("Location: index.php");
                }
            }
        }
    } else {
        $query = "INSERT INTO `users` (`name`, `fb_id`) VALUES ('$name', '$fbid')";
        $result = $conn->query($query);
        header("Location: profile.php");
    }
}

?>

<?php include('inc/header.php'); ?>
<div class="d-flex justify-content-center align-items-center container p-5">
    <div class="row mt-1">
        <form action="" method="post">
            <h1 class="h3 mb-3"><?php echo isset($_SESSION['fb_id']) ? $_SESSION['name'] : $_SESSION['name']; ?> Complete your profile</h1>
            <div class="form-group">
                <label for="inputEmail" class="control-label">Enter Email</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" id="inputEmail">
            </div>
            <div class="form-group">
                <label for="inputphone" class="control-label">Enter Phone</label>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" id="inputphone">
            </div>
            <div class="form-group">
                <label for="inputPassword" name="password" class="control-label">Enter Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword">
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" name="update" class="btn btn-block btn-success text-center">Save Information</button>
        </form>
    </div>
</div>


<?php include('inc/footer.php'); ?>