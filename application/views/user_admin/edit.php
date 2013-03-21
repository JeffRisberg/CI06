<h2>Edit a User</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('user_admin/update') ?>
	<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
	
	<label for="name">Username</label>
	<input type="text" name="username" value="<?php echo $user['username']; ?>" />
	<br />
	
  <label for="name">First name</label>
	<input type="text" name="fname" value="<?php echo $user['fname']; ?>" />
	<br />
	
  <label for="name">Last name</label>
	<input type="text" name="lname" value="<?php echo $user['lname']; ?>" />
	<br />
	
	<label for="name">Email</label>
	<input type="text" name="email" value="<?php echo $user['email']; ?>" />
	<br />
	
	<label for="password">Password</label>
	<input type="text" name="password" value="<?php echo $user['password']; ?>" />
	<br />
	
	<input type="submit" name="submit" value="Submit changes" />
<?php echo form_close(); ?>
