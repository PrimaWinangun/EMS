<article class="module width_full">
		<header><h3 class="tabs_involved">User Manager</h3>
		<ul class="tabs">
   			<li><a href="#tab1">User</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th>Username</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<?php foreach ($isi as $row_isi) :
			{ ?>
			<tbody> 
				<tr> 
    				<td><?php echo $row_isi['username'];?></td> 
    				<td><input type="image" src="<?php echo base_url(); ?>wp-admin/images/icn_edit.png" title="Edit"><input type="image" src="<?php echo base_url(); ?>wp-admin/images/icn_trash.png" title="Trash"></td> 
				</tr>   
			</tbody> 
			<?php } endforeach;?>
			</table>
			</div><!-- end of #tab1 -->
						
		</div><!-- end of .tab_container -->
		<div class="clear"></div>
		</article><!-- end of content manager article -->
		
		<div class="clear"></div>