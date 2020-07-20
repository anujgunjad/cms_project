<style>
 .custom-alert{
	color: #00377A;
	border: 1px solid #004BA8;
	background: #D6E9FF;
 }
</style>
<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
		<div class="alert alert-danger custom-alert" role="alert">
		<p><?php echo $error ?></p>
		</div>
  	<?php endforeach ?>
  </div>
<?php  endif ?>