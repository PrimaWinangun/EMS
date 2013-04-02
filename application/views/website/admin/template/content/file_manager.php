<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">File Manager</h3>
		<ul class="tabs">
   			<li><a href="#tab1">File</a></li>
		</ul>
		</header>
		<?php 
		$datestring = "%Y" ;
		$time = time();
		$tanggal = mdate($datestring, $time);  ?>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th style="width:30%">File Name</th> 
					<th>Permalink</th>
					<th style="width:10%">Gallery</th>
					<?php if (user_group('editor') or user_group('admin')) { ?>
						<th style="width:10%">Actions</th> 
					<?php } ?>
				</tr> 
			</thead> 
			<?php foreach ($isi as $row_isi) :
			{ ?>
			<tbody> 
				<tr> 
    				<td><?php echo $row_isi['title'];?></td>
					<td><?php echo $row_isi['permalink']; ?></td>
					<td><?php 
					if ($row_isi['gallery'] != '0') 
					{
						echo $row_isi['gallery']; 
					} else
					{
						echo 'no';
					}?></td>
					<?php if (user_group('editor') or user_group('admin')) { ?>					
    				<td><center><?php echo anchor('system/delete_file/'.$row_isi['id'].'/foto',img(array('src'=> base_url().'wp-admin/images/icn_trash.png'))) ?></center></td>
					<?php } ?>					
				</tr>   
			</tbody> 
			<?php } endforeach;?>
			</table>
			</div><!-- end of #tab1 -->
			<footer>
				<div class="submit_link">
					<center><?php echo $this->pagination->create_links(); ?> </center>
				</div>
			</footer>
		
		</div><!-- end of .tab_container -->
		<div class="clear"></div>
		</article><!-- end of content manager article -->
		
<article class="module width_quarter">
		<?php echo form_open_multipart('system/upload_file'); ?>
			<header><h3>Add New Picture</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Title </label>
							<?php $username = array(
									'name'	=> 'file',
									'id'	=> 'file',
									'style'	=> 'width:86%'
								  );
							echo form_input($username);?>
						</fieldset>
						<fieldset>
							<label>Foto</label>
							<?php $foto = array(
								  'id'	  =>'foto',
								  'name'    => 'foto',
								  'style'	=> 'margin-left:2%',
								);
							echo form_upload($foto);?> <br/><br/><div style = "margin-left:2%"><b>supported files gif | jpg | jpeg | png <br/>(maks 1024KB)</div>
						</fieldset>					
						<fieldset>
						<?php $data = array(
								  'name'        => 'gallery',
								  'id'          => 'gallery',
								  'value'       => 'yes',
								  'checked'     => FALSE,
								  'style'       => 'margin:10px',
								);
							echo form_checkbox($data); ?> Insert Into Gallery
						</fieldset>							
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Add Picture" class="alt_btn">
				</div>
			</footer>
		</form>
		</article><!-- end of post new article -->
