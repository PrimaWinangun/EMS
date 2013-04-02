	<aside id="sidebar" class="column">
		<h3><?php echo anchor('owner/edit_news','News'); ?></h3>
		<ul class="toggle">
			<li class="icn_new_article"><?php echo anchor('owner/submit_news','Add News'); ?></li>
			<?php if (user_group('editor') or user_group('admin'))
			{ ?>
				<li class="icn_edit_article"><?php echo anchor('owner/edit_news','Edit News'); ?></li>
				<li class="icn_categories"><?php echo anchor('owner/categories','Categories'); ?></li>
			<?php } ?>
		</ul>
		<h3><?php echo anchor('owner/edit_page','Pages'); ?></h3>
		<ul class="toggle">
			<li class="icn_new_article"><?php echo anchor('owner/submit_page','Add Page'); ?></li>
			<?php if (user_group('editor') or user_group('admin'))
			{ ?>
				<li class="icn_edit_article"><?php echo anchor('owner/edit_page','Edit Page'); ?></li>
			<?php } ?>
		</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><?php echo anchor('owner/file_manager','Photo Manager'); ?></li>
			<li class="icn_folder"><?php echo anchor('owner/video_manager','Video Manager'); ?></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<?php if (user_group('admin'))
			{ ?>
				<li class="icn_add_user"><?php echo anchor('owner/add_user','Manage User'); ?></li>
			<?php } ?>
			<li class="icn_profile"><?php echo anchor('owner/profile','Your Profile'); ?></li>
		</ul>
		<h3>Menu</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><?php echo anchor('logout','Logout'); ?></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2012 Gapura Cargo Admin</strong></p>
			<p>Developed by <a href="http://www.studiokami.com">Bali Web Design</a></p>
		</footer>
	</aside><!-- end of sidebar -->