<?php include('inc/header.php'); 
include "db/conn.php";
?>

<div class="d-flex justify-content-center align-items-center container p-5">
    <div class="row">
    <div class="card text-center">
  <div class="card-header">
        <h1>Profile View</h1>
  </div>
  <div class="card-body">
      <?php
    if($_SESSION['uid']){
        $id = $_SESSION['uid'];
        $query = "SELECT * FROM `users` WHERE `id` = $id";
        $result = $conn->query($query);
        if ($row = $result->fetch_assoc()) {
        ?>
        <?php
        if(!empty($row['img']) || !is_null($row['img'])){
            echo "
            <img src='' class='img-fluid text-center' />
            ";
        }
        ?>
        <h5 class="card-title text-bold"><?php echo $row['name']; ?></h5>
        <table class="table table-border">
        <tbody>
        <tr>
            <td><b>Email: </b></td>
            <td><?php echo $row['email']; ?></td>
        </td><tr>
            <td><b>Phone: </b></td>
            <td><?php echo $row['phone']; ?></td>
        </td><tr>
            <td><b>Social Login: </b></td>
            <td> <p class="social-buttons text-center">
            <?php 
            if(!empty($row['fb_id']) || !is_null($row['fb_id'])){
                echo "<button class='btn btn-social-icon btn-facebook m-1'><span class='fa fa-facebook'></span></button>";
            }
            if($row['google'] != 0){
                echo "<button class='btn btn-social-icon btn-google m-1'><span class='fa fa-google'></span></button>";
            } 
            if(!empty($row['github_user']) || !is_null($row['github_user'])){
                echo "<button class='btn btn-social-icon btn-github m-1'><span class='fa fa-github'></span></button>";
            }
            ?>
            
            </p></td>
        </td>
        </tbody>
        <table>
        <p class="card-text"></p>
        <?php
        } else {
            echo '<h1>ERROR!</h1>'; die();
        }
    }
    ?>
  </div>
  <div class="card-footer text-muted">
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</div>
    </div>
</div>

<?php include('inc/footer.php'); ?>