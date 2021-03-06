<article class="module width_half">
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
					<th style="width:17%">Group</th>
    				<th style="width:17%" colspan="2"><center>Actions</th> 
				</tr> 
			</thead> 
			<?php foreach ($isi as $row_isi) :
			{ ?>
			<tbody> 
				<tr> 
    				<td><?php echo $row_isi['username'];?></td> 
					<td><?php 
						if  ($row_isi['group_id'] == 1)
						{
							echo 'Admin';
						}
						if  ($row_isi['group_id'] == 2)
						{
							echo 'Editor';
						}
						if  ($row_isi['group_id'] == 100)
						{
							echo 'User';
						}?></td>
    				<td><center><?php echo anchor('system/edit_user/'.$row_isi['username'],img(array('src'=> base_url().'wp-admin/images/icn_edit.png')));?></td><td><center><?php echo anchor('system/delete_user/'.$row_isi['username'],img(array('src'=> base_url().'wp-admin/images/icn_trash.png')));?></td> 
				</tr>   
			</tbody> 
			<?php } endforeach;?>
			</table>
			</div><!-- end of #tab1 -->
						
		</div><!-- end of .tab_container -->
		<div class="clear"></div>
		</article><!-- end of content manager article -->
		
<article class="module width_half">
		<?php echo form_open('system/insert_user'); ?>
			<header><h3>Add New User</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Username </label>
							<?php $username = array(
									'name'	=> 'username',
									'id'	=> 'username',
									'style'	=> 'width:92%'
								  );
							echo form_input($username);?>
						</fieldset>
						<fieldset>
							<label>Password </label>
							<?php $password = array(
									'name'	=> 'password',
									'id'	=> 'password',
									'style'	=> 'width:92%'
								  );
							echo form_password($password);?>
						</fieldset>
						<fieldset>
							<label>Email </label>
							<?php $email = array(
									'name'	=> 'email',
									'id'	=> 'email',
									'style'	=> 'width:92%'
								  );
							echo form_input($email);?>
						</fieldset>
						<fieldset style="width:30%; float:right;">
							<label>User Group </label> <?php
								$usergroup = array(
									'1'		=> 'Admin',
									'2'		=> 'Editor',
									'100'	=> 'User'
								);
								$style = 'style="width:90%" ';
								echo form_dropdown('usergroup',$usergroup,'',$style); ?>
						</fieldset>						
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Add User" class="alt_btn">
				</div>
			</footer>
		</form>
		</article><!-- end of post new article -->
