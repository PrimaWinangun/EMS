
<!DOCTYPE html>
<!-- saved from url=(0105)http://studiokami.com/en/wp-login.php?redirect_to=http%3A%2F%2Fstudiokami.com%2Fen%2Fwp-admin%2F&reauth=1 -->
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>Gapura Cargo › Log In</title>
	<link href="<?php echo base_url(); ?>wp-admin/css/wp-admin.css" rel="stylesheet" type="text/css" id="wp-admin-css" media="all">
	<link href="<?php echo base_url(); ?>wp-admin/css/colors-fresh.css" rel="stylesheet" type="text/css" id="wp-admin-css" media="all">
<meta name="robots" content="noindex,nofollow">
	</head>
	<body class="login">
	<div id="login">
		<h1><a href="http://wordpress.org/" title="Powered by WordPress">Gapura Cargo</a></h1>
	<?php echo form_open(); ?>
	<p><label for="user_login">Username<br>
		<?php $username = array(
		  'name'        => 'username',
		  'id'          => 'username',
		  'value'       => '',
		  'maxlength'   => '100',
		  'size'        => '20',
		  'tabindex'	=> '10',
		  'class'		=> 'input'
		);
	echo form_input($username);?></label></p>
	<label for="user_pass">Password<br>
	<p><?php $password = array(
		  'name'        => 'password',
		  'id'          => 'password',
		  'value'       => '',
		  'maxlength'   => '100',
		  'size'        => '20',
		  'tabindex'	=> '20',
		  'class'		=> 'input'
		);
	echo form_password($password);?></label></p>
	<p class="submit">
	<?php $submit = array(
		  'class'		=> 'button-primary',
		  'tabindex'	=> '100',
		  'value'		=> 'Log In'
			);
	echo form_submit($submit); ?></p>
	</form>

	
	</div>

	
		<div class="clear"></div>
	
	
	</body></html>