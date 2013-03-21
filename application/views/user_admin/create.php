<h2>Create a User</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('user_admin/save') ?>

<label for="name">Username</label>
	<input type="text" name="username" />
	<br />
	
  <label for="name">First name</label>
	<input type="text" name="username" />
	<br />
	
  <label for="name">Last name</label>
	<input type="text" name="username" />
	<br />
	
	<label for="name">Email</label>
	<input type="text" name="email" />
	<br />
	
	<label for="password">Password</label>
	<input type="text" name="password" />
	<br />
	
	<input type="submit" name="submit" value="Create user" /> 
<?php echo form_close(); ?>
