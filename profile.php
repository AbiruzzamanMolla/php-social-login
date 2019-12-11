<?php
ob_start();
include "db/conn.php";
include "fb-init.php";

if (isset($_SESSION['fb_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
    $res = $fb->get('/me?local=en_US&fields=name,email');

    $user = $res->getGraphUser();
    $name = $user->getField('name');
    $_SESSION['name'] = $name;
    $fbid = $user->getField('id');


    $query = "SELECT * FROM `users` WHERE `fb_id` = '$fbid'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['uid'] = $row['id'];
        if (!is_null($row['name']) && !is_null($row['email']) && !is_null($row['password'])) {
            header("Location: view.php");
        }
            if (isset($_POST['update'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                $query = "UPDATE `users` SET `name`='$name', `email` = '$email', `phone` = '$phone', `password` = '$password' WHERE `users`.`id` = {$row['id']}";
                $result = $conn->query($query);
                if ($result) {
                    header("Location: view.php");
                }
        }
    } else {
        $query = "INSERT INTO `users` (`name`, `fb_id`) VALUES ('$name', '$fbid')";
        $result = $conn->query($query);
        header("Location: profile.php");
    }
}

if (isset($_SESSION['g_access_token'])) {
    $name = $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
    $email = $_SESSION['user_email_address'];
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['uid'] = $row['id'];
        if (!is_null($row['name']) && !is_null($row['email']) && !is_null($row['password'])) {
            header("Location: view.php");
        }
            if (isset($_POST['update'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                $query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$password' WHERE `users`.`id` = {$row['id']}";
                $result = $conn->query($query);
                if ($result) {
                    header("Location: view.php");
                }

        }
    } else {
        $query = "INSERT INTO `users` (`name`, `email`, `google`) VALUES ('$name', '$email', 1)";
        $result = $conn->query($query);
        header("Location: profile.php");
    }
}

if (isset($_SESSION['git_access_token'])) {
    $git_user = $_SESSION['git_user'];
    $query = "SELECT * FROM `users` WHERE `github_user` = '$git_user'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['uid'] = $row['id'];
        if (!is_null($row['name']) && !is_null($row['email']) && !is_null($row['password'])) {
            header("Location: view.php");
        }
            if (isset($_POST['update'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                $query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$password' WHERE `users`.`id` = {$row['id']}";
                $result = $conn->query($query);
                if ($result) {
                    header("Location: view.php");
                }
            }
    } else {
        $query = "INSERT INTO `users` (`id`, `name`, `email`, `img`, `phone`, `password`, `facebook`, `fb_id`, `google`, `github_user`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', '$git_user')";
        $result = $conn->query($query);
        header("Location: profile.php");
    }
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['uid'] = $row['id'];
        if (!is_null($row['name']) && !is_null($row['email']) && !is_null($row['password'])) {
            header("Location: view.php");
        }
    }
}
?>

<?php include('inc/header.php'); ?>
<div class="d-flex justify-content-center align-items-center container p-5">
    <div class="row mt-1">
        <form action="" method="post">
            <h1 class="h3 mb-3">Complete your profile</h1>
            <div class="form-group">
                <label for="inputName" class="control-label">Enter Name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="inputName">
            </div>
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
            <button type="submit" name="update" class="btn btn-block btn-success text-center">Save Information</button>
        </form>
    </div>
</div>


<?php include('inc/footer.php'); ?>