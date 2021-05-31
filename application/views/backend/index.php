<?php
	$system_name        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$system_title       =	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	$text_align         =	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;
	//$account_type       =	$this->session->userdata('login_type');
	$account_type = 'admin';
	$skin_colour        =   $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description;
	$active_sms_service =   $this->db->get_where('settings' , array('type'=>'active_sms_service'))->row()->description;
	$running_year 		=   $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
	?>
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">
<head>
	
	<title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php include 'includes_top.php';?>
	
</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  	<?php include $account_type.'/navigation.php';?>

	
		<div class="main-content">
		
			<?php include 'header.php';?>


			<?php include $account_type.'/'.$page_name.'.php';?>

			<?php include 'footer.php';?>

		</div>
		<?php //include 'chat.php';?>
 </div>       	
    <?php include 'modal.php';?>
    <?php include 'includes_bottom.php';?>
    
</body>
</html>