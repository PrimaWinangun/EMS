<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Gapura Cargo</title>
        
	<!-- css template -->
	<link href="<?php echo base_url(); ?>wp-content/themes/ems/css/template.css" rel="stylesheet" type="text/css" media="screen">
	<link href="<?php echo base_url(); ?>wp-content/themes/ems/css/print.css" rel="stylesheet" type="text/css" media="print">
	<link href="<?php echo base_url(); ?>wp-content/themes/ems/css/slideshow.css" rel="stylesheet" type="text/css" media="screen">

	<!-- jQuery and javascript -->
	<script type="text/javascript" src="<?php echo base_url() ?>wp-content/themes/ems/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wp-content/themes/ems/js/easySlider1.5.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wp-content/themes/ems/js/scripts.js"></script>
	
	<?php if ($this->uri->segment(1) == 'gallery') {?>
	<!-- Add jQuery library -->
	<script type="text/javascript" src="<?php echo base_url() ?>wp-content/themes/ems/js/lib/jquery-1.8.0.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url() ?>wp-content/themes/ems/js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url() ?>wp-content/themes/ems/js/source/jquery.fancybox.js?v=2.1.0"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>wp-content/themes/ems/css/jquery.fancybox.css?v=2.1.0" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>wp-content/themes/ems/css/jquery.fancybox-buttons.css?v=1.0.3" />
	<script type="text/javascript" src="<?php echo base_url() ?>wp-content/themes/ems/js/source/helpers/jquery.fancybox-buttons.js?v=1.0.3"></script>

	<!-- Script-->
	<script type="text/javascript" src="<?php echo base_url(); ?>wp-content/themes/ems/raw/script.php"></script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
	<?php } ?>
</head>