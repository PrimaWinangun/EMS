<!-- Left navigation -->
    <ul id="menu" class="nav">
        <li class="dash"><?php echo anchor('pekerja','<span>Kepegawaian</span>',array('class'=>'active'));?></li>
		<ul class="sub">
                <li <?php if(isset($view_add_pekerja)){ echo $view_add_pekerja; } ?>><?php echo anchor('pekerja/add_pegawai', 'Add Pegawai' ); ?></li>
				<li <?php if(isset($view_pensiun)){ echo $view_pensiun; } ?>><?php echo anchor('pekerja/pegawai_pensiun', 'Pensiun' ); ?></li>
				<li <?php if(isset($view_supervisor)){ echo $view_supervisor; } ?>><?php echo anchor('pekerja/get_supervisor', 'Supervisor' ); ?></li>
            </ul>
		<li class="form"><?php echo anchor('diklat','<span>Diklat</span>')?></li>
		<!-- hari libur -->
        <li class="forms"><a href="#" title="" class="exp" <?php if(isset($form_master)){ echo $form_master; } ?>>
        <span>Master</span></a>
            <ul class="sub">
                <li <?php if(isset($view_hari_libur)){ echo $view_hari_libur; } ?>><?php echo anchor('c_absensi/hari_libur', 'HARI LIBUR' ); ?></li>
                <li <?php if(isset($view_format_schedule)){ echo $view_format_schedule; } ?>><?php echo anchor('c_absensi/format_schedule', 'FORMAT SCHEDULE' ); ?></li>
                <li <?php if(isset($view_cuti_pegawai)){ echo $view_cuti_pegawai; } ?>><?php echo anchor('c_absensi/cuti_pegawai', 'CUTI PEGAWAI' ); ?></li>
                <li <?php if(isset($view_master_gaji)){ echo $view_master_gaji; } ?>><?php echo anchor('c_absensi/master_gaji', 'MASTER GAJI' ); ?></li>
            </ul>
        </li>
      <!-- absensi -->
        <li class="forms"><a href="#" title="" class="exp" <?php if(isset($form_absensi)){ echo $form_absensi; } ?>>
        <span>ABSENSI</span><strong></strong></a>
            <ul class="sub">
                <li <?php if(isset($view_schedule_pegawai)){ echo $view_schedule_pegawai; } ?>><?php echo anchor('c_absensi/schedule_pegawai', 'SCHEDULE PEGAWAI' ); ?></li>
                <li <?php if(isset($view_cuti)){ echo $view_cuti; } ?>><?php echo anchor('c_absensi/add_pakai_cuti_pegawai', 'PENGGUNAAN CUTI' ); ?></li>
                <li><?php //echo anchor('c_absensi/tarik_absensi', 'TARIK ABSENSI' ); 
						echo anchor('#', 'TARIK ABSENSI' ); 
				?></li>
                <li <?php if(isset($view_absensi)){ echo $view_absensi; } ?>><?php echo anchor('c_absensi/absensi', 'ABSENSI' ); ?></li>
            </ul>
        </li>
        
        
      <!-- Gaji -->
        <li class="forms"><a href="#" title="" class="exp" <?php if(isset($form_gaji)){ echo $form_gaji; } ?>>
        <span>GAJI</span><strong></strong></a>
            <ul class="sub">
                <li <?php if(isset($view_gaji_pegawai)){ echo $view_gaji_pegawai; } ?>><?php echo anchor('gaji/gaji_pegawai', 'GAJI PEGAWAI' ); ?></li>
                <li <?php if(isset($view_lembur_pegawai)){ echo $view_lembur_pegawai; } ?>><?php echo anchor('gaji/lembur_pegawai', 'LEMBUR PEGAWAI' ); ?></li>
            </ul>
			
        </li>
    </ul>
	
</div>