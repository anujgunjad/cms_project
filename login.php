<?php include('server.php') ?>
<?php include('header.php') ?>
<link rel="stylesheet" href="style/login.css">
<style>
.form {
    margin: 0 auto !important;
    margin-top: 10vh !important;
    width: 35vw;
}
</style>
<form class="ui form my-form" method="post" action="login.php">
    <h2 class="head-one">Log In</h2>
    <?php include('errors.php'); ?>
    <?php 
	if ($_GET['logout'] == 1) { ?>
    <div class="alert alert-success" role="alert">
        <p>Successfully Logged Out</p>
    </div>
    <?php } ?>
    <div class="field">
        <label class="labels">User ID</label>
        <input type="text" name="user_id" required>
        <!-- <p style="font-size: 12px; color:#004BA8" class="mt-2">*Enter Employee ID </p> -->
    </div>
    <div class="field">
        <label class="labels">Password</label>
        <input type="password" name="password" required>
        <!-- <p style="font-size: 12px; color:#004BA8" class="mt-2">*Enter password </p> -->
    </div>
    <div class="field">
        <button id="btn" class="ui button form-btn-one" type="submit" name="login_user">Log in</button>
    </div>
    <p>
        Don't have an account? <a href="register.php">Sign up</a>
    </p>
</form>
<?php include('footer.php') ?>