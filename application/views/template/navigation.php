<!-- Left navigation -->
    <ul id="menu" class="nav">
	<?php if (isset($page_karyawan)){$page_karyawan = 'current';} else {$page_karyawan = '';}?>
        <li class="ui"><?php echo anchor('pekerja','<span>Kepegawaian</span>',array('class'=>'exp', 'title'=>'', 'id'=>$page_karyawan));?>
		<ul class="sub">
				 <li <?php if(isset($view_pekerja)){ echo $view_pekerja; } ?>><?php echo anchor('pekerja/', 'List Pegawai' ); ?></li>
                <li <?php if(isset($view_add_pekerja)){ echo $view_add_pekerja; } ?>><?php echo anchor('pekerja/add_pegawai', 'Add Pegawai' ); ?></li>
				<li <?php if(isset($view_pensiun)){ echo $view_pensiun; } ?>><?php echo anchor('pekerja/pegawai_pensiun', 'Pensiun' ); ?></li>
				<li <?php if(isset($view_supervisor)){ echo $view_supervisor; } ?>><?php echo anchor('pekerja/get_supervisor', 'Supervisor' ); ?></li>
            </ul>
		</li>
	<?php if (isset($page_diklat)){$page_diklat = 'current';} else {$page_diklat = '';}?>
	<li class="charts"><?php echo anchor('diklat','<span>Diklat</span>', array('class'=>'exp', 'title'=>'', 'id'=>$page_diklat))?>
		<ul class="sub">
                <li <?php if(isset($view_stkp)){ echo $view_stkp; } ?>><?php echo anchor('diklat/get_stkp','Report STKP');?></li>
				<li <?php if(isset($view_nstkp)){ echo $view_nstkp; } ?>><?php echo anchor('diklat/get_non_stkp', 'Report Non STKP' ); ?></li>
				<li <?php if(isset($view_input_stkp)){ echo $view_input_stkp; } ?>><?php echo anchor('diklat/input_stkp_bulanan/part_one', 'Input Training Bulanan' ); ?></li>
            </ul></li>
		<!-- hari libur -->
        <li class="dash"><a href="#" title="" class="exp" <?php if(isset($form_master)){ echo $form_master; } ?>>
        <span>Master</span></a>
            <ul class="sub">
                <li <?php if(isset($view_hari_libur)){ echo $view_hari_libur; } ?>><?php echo anchor('c_absensi/hari_libur', 'HARI LIBUR' ); ?></li>
                <li <?php if(isset($view_format_schedule)){ echo $view_format_schedule; } ?>><?php echo anchor('c_absensi/format_schedule', 'FORMAT SCHEDULE' ); ?></li>
                <li <?php if(isset($view_cuti_pegawai)){ echo $view_cuti_pegawai; } ?>><?php echo anchor('c_absensi/cuti_pegawai', 'CUTI PEGAWAI' ); ?></li>
                <li <?php if(isset($view_master_gaji)){ echo $view_master_gaji; } ?>><?php echo anchor('c_absensi/master_gaji', 'MASTER GAJI' ); ?></li>
            </ul>
        </li>
      <!-- absensi -->
        <li class="files"><a href="#" title="" class="exp" <?php if(isset($form_absensi)){ echo $form_absensi; } ?>>
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
        <li class="widgets"><a href="#" title="" class="exp" <?php if(isset($form_gaji)){ echo $form_gaji; } ?>>
        <span>GAJI</span><strong></strong></a>
            <ul class="sub">
                <li <?php if(isset($view_gaji_pegawai)){ echo $view_gaji_pegawai; } ?>><?php echo anchor('gaji/gaji_pegawai', 'GAJI PEGAWAI' ); ?></li>
                <li <?php if(isset($view_lembur_pegawai)){ echo $view_lembur_pegawai; } ?>><?php echo anchor('gaji/lembur_pegawai', 'LEMBUR PEGAWAI' ); ?></li>
            </ul>
			
        </li>
    </ul>
	
</div>