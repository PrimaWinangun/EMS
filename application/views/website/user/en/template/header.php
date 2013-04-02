<div class="header">
    <?php echo anchor('home/en',img(array('src'=>"wp-content/themes/ems/images/logo.png", 'width'=>"176", 'height'=>"56", 'alt'=>'Gapura Cargo Logo')),array('class'=>'logo')); ?>
	<ul class="menu">
		<li><?php echo anchor('home/en','Home'); ?></li>
		<li><?php echo anchor('page/en/company-profile','Company Profile'); ?></li>
		<li><?php echo anchor('page/en/products','Products'); ?></li>
		<li><?php echo anchor('page/en/services','Services'); ?></li>
		<li><?php echo anchor('page/en/costumers','Costumers'); ?></li>
		<li><?php echo anchor('page/en/price-list','Price List'); ?></li>
		<li><?php echo anchor('home/en/contact-us','Contact Us'); ?></li>
		<li><?php echo anchor('pekerja/index','LogIn EMS'); ?></li>
    </ul>
	
    <span class="langMenuLabel"></span>
	<div class="langMenu">
		<ul>
			
        	<li class="active"><?php echo anchor('home/en',img(array('src'=>"wp-content/themes/ems/images/en.png", 'alt'=>"en")).'EN',array('class'=>'active', 'title'=>'english')); ?></li>
            <li><?php echo anchor('home/id',img(array('src'=>"wp-content/themes/ems/images/id.png", 'alt'=>"id")).'ID',array('title'=>'indonesia')); ?></li>
        </ul>
	</div>
</div>