<div class="header">
    <?php echo anchor('home/id',img(array('src'=>"wp-content/themes/ems/images/logo.png", 'width'=>"176", 'height'=>"56", 'alt'=>'EMS Logo')),array('class'=>'logo')); ?>
	<ul class="menu">
		<li><?php echo anchor('home/id','Home'); ?></li>
		<li><?php echo anchor('page/id/profil-perusahaan','Profil Perusahaan'); ?></li>
		<li><?php echo anchor('page/id/produk','Produk'); ?></li>
		<li><?php echo anchor('page/id/layanan','Layanan'); ?></li>
		<li><?php echo anchor('page/id/pelanggan','Pelanggan'); ?></li>
		<li><?php echo anchor('page/id/daftar-harga','Daftar Harga'); ?></li>
		<li><?php echo anchor('home/id/kontak','Kontak'); ?></li>
		<li><?php echo anchor('pekerja/index','LogIn EMS'); ?></li>
		
    </ul>
	
    <span class="langMenuLabel"></span>
	<div class="langMenu">
		<ul>
			
        	<li><?php echo anchor('home/en',img(array('src'=>"wp-content/themes/ems/images/en.png", 'alt'=>"en")).'EN',array('class'=>'active', 'title'=>'english')); ?></li>
            <li class="active"><?php echo anchor('home/id',img(array('src'=>"wp-content/themes/ems/images/id.png", 'alt'=>"id")).'ID',array('title'=>'indonesia')); ?></li>
        </ul>
	</div>
</div>