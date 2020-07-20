<?php include('server.php') ?>
<?php include('header.php') ?>
<link rel="stylesheet" href="style/login.css">
<style>
    .form{
    margin-left: 30vw!important;
    padding: 4vh 4vw 4vh 4vw;
    width: 35vw;
}
.head-one{
    
    margin-left: 41vw;
}

</style>
<h2 class="head-one">Log In</h2>
	
  <form class="ui form my-form" method="post" action="login.php">
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
  	</div>
  	<div class="field">
  		<label class="labels">Password</label>
  		<input type="password" name="password" required>
  	</div>
  	<div class="field">
  		<button id="btn" class="ui button form-btn-one" type="submit" name="login_user">Log in</button>
  	</div>
  	<p>
  		Don't have an account? <a href="register.php">Sign up</a>
  	</p>
  </form>
  <?php include('footer.php') ?>
  