<div class="rightPart">
	<div class="newsBox">
		<h2><a href="#">Berita Utama</a></h2>
		<div class="content">
       	  <ul>


			<?php foreach ($news as $row_news) :
			{ 
				if(strlen($row_news['konten']) > 25)
				{
					$text = substr($row_news['konten'],0,50) . "...";
				}?>
            <li><?php echo anchor('news/'.$row_news['language'].'/'.$row_news['kategori'].'/'.$row_news['permalink'].'/'.$row_news['id'],$row_news['title']); ?><br /><small><?php echo strip_tags($text, '<p><a><img><h1><h2><h3><h4><h5><h6><blockquote><ol><ul><li><em><strong><del>'); ?></small><br /></li>
           	<?php } endforeach;?>
		  </ul>
        </div>
	</div>
	<div class="spacer h10"></div>
    
	<div class="skyplusBox">
	<a href="#" class="banner skyplus">Achievement</a>	</div>
</div>
<div class="cleaner"></div>
</div>