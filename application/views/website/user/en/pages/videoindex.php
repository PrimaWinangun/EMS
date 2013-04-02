<?php $this->load->view('website/user/en/template/head')?>
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
						<div class="middle">
						
						<ul class="breadcrumb">
						<li><?php echo anchor('home/en','Cargo-Gapura'); ?></li>
						<li><span style="color:#666666"><?php echo $title; ?></span></li>
						</ul>
						<div style="height:10px;" class="spacing"></div>
						<table>
						<tr>
						<?php 
						$i = 0;
						foreach ($konten as $row_gallery) :
						{
							if ($row_gallery['alt'] == ' ')
							{
								$row_gallery['alt'] = 'video_thumb.png';
							}
							if (($i % 4) != 0)
							{?>
							<td height="100px" align="center"> 
							<?php echo anchor($row_gallery['permalink'],img(array('src'=>"wp-content/uploads/2012/thumb/".$row_gallery['alt'], 'alt'=>$row_gallery['title'])), array('class'=>"fancybox-effects-d", 'title'=>$row_gallery['title'])); ?>
							</td>
						<?php }
							else
							{ ?>
							<tr><td height="100px" align="center"> 
							<?php echo anchor($row_gallery['permalink'],img(array('src'=>"wp-content/uploads/2012/thumb/".$row_gallery['alt'], 'alt'=>$row_gallery['title'])), array('class'=>"fancybox-effects-d", 'title'=>$row_gallery['title'])); ?>
							</td>
							<?php }
							 
						 $i++;
						} endforeach;
						
					}?>
					</tr></table>
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