<?php $this->load->view('website/user/en/template/head')?>
    <body class="sp en">
        <div class="page">
            <div class="content">
            <div class="leftPart">
           	<?php if ( $konten == NULL)
			{
				$title = '';
			}
			else
			{
			foreach ($konten as $row_konten) :
				{ 
					$title = $row_konten['title'];	
			 } endforeach; 
			}?>
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
						<div class="middle">
						
						<ul class="breadcrumb">
						<?php foreach ($konten as $row_konten) : { ?>
						<li><?php echo anchor('home/en','Home'); ?></li>
						<li><span style="color:#666666"><?php echo $row_konten['title']; ?></span></li>
						</ul>
						<?php } endforeach; ?>
						
						<h2 style="margin-top:5px;"><?php echo $row_konten['title'];?></h2><hr style="margin-top:-10px;" /><br/>
						<?php echo $row_konten['konten'];
					}?>
			<div class="cleaner"></div>
		</div>
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