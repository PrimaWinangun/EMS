<?php $this->load->view('website/user/id/template/head')?>
    <body class="sp en">
        <div class="page">
            <div class="content">
            <div class="leftPart">
				<h1><?php echo $title; ?></h1>
				<div style="height:23px;"></div>
				<div class="roundedBox">
				
					<div class="top"><div class="left"></div><div class="right"></div></div>
					<?php 
					if ($konten == NULL)
					{ ?>
					<div class="fix">
						<?php echo 'There is no such page exist'; ?>
					<?php }
					else
					{ ?>
						<div class="fix">
						
						<ul class="breadcrumb">
						<li><?php echo anchor('home/id','Cargo-Gapura'); ?></li>
						<li><span style="color:#666666"><?php echo $title; ?></span></li>
						</ul>
						<div style="height:10px;" class="spacing"></div>
						<?php 
						$i = 0;
						foreach ($konten as $row_gallery) :
						{ ?>
							<center><b><h2> <?php echo $row_gallery['title']; ?> </b></h2></center>
							<br/>
							<center><?php echo $row_gallery['filename']; ?></center>
							 
						<?php $i++;
						} endforeach;
						
					}?>
			<div class="cleaner"></div>
		</div>
		<center><?php echo $this->pagination->create_links(); ?> </center>
		<div class="bottom"><div class="left"></div><div class="right"></div></div>
	</div>
</div>
		<?php $this->load->view('website/user/id/template/rightbar2'); ?>
</div>
    <?php $this->load->view('website/user/id/template/header') ?>
	<?php $this->load->view('website/user/id/template/footer') ?>
			<div id="preloader">Your shipment is being searched for ...</div>
		</div>
	

</body></html>