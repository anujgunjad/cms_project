<?php include('server.php') ?>
<link rel="stylesheet" href="style/login.css">
<?php include('header.php') ?>
<div class="overlay">
</div>
<style>
.form {
    margin: 0 auto !important;
    margin-top: 7vh !important;
    width: 35vw;
}
</style>
<div class="container">     
  <form method="post" action="register.php" class="ui form my-form">
    <h2 class="head-one">Sign Up</h2>
	  <?php include('errors.php'); ?>
  	<div class="field">
  	  <label class="labels">User ID*</label>
  	  <input type="text" name="user_id" required>
    </div>
    <div class="field">
        <label class="labels">Full Name*</label>
        <input type="text" name="name" required>
  	</div>
	<div class="fields">
  	<div class="fifteen wide field">
  	  <label class="labels">Password*</label>
  	  <input type="password" name="password_1" required>
  	</div>
  	<div class="fifteen wide field">
  	  <label class="labels">Confirm password*</label>
  	  <input type="password" name="password_2" required>
  	</div>
</div>
  	<div class="field">
  	  <button type="submit" class="ui button form-btn-one" id="reg-btn" name="reg_user">Register</button>
	  </div>
  	<p>
  		Already have an account? <a href="login.php">Log in</a>
  	</p>
  </form>
</div>
  <?php include('footer.php') ?>