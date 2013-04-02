<div class="rightPage">
	<div class="trackingBox">
    <?php echo form_open(); ?>
	<!-- <form action=" " method="get" onsubmit="showPreloader();"> -->
			<div class="content">
				<h2>Shipment Tracking</h2>
				<label for="tbAWB">Shipment number</label>
                <?php 
				$text = array(
					  'name' 	=> 'number',
					  'id'	 	=> 'AWB',
					  'onfocus'	=> 'if(this.value==&#39;XXX-YYYYYYYY&#39;){this.value=&#39;&#39;}',
					  'onblur'	=> 'if(this.value==&#39;&#39;){this.value=this.defaultValue}',
					  'class'	=> 'textInput',
					  'value'	=> 'XXX-YYYYYYYY'
					);
				echo form_input($text);	
				$submit = array(
					  'type'	=> 'image',
					  'src'		=> base_url('wp-content/themes/gapura-cargo/images/hp_tb_arrow.png'),
					  'alt'		=> 'send inquiry',
					  'class'	=> 'button'
					);
				echo form_submit($submit); ?>
			</div>
		</form>
	</div>
	<div class="spacer h10"></div>
	<a href=" " class="banner branch">Network</a>
	<div class="spacer h10"></div>
	<?php echo anchor('gallery/en', 'Gallery', array('class'=>"banner video"));?>
	<div class="spacer h10"></div>
	<div class="spacer skyplusBox">
	<a href=" " class="banner skyplus">Achievement</a></div>
	<div class="spacer h10"></div>
</div>                
<div class="cleaner"></div>