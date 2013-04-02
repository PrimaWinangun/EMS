<article class="module width_full">
			<header><h3>Post New News</h3></header>
			<?php if ($news == 'right')
			{ ?>
				<h4 class="alert_success">News Added Successfully</h4>
			<?php }
			if ($news == 'wrong')
			{ ?>
				<h4 class="alert_error">News Add Failed</h4>
			<?php } 
			if ($value == NULL)
			{
				$row_value['id']		= '';
				$row_value['title']		= '';
				$row_value['konten']	= '';
				$row_value['kategori']	= '';
				$row_value['tagged']	= '';
				$row_value['language']	= '';
				$row_value['publish']	= '';
				echo form_open('system/upload_news');
			}
			else
			{
				foreach ($value as $row_value) :
				{
					$row_value['id']		= $row_value['id'];
					$row_value['title']		= $row_value['title'];
					$row_value['konten']	= $row_value['konten'];
					$row_value['kategori']	= $row_value['kategori'];
					$row_value['tagged']	= $row_value['tagged'];
					$row_value['language']	= $row_value['language'];
					$row_value['publish']	= $row_value['publish'];
				} endforeach;
				echo form_open('system/update_news');
			}
			echo form_hidden('id',$row_value['id']);?>
			
				<div class="module_content">
						<fieldset>
							<label>News Title</label>
							<?php $news = array(
								  'name' => 'news',
								  'id'	 => 'news',
								  'value'=> $row_value['title']	
								);
							echo form_input($news);?>
						</fieldset>
						<fieldset>
						<script type="text/javascript" src="<?= base_url() ?>wp-admin/js/tiny_mce/tiny_mce.js"></script>
						<script type="text/javascript" src="<?= base_url() ?>wp-admin/raw/script_textarea.php"></script>
							<label>Content</label>
							<center><?php $konten = array(
								  'name'	=> 'konten',
								  'id'		=> 'konten',
								  'value'=> $row_value['konten']	
								);
							echo form_textarea($konten)?></center>
						</fieldset>
						<fieldset style="width:30%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Category</label>
							<?php $kategory = array();
								foreach ($kategori as $row_kategori) :
								{
									$kategory[$row_kategori['category']] = ($row_kategori['category']);
								} endforeach;								
								$style = 'style ="width:92%"';
							echo form_dropdown('category',$kategory,$row_value['kategori'],$style);?>
						</fieldset>
						<fieldset style="width:30%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Language</label>
							<?php $language = array(
								  'en'	=> 'English',
								  'id'	=> 'Indonesia',
								); 
								$style = 'style ="width:92%"';
							echo form_dropdown('language',$language,$row_value['language'],$style);?>
						</fieldset>
						<fieldset style="width:33%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Tags</label>
							<?php $tags = array(
								  'name'	=> 'tags',
								  'id'		=> 'tags',
								  'style'	=> 'width:90%',
								  'value'	=> $row_value['tagged']
								);
							echo form_input($tags); ?>
						</fieldset><div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<?php $publish = array(
						  'Draft'		=> 'Draft',
						  'Published'	=> 'Published'
						);
					echo form_dropdown('publish',$publish, $row_value['publish']);
					$submit = array(
							  'id'	=> 'submit',
							  'name'	=> 'submit',
							  'value'	=> 'Save',
							  'class'	=> 'alt_btn'
							);
					echo form_submit($submit)?>
				</div>
			</footer>
		</form>
		</article><!-- end of post new article -->