<header id="header">
		<hgroup>
			<h1 class="site_title"><?php echo anchor('owner','Gapura Cargo Admin'); ?></h1>
			<h2 class="section_title"><?php echo $pages ?></h2><div class="btn_view_site"><?php echo anchor('home','Visit Site', array('target' => 'blank')); ?></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo username();?></p>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><?php echo anchor('owner','Gapura Cargo Admin'); ?><div class="breadcrumb_divider"></div> <a class="current"><?php echo $pages ?></a></article>
		</div>
	</section><!-- end of secondary bar -->