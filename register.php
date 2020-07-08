<?php include('server.php') ?>
<link rel="stylesheet" href="style/login.css">

<?php include('header.php') ?>
<div class="overlay">
</div>
<div class="container">     
    <h2 class="head-one">Sign Up</h2>
  <form method="post" action="register.php" class="ui form my-form">
	  <?php include('errors.php'); ?>
  	<div class="field">
  	  <label class="labels">User ID*</label>
  	  <input type="text" name="user_id" required>
    </div>
    <div class="field">
        <label class="labels">Full Name*</label>
        <input type="text" name="name" required>
  	</div>
    <div class="field">
      <label>User Role</label>
      <select class="ui fluid dropdown" name="role">
        <option value="">User Role</option>
		<option value="Admin">Admin</option>
		<option value="User">User</option>
      </select>
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
  		Already a member? <a href="login.php">Sign in</a> or <a href="home.php">Home</a>
  	</p>
  </form>
</div>
  <?php include('footer.php') ?>