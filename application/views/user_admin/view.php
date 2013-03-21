<div>
Email: <?php echo $user['email'] ?>
</div>
<div>
Password: <?php echo $user['password'] ?>
</div>
<?php echo anchor('user_admin/edit/' . $user['id'], 'Edit'); ?>



