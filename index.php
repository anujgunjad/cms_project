<?php 
if (!isset($_SESSION['user_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /cms_project/login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    header("location: home.php");
}
?>
 <?php include("header.php") ?>
    <div class="container-fluid">
        <div class="main-wrapper">
            <div class="row">
                <div class="input-btn col-sm-6 text-center">
                    <a href="admin/dashboard.php" class="button btn" style="width: 250px; height: 60px; font-size : 30px; color : #000;"
                        name="admin">Admin</a>
                </div>
                <div class="input-btn col-sm-6 text-center">
                    <a href="user/user-dashboard.php" class="button btn"
                        style="width: 250px; height: 60px;  font-size : 30px; color : #000;" name="user">User</a>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>
