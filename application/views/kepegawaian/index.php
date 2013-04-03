<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <?php $this->load->view('template/head') ?>

<body>

<!-- Left side content -->
<div id="leftSide">
    <div class="logo"><a href=""><img src="<?php echo base_url()?>images/logo.png" alt="" /></a></div>
    
    <div class="sidebarSep mt0"></div>
    
    
    <?php 
	$this->load->view('template/navigation') ?>


<!-- Right side -->
<div id="rightSide">
	<!-- Top fixed navigation -->
    <?php $this->load->view('template/fixed_nav') ?>
    
    <!-- Title area -->
    <?php $this->load->view('template/title_area'); ?>
    
    <div class="line"></div>
    
    <!-- Page statistics and control buttons area 
    <?php $this->load->view('kepegawaian/template/statistic'); ?>
    
    <div class="line"></div>-->
    
    <!-- Main content wrapper -->
    <div class="wrapper">
    
		<?php 
		if ($page == 'Pegawai')
		{
			$this->load->view('kepegawaian/page/karyawan');
		}else
		if ($page == 'Data Perorangan')
		{
			$this->load->view('kepegawaian/page/data_pribadi');
		}else
		if ($page == 'Search Result')
		{
			$this->load->view('kepegawaian/page/karyawan');
		}else
		if ($page == 'Data Pensiun')
		{
			$this->load->view('kepegawaian/page/pensiun');
		}else
		if ($page == 'Data Supervisor')
		{
			$this->load->view('kepegawaian/page/supervisor');
		}
		// -------- submit data karyawan ---------------//
		else 
		if ($page == 'Input Data Diri')
		{
			$this->load->view('kepegawaian/page/submit/submit_data_pribadi');
		} else 
		if ($page == 'Input Data Pasangan')
		{
			$this->load->view('kepegawaian/page/submit/submit_data_pasangan');
		} else 
		if ($page == 'Input Data Ortu')
		{
			$this->load->view('kepegawaian/page/submit/submit_data_ortu');
		} else 
		if ($page == 'Input Data Mertua')
		{
			$this->load->view('kepegawaian/page/submit/submit_data_mertua');
		}
		//--------- edit data karyawan ---------------//
		else
		if ($page == 'Edit Data Diri')
		{
			$this->load->view('kepegawaian/page/edit/edit_data_pribadi');
		}else
		if ($page == 'Edit Data Alamat')
		{
			$this->load->view('kepegawaian/page/edit/edit_data_alamat');
		}else
		if ($page == 'Edit Data Pasangan')
		{
			$this->load->view('kepegawaian/page/edit/edit_data_pasangan');
		}else
		if ($page == 'Edit Data Ortu')
		{
			$this->load->view('kepegawaian/page/edit/edit_data_ortu');
		}else
		if ($page == 'Edit Data Mertua')
		{
			$this->load->view('kepegawaian/page/edit/edit_data_mertua');
		}else
		if ($page == 'Edit Data Anak')
		{
			$this->load->view('kepegawaian/page/edit/edit_data_anak');
		}else
		if ($page == 'Edit Data Jabatan')
		{
			$this->load->view('kepegawaian/page/edit/edit_data_jabatan');
		}else
		if ($page == 'Edit Data Pendidikan')
		{
			$this->load->view('kepegawaian/page/edit/edit_data_pendidikan');
		}else
		if ($page == 'Add Data Anak')
		{
			$this->load->view('kepegawaian/page/add/add_data_anak');
		}else
		if ($page == 'Add Data Bahasa')
		{
			$this->load->view('kepegawaian/page/add/add_data_bahasa');
		}else
		//--------- delete data karyawan ---------------//
		if ($page == 'Delete Pegawai')
		{
			$this->load->view('kepegawaian/page/delete/delete_pegawai');
		}
		?>
		
	</div>
    <!-- Footer line -->
    <div id="footer">
        <div class="wrapper">Studio Kami</a></div>
    </div>

</div>

<div class="clear"></div>

</body>
</html>