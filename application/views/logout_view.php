<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 
<head>
    <title>Rubric Logout Screen | Welcome </title>
</head>
<body>
    <div id="logout_form">
        <?php echo $msg ?>    
        <form action="<?php echo base_url();?>logout/process" method="post" name="process">
          
            Sorry to see you go
          
            <input type="submit" value="Logout" />
        </form>
    </div>
</body>
</html>