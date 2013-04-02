<?php $this->load->view('website/user/id/template/head')?>
<body class="hp en">
<div class="page">
	<div class="content">
	<div class="leftPart">
	<div class="rotator">
		<div class="photo" style="width: 740; height: 320">
		<div id="slider" class="slider photo" style="width: 740; height: 320">
		<ul>
            <li><?php echo img(array('src'=>"wp-content/uploads/2012/(3)photo_072.jpg", 'width'=>"740", 'height'=>"320", 'alt'=>"", 'id'=>"img62162")); ?></li>
            <li><?php echo img(array('src'=>"wp-content/uploads/2012/(3)photo_19.jpg", 'width'=>"740", 'height'=>"320", 'alt'=>"", 'id'=>"img62162")); ?></li>
            <li><?php echo img(array('src'=>"wp-content/uploads/2012/(3)photo_06.jpg", 'width'=>"740", 'height'=>"320", 'alt'=>"", 'id'=>"img62162")); ?></li>
            <li><?php echo img(array('src'=>"wp-content/uploads/2012/(3)photo_041.jpg", 'width'=>"740", 'height'=>"320", 'alt'=>"", 'id'=>"img62162")); ?>
        </ul>
    	</div>
	</div>
	<div class="info">
        <div id="title0" class="slideShowTitle"><h2>Keselamatan dan Keamanan Adalah Yang Utama</h2></div>
        <div id="title1" class="slideShowTitle"><h2>Fokus Terhadap Pelanggan</h2></div>
        <div id="title2" class="slideShowTitle"><h2>Integritas</h2></div>
        <div id="title3" class="slideShowTitle"><h2>Produktivitas Tinggi</h2></div>
        <div id="title4" class="slideShowTitle"><h2>Peduli Terhadap SDM</h2></div>
	</div>
</div>
<div class="spacer h20"></div>
	<div class="trackingBox fLeft mr09">
		<?php echo form_open(); ?>
			<div class="content">
				<h2>Shipment Tracking</h2>
				<label for="tbAWB">AWB no.</label>
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
	<a href="#" class="banner branch fLeft mr09">Cabang</a>
	<?php echo anchor('gallery/id', 'Gallery', array('class'=>"banner video fRight"));?>
	<div class="cleaner"></div>
</div>

<?php $this->load->view('website/user/id/template/rightbar') ?>

<?php $this->load->view('website/user/id/template/header') ?>
			
<?php $this->load->view('website/user/id/template/footer') ?>


</div>
</div>
</body>
</html>