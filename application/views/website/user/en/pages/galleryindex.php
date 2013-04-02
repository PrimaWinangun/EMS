<?php $this->load->view('website/user/en/template/head')?>
    <body class="sp en">
        <div class="page">
            <div class="content">
            <div class="leftPart">
				<h1>Gallery</h1>
				<div style="height:23px;"></div>
				<div class="roundedBox">
				
					<div class="top"><div class="left"></div><div class="right"></div></div>
					
						<div class="fix">
						
						<ul class="breadcrumb">
						<li><?php echo anchor('home/en','Cargo-Gapura'); ?></li>
						<li><span style="color:#666666">Gallery</span></li>
						</ul>
						<div style="height:10px;" class="spacing"></div>
						<?php echo anchor('gallery/en/video',img(array('src'=>"wp-content/themes/gapura-cargo/images/gc_video_galeri.png", 'alt'=>"video galeri")),array('class'=>'active', 'title'=>'video gallery')); ?>
						<?php echo anchor('gallery/en/photo',img(array('src'=>"wp-content/themes/gapura-cargo/images/gc_foto_galeri.png", 'alt'=>"photo galeri")),array('class'=>'active', 'title'=>'photo gallery')); ?>
						
			<div class="cleaner"></div>
		</div>
		<center><?php echo $this->pagination->create_links(); ?> </center>
		<div class="bottom"><div class="left"></div><div class="right"></div></div>
	</div>
</div>
		<?php $this->load->view('website/user/en/template/rightbar2'); ?>
</div>
    <?php $this->load->view('website/user/en/template/header') ?>
	<?php $this->load->view('website/user/en/template/footer') ?>
			<div id="preloader">Your shipment is being searched for ...</div>
		</div>
	

</body></html>