<?php $this->load->view('website/admin/template/head'); ?>


<body>

	<?php $this->load->view('website/admin/template/header'); ?>
	<?php $this->load->view('website/admin/template/sidebar'); ?>
	
	<section id="main" class="column">
				
		<div class="clear"></div>
		<?php
		if ($pages == 'Member Area')
		{
			$this->load->view('website/admin/template/content/messages');
		}
		if ($pages == 'Add News')
		{
			$this->load->view('website/admin/template/content/add_news');
		}
		if ($pages == 'Add Page')
		{
			$this->load->view('website/admin/template/content/add_page');
		}
		if ($pages == 'User Manager')
		{
			$this->load->view('website/admin/template/content/add_user');
		}
		if ($pages == 'News')
		{
			$this->load->view('website/admin/template/content/content_manager');
		}
		if ($pages == 'Pages')
		{
			$this->load->view('website/admin/template/content/page');
		}
		if ($pages == 'Categories')
		{
			$this->load->view('website/admin/template/content/categories');
		}
		if ($pages == 'Profile')
		{
			$this->load->view('website/admin/template/content/profile');
		}
		if ($pages == 'File Manager')
		{
			$this->load->view('website/admin/template/content/file_manager');
		}
		if ($pages == 'Video Manager')
		{
			$this->load->view('website/admin/template/content/video_manager');
		}
		?>
		
		<div class="spacer"></div>
	</section>


</body>

</html>
