<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <title><?php echo $title;?></title>
	
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css">
		<style type="text/css">
			body {
				padding-top: 45px;
			}
		</style>
	
		<link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>assets/css/styles.less">
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/less-1.3.0.min.js"></script>
	  
	  <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	  <![endif]-->
	
	  <link rel="shortcut icon" href="<?php echo base_url();?>assets/ico/favicon.ico">
	</head>
	
	<body>
     <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">         
          <a class="brand" href="index.html">CI06</a>
          <div class="nav-collapse collapse">            
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>        
    
    <div class="container">
      <?php $this->load->view('_header');?>
      <?php $this->load->view('_menu');?>
      {yield}
      <?php $this->load->view('_footer');?>
    </div>
    
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>  