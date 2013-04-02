<!-- Left navigation -->
    <ul id="menu" class="nav">
        <li class="dash"><?php echo anchor('pekerja','<span>Kepegawaian</span>');?></li>
		<li class="form"><?php echo anchor('diklat','<span>Diklat</span>')?></li>
		<!-- hari libur -->
        <li class="forms"><?php echo anchor('c_absensi/hari_libur','<span>MASTER</span>')?></a>
        </li>
      <!-- absensi -->
        <li class="forms"><?php echo anchor('c_absensi/schedule_pegawai','<span>ABSENSI</span>')?><strong></strong></a>
            
        </li>
        
        
      <!-- Gaji -->
        <li class="forms"><a href="#" title="" class="exp" <?php if(isset($form_gaji)){ echo $form_gaji; } ?>>
        <span>GAJI</span><strong></strong></a>
            <ul class="sub">
                <li <?php if(isset($view_gaji_pegawai)){ echo $view_gaji_pegawai; } ?>><?php echo anchor('c_absensi/gaji_pegawai', 'GAJI PEGAWAI' ); ?></li>
                <li <?php if(isset($view_lembur_pegawai)){ echo $view_lembur_pegawai; } ?>><?php echo anchor('c_absensi/lembur_pegawai', 'LEMBUR PEGAWAI' ); ?></li>
            </ul>
			
        </li>
    </ul>
	
</div>