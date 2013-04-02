<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gaji extends Application {

	// loading the database
	public function __construct()
    {
        parent::__construct();
		$this->load->model('m_gaji');
		$this->load->model('m_asset');
		$this->ag_auth->restrict('user');
    }
	
	/*
	======================================================================================================
	 FUNCTION MASTER GAJI 
	======================================================================================================
	*/
	
	function master_gaji()
	{
		$data['showdata'] = $this->m_asset->ambil_data_master_gaji();
		$data['page'] = 'master_gaji';		
		$data['view_gaji'] = 'class="this"';
		$data['form_master'] = 'id="current"';
		$this->load->view('gaji/index',$data);
	}
	function add_gaji()
	{
		$data['page'] = 'add_gaji';		
		$data['add_gaji'] = 'class="this"';
		$data['form_master'] = 'id="current"';
		$this->load->view('gaji/index',$data);
	}
	function edit_gaji($id)
	{
		$data['showdata'] = $this->m_asset->ambil_data_master_gaji_by_id($id);
		$data['page'] = 'edit_gaji';		
		$data['edit_gaji'] = 'class="this"';
		$data['form_master'] = 'id="current"';
		$this->load->view('gaji/index',$data);
	}
	function delete_gaji($id)
	{
		$this->m_asset->delete_gaji($id);
		redirect('gaji/master_gaji');
	}
	function submit_gaji()
	{
		if($this->input->post('submit_gaji_add'))
		{
			$grade = $this->input->post('grade');  
			$min = $this->input->post('min');  
			$max = $this->input->post('max');  
			$update_by = "admin";
			$result = $this->m_asset->add_gaji($grade, $min, $max, $update_by);
			redirect ('gaji/master_gaji');
		}
		if($this->input->post('submit_gaji_edit'))
		{
			$result = $this->m_asset->edit_gaji();
			redirect ('gaji/master_gaji');
		}
	}
	
	/*
	======================================================================================================
	 FUNCTION PENGGAJIAN
	======================================================================================================
	*/
	
	function gaji_pegawai()
	{	
		//ambil data unit
		$data['showdata'] = $this->m_asset->ambil_data_unit();
		$data['page'] = 'gaji_pegawai';		
		$data['view_gaji_pegawai'] = 'class="this"';
		$data['form_gaji'] = 'id="current"';
		$this->load->view('gaji/index',$data);
	}
	
	function add_penggajian()
	{
		//ambil data unit
		$data['showdata'] = $this->m_asset->ambil_data_unit();
		$data['page'] = 'add_gaji_peg';		
		$data['add_gaji_peg'] = 'class="this"';
		$data['form_gaji'] = 'id="current"';
		$this->load->view('gaji/index',$data);	
	}
	
	function view_detail_penggajian()
	{	
		//ambil data unit
		$id=$this->uri->segment(3);
		$data['showdata'] = $this->m_asset->ambil_data_penggajian_by_id($id); 
		$show = $data['showdata'];
		foreach ($show as $row){}
		$data['terbilang']= $this->terbilang($row['pgj_terima']);
		$data['month']=	$this->namabulan($this->uri->segment(4));
		$data['year']=$this->uri->segment(5);
		$data['penerimaan'] = $row['pgj_terima'];
		$data['page'] = 'view_detail_gaji_peg';		
		$data['view_detail_gaji_peg'] = 'class="this"';
		$data['form_gaji'] = 'id="current"';
		$this->load->view('gaji/index',$data);
	}
	
	
	function edit_penggajian()
	{
		//ambil data unit
		$id=$this->uri->segment(3);
		$data['showdata'] = $this->m_asset->ambil_data_penggajian_by_id($id); 
		$show = $data['showdata'];
		foreach ($show as $row){};
		$data['penerimaan'] = $row['pgj_terima'];
		$data['page'] = 'edit_gaji_peg';		
		$data['edit_gaji_peg'] = 'class="this"';
		$data['form_gaji'] = 'id="current"';
		$this->load->view('gaji/index',$data);	
	}
	
	function submit_penggajian()
	{	
		if ($this->input->post('submit_penggajian_view')){
		
			$unit = $this->input->post('unit'); //unit_code
			$month = $this->input->post('month');
			$year = $this->input->post('year'); 
			$id_pegawai = $this->input->post('nipp'); //id_pegawai
			$data['page'] = 'view_gaji_peg';		
			$data['view_gaji_peg'] = 'class="this"';
			$data['form_gaji'] = 'id="current"';
			$data['showdata'] = $this->m_asset->ambil_data_penggajian($unit,$id_pegawai,$month,$year); 
			
			$this->load->view('gaji/index',$data);
		
		} else
		{
			$terima=  $this->input->post('gaji_bruto') + $this->input->post('pembulatan') + $this->input->post('koreksi') + $this->input->post('insentive') - $this->input->post('potongan');
			
			if($this->input->post('submit_penggajian_add'))
			{
				$data = array(
					'pgj_id_peg' => $this->input->post('nipp'),
					'pgj_gaji_bruto' => $this->input->post('gaji_bruto'),
					'pgj_masa_bakti' => $this->input->post('masa_bakti'),
					'pgj_koreksi' => $this->input->post('koreksi'),
					'pgj_insentive' => $this->input->post('insentive'),
					'pgj_potongan' => $this->input->post('potongan'),
					'pgj_pembulatan' => $this->input->post('pembulatan'),
					'pgj_terima' => $terima,
					'pgj_bulan' => $this->input->post('month'),
					'pgj_tahun' => $this->input->post('year'),
					'pgj_update_by' =>"admin",
				);
				$check = $this->m_asset->add_penggajian($data);
				redirect('gaji/gaji_pegawai');
			}
			if($this->input->post('submit_penggajian_edit'))
			{
				$data = array(
					'pgj_id_peg' => $this->input->post('id_peg'),
					'pgj_gaji_bruto' => $this->input->post('gaji_bruto'),
					'pgj_masa_bakti' => $this->input->post('masa_bakti'),
					'pgj_koreksi' => $this->input->post('koreksi'),
					'pgj_insentive' => $this->input->post('insentive'),
					'pgj_potongan' => $this->input->post('potongan'),
					'pgj_pembulatan' => $this->input->post('pembulatan'),
					'pgj_terima' => $terima,
					'pgj_bulan' => $this->input->post('month'),
					'pgj_tahun' => $this->input->post('year'),
					'pgj_update_by' =>"admin",
				);
				$id_pgj= $this->input->post('id_pgj');
				$check = $this->m_asset->edit_penggajian($data,$id_pgj);
				redirect('gaji/gaji_pegawai');
			}
		}
		
	}
}
