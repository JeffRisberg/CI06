<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $title;?></title>

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css" type="text/css" />
  </head>
  <body>
    <div id="container">
      <?php $this->load->view('_header');?>
      <?php $this->load->view('_admin_menu');?>
      {yield}
      <?php $this->load->view('_footer');?>
    </div>
    
    <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  </body>
</html>  