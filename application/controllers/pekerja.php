<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pekerja extends Application {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('kepegawaian/kepegawaian');
		$this->load->library('table');
		$this->load->library('form_validation');
		$this->ag_auth->restrict('user');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		#pagination config
		$config['base_url'] = base_url().'index.php/pekerja/index/'; //set the base url for pagination
		$config['total_rows'] = $this->kepegawaian->countPegawai(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		#data preparing
		$data['pegawai'] = $this->kepegawaian->get_data_pegawai($config['per_page'],$page);
		$data['list_unit'] = $this->kepegawaian->get_list_unit();
		$data['page'] = 'Pegawai';
		$data['view_pekerja'] = 'class="this"';
		$data['page_karyawan'] = 'yes';
		#calling view
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function pegawai_pensiun()
	{
		$datestring = "%Y" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		
		$type = '52';
		$limit = '100';
		
		#pagination config
		$config['base_url'] = base_url().'index.php/pekerja/pegawai_pensiun/'; //set the base url for pagination
		$config['total_rows'] = $this->kepegawaian->countPegawaiPensiun($tanggal,$type, $limit); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		#data preparing
		$data['pegawai'] = $this->kepegawaian->get_data_pegawai_pensiun($config['per_page'],$page, $tanggal, $type, $limit);
		$data['page'] = 'Data Pensiun';
		$data['tanggal'] = $tanggal;
		$data['type'] = 'ALL';
		$data['view_pensiun'] = 'class="this"';
		$data['page_karyawan'] = 'yes';
		#calling view
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function sort_jenis_pegawai()
	{
		if ($this->input->post('jenis')==NULL)
		{
			$type = $this->uri->segment(3);
		}else{
			$type = $this->input->post('jenis');
		}
		#pagination config
		$config['base_url'] = base_url().'index.php/pekerja/sort_jenis_pegawai/'.$type.'/'; //set the base url for pagination
		$config['total_rows'] = $this->kepegawaian->count_jenis_Pegawai($type); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['pegawai'] = $this->kepegawaian->get_data_jenis_pegawai($config['per_page'],$page,$type);
		$data['list_unit'] = $this->kepegawaian->get_list_unit();
		$data['page'] = 'Pegawai';
		$data['page_karyawan'] = 'yes';
		
		#calling view
		if ($type=='all')
		{
			redirect('pekerja/index');
		}else{
			$this->load->view('kepegawaian/index',$data);
		}
	}
	
	public function get_supervisor()
	{
		#pagination config
		$config['base_url'] = base_url().'index.php/pekerja/get_supervisor/'; //set the base url for pagination
		$config['total_rows'] = $this->kepegawaian->count_supervisor(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['supervisor'] = $this->kepegawaian->get_supervisor($config['per_page'],$page);
		//print_r($data['supervisor']);
		$data['page'] = 'Data Supervisor';
		$data['view_supervisor'] = 'class="this"';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function sort_tahun_pensiun()
	{
		if ($this->input->post('tahun')==NULL)
		{
			$tanggal = $this->uri->segment(3);
		}else{
			$tanggal = $this->input->post('tahun');
		}
		if ($this->input->post('jenis')==NULL)
		{
			$type = $this->uri->segment(4);
		}else{
			$type = $this->input->post('jenis');
		}
		
		if ($type === 'ALL')
		{
			$jenis = '55';
			$limit = '100';
		}else
		if ($type === 'MPP')
		{
			$jenis = '54';
			$limit = '56';
		}else
		if ($type === 'Pensiun')
		{
			$jenis = '55';
			$limit = '57';
		}else
		if ($type === 'PPB')
		{
			$jenis = '52';
			$limit = '54';
		}
		
		//print_r($type);print_r($jenis);print_r($limit);
		#pagination config
		$config['base_url'] = base_url().'index.php/pekerja/sort_tahun_pensiun/'.$tanggal.'/'.$type.'/'; //set the base url for pagination
		$config['total_rows'] = $this->kepegawaian->countPegawaiPensiun($tanggal, $jenis, $limit); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 5; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		
		#data preparing
		$data['pegawai'] = $this->kepegawaian->get_data_pegawai_pensiun($config['per_page'],$page, $tanggal, $jenis, $limit);
		$data['tanggal'] = $tanggal;
		$data['type']	 = $type;
		$data['page'] = 'Data Pensiun';
		$data['page_karyawan'] = 'yes';
		$data['view_pensiun'] = 'class="this"';
		
		#calling view
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function sort_unit_pegawai()
	{
		if ($this->input->post('unit') == NULL )
		{
			$unit = str_replace('%20',' ',$this->uri->segment(3));
		}else{
			$unit = $this->input->post('unit');
		}
		#pagination config
		$config['base_url'] = base_url().'index.php/pekerja/sort_unit_pegawai/'.$unit.'/'; //set the base url for pagination
		$config['total_rows'] = $this->kepegawaian->count_unit_Pegawai($unit); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['pegawai'] = $this->kepegawaian->get_data_unit_pegawai($config['per_page'], $page, $unit);
		$data['list_unit'] = $this->kepegawaian->get_list_unit();
		$data['page'] = 'Pegawai';
		$data['page_karyawan'] = 'yes';
		
		#calling view
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function delete_pegawai()
	{
		$data['NIPP'] = $this->uri->segment(3);
		$data['page'] = 'Delete Pegawai';
		$data['page_karyawan'] = 'yes';
		
		$this->load->view('kepegawaian/index', $data);
	}
	
	public function search_pegawai()
	{
		if ($this->input->post('search') == NULL )
		{
			$search_data = str_replace('%20',' ',$this->uri->segment(3));
		}else{
			$search_data = $this->input->post('search');
		}
		
		#pagination config
		$config['base_url'] = base_url().'index.php/pekerja/search_pegawai/'.$search_data.'/'; //set the base url for pagination
		$config['total_rows'] = $this->kepegawaian->count_search_Pegawai($search_data); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['pegawai'] = $this->kepegawaian->search_data_pegawai($config['per_page'], $page, $search_data);
		$data['list_unit'] = $this->kepegawaian->get_list_unit();
		$data['page'] = 'Search Result';
		$data['page_karyawan'] = 'yes';
		
		#calling view
		$this->load->view('kepegawaian/index', $data);
	}
	// FUNGSI PENGAMBILAN DATA PEGAWAI //
	public function get_pegawai($nipp)
	{
		#retrieve data
		$data['page'] = 'Data Perorangan';
		$data['pegawai'] = $this->kepegawaian->get_data_pegawai_by_nipp($nipp);
		$data['data_agama'] = $this->kepegawaian->get_detail_pegawai_agama($nipp);
		$data['data_alamat'] = $this->kepegawaian->get_detail_pegawai_alamat($nipp);
		$data['data_ayah'] = $this->kepegawaian->get_detail_pegawai_ayah($nipp);
		$data['data_bahasa'] = $this->kepegawaian->get_detail_pegawai_bahasa($nipp);
		$data['data_fisik'] = $this->kepegawaian->get_detail_pegawai_fisik($nipp);
		$data['data_ibu'] = $this->kepegawaian->get_detail_pegawai_ibu($nipp);
		$data['data_jabatan_tmt'] = $this->kepegawaian->get_detail_pegawai_jabatan_tmt($nipp);
		$data['data_mert_ayah'] = $this->kepegawaian->get_detail_pegawai_mert_ayah($nipp);
		$data['data_mert_ibu'] = $this->kepegawaian->get_detail_pegawai_mert_ibu($nipp);
		$data['data_pasangan'] = $this->kepegawaian->get_detail_pegawai_pasangan($nipp);
		$data['data_pendidikan'] = $this->kepegawaian->get_detail_pegawai_pendidikan($nipp);
		$data['data_status_keluarga'] = $this->kepegawaian->get_detail_pegawai_status_keluarga($nipp);
		$data['data_tmt'] = $this->kepegawaian->get_detail_pegawai_tmt($nipp);
		$data['data_unit'] = $this->kepegawaian->get_detail_pegawai_unit($nipp);
		$data['data_grade'] = $this->kepegawaian->get_detail_pegawai_grade($nipp);
		$data['data_stkp'] = $this->kepegawaian->get_detail_pegawai_stkp($nipp);		
		$data['data_anak'] = $this->kepegawaian->get_detail_pegawai_anak($nipp);
		
		#count data
		$data['jumlah_bahasa'] = $this->kepegawaian->count_result_bahasa($nipp);
		$data['page_karyawan'] = 'yes';
		
		$this->load->view('kepegawaian/index',$data);
		
	}
	
	// FUNGSI PEMANGGILAN VIEW ADD DATA //
	public function add_pegawai()
	{
		$data['list_unit'] = $this->kepegawaian->get_list_unit();
		$data['list_jabatan'] = $this->kepegawaian->get_list_jabatan();
		$data['view_add_pekerja'] = 'class="this"';
		$data['page'] = 'Input Data Diri';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function add_pegawai_pasangan()
	{
		$data['page'] = 'Input Data Pasangan';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function add_pegawai_ortu()
	{
		$data['page'] = 'Input Data Ortu';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function add_pegawai_mertua()
	{
		$data['page'] = 'Input Data Mertua';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function add_bahasa_pegawai()
	{
		$data['page'] = 'Add Data Bahasa';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	// FUNGSI PENAMBAHAN DATA PEGAWAI KE DATABASE //
	public function submit_data_diri()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$data['list_unit'] = $this->kepegawaian->get_list_unit();
		$data['list_jabatan'] = $this->kepegawaian->get_list_jabatan();
		
		#set validation		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nipp', 'nipp', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('tempat', 'tempat', 'required');		
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('jns_klm', 'jns_klm', 'required');
		$this->form_validation->set_rules('gol_drh', 'gol_drh', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page'] = 'Input Data Diri';
			$data['page_karyawan'] = 'yes';
			$this->load->view('kepegawaian/index',$data);
		}
		else
		{
		#preparing data for input
		$data_pegawai = array(
				'peg_nipp' 			=> $this->input->post('nipp'),
				'peg_nama' 			=> $this->input->post('nama'),
				'peg_tmpt_lahir'	=> $this->input->post('tempat'),
				'peg_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal'))),
				'peg_jns_kelamin'	=> $this->input->post('jns_klm'),
				'peg_gol_darah'		=> $this->input->post('gol_drh'),
				'peg_update_on'		=> $tanggal,
				'peg_update_by'		=> 'admin'
			);
		
		#input data to table pegawai
		$this->kepegawaian->insert_data_pegawai($data_pegawai);
		
		$data_agama = array(
				'p_ag_nipp' 		=> $this->input->post('nipp'),
				'p_ag_agama' 		=> $this->input->post('agama'),
				'p_ag_update_on'	=> $tanggal,
				'p_ag_update_by'	=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_agama($data_agama);
		
		$data_alamat = array(
				'p_al_nipp' 		=> $this->input->post('nipp'),
				'p_al_jalan' 		=> $this->input->post('jalan'),
				'p_al_kelurahan'	=> $this->input->post('kelurahan'),
				'p_al_kecamatan' 	=> $this->input->post('kecamatan'),
				'p_al_kabupaten' 	=> $this->input->post('kabupaten'),
				'p_al_provinsi' 	=> $this->input->post('provinsi'),
				'p_al_no_telp' 		=> $this->input->post('notelp'),
				'p_al_email' 		=> $this->input->post('email'),
				'p_al_update_on'	=> $tanggal,
				'p_al_update_by'	=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_alamat($data_alamat);
		
		$data_bahasa = array(
				'p_bhs_nipp' 		=> $this->input->post('nipp'),
				'p_bhs_bahasa' 		=> $this->input->post('bahasa'),
				'p_bhs_update_on'	=> $tanggal,
				'p_bhs_update_by'	=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_bahasa($data_bahasa);
			
		$data_fisik = array(
				'p_fs_nipp' 		=> $this->input->post('nipp'),
				'p_fs_tinggi' 		=> $this->input->post('tinggi'),
				'p_fs_berat' 		=> $this->input->post('berat'),
				'p_fs_foto'	 		=> '',
				'p_fs_update_on'	=> $tanggal,
				'p_fs_update_by'	=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_fisik($data_fisik);
			
		$data_jabatan = array(
				'p_jbt_nipp' 		=> $this->input->post('nipp'),
				'p_jbt_jabatan' 	=> $this->input->post('jabatan'),
				'p_jbt_update_on'	=> $tanggal,
				'p_jbt_update_by'	=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_jabatan($data_jabatan);
		
		$data_pendidikan = array(
				'p_pdd_nipp' 		=> $this->input->post('nipp'),
				'p_pdd_tingkat' 	=> $this->input->post('tgk_pdd'),
				'p_pdd_lp' 			=> $this->input->post('lembaga'),
				'p_pdd_masuk'		=> $this->input->post('masuk'),
				'p_pdd_keluar'		=> $this->input->post('keluar'),
				'p_pdd_update_on'	=> $tanggal,
				'p_pdd_update_by'	=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_pendidikan($data_pendidikan);
		
		#preparing data
		#cek apakah pegawai tetap atau outsource
		if ($this->input->post('stp') == 'PKWT')
		{
			$provider = 'PT Gapura Angkasa';
		} else
		{
			$provider = $this->input->post('provider');
		}
		
		$data_tmt = array(
				'p_tmt_nipp' 			=> $this->input->post('nipp'),
				'p_tmt_status'			=> $this->input->post('stp'),
				'p_tmt_provider'		=> $provider,
				'p_tmt_tmt'				=> mdate($datestring, strtotime($this->input->post('tmt'))),
				'p_tmt_update_on'		=> $tanggal,
				'p_tmt_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_tmt($data_tmt);
			
		$data_unit = array(
				'p_unt_nipp' 			=> $this->input->post('nipp'),
				'p_unt_kode_unit'		=> $this->input->post('unit'),
				'p_unt_update_on'		=> $tanggal,
				'p_unt_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_unit($data_unit);
		
		$data_stk = array(
				'p_stk_nipp' 			  => $this->input->post('nipp'),
				'p_stk_status_keluarga'   => $this->input->post('stk'),
				'p_stk_update_on'		  => $tanggal,
				'p_stk_update_by'		  => 'admin'
			);
		
		$this->kepegawaian->insert_data_pegawai_status_keluarga($data_stk);
		
		#redirecting
		if (($this->input->post('stk') != 'TK') && ($this->input->post('stk') != 'K1'))
		{
			redirect('pekerja/add_pegawai_pasangan/'.$this->input->post('nipp'));
		}
		else
		{
			redirect('pekerja/add_pegawai_ortu/pribadi/'.$this->input->post('nipp'));
		}
		}
	}
	
	public function submit_data_pasangan()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$nipp = $this->input->post('nipp');
		
		$data_pasangan = array(
				'p_ps_nipp' 			=> $nipp,
				'p_ps_nama' 			=> $this->input->post('nama_psg'),
				'p_ps_tmpt_lahir'		=> $this->input->post('tmpt_psgn'),
				'p_ps_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal_psgn'))),
				'p_ps_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_psgn'))),
				'p_ps_alamat'			=> $this->input->post('almt_psgn'),
				'p_ps_pekerjaan'		=> $this->input->post('kerja_psgn'),
				'p_ps_update_on'		=> $tanggal,
				'p_ps_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_pasangan($data_pasangan);
		
		redirect('pekerja/add_pegawai_ortu/'.$nipp);
	}
	
	public function submit_data_ortu()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		if ($this->uri->segment(3) != 'pribadi' )
		{
			$nipp = $this->input->post('nipp');
			$stk = $this->uri->segment(3);
		} else {
			$nipp = $this->input->post('nipp');
			$stk = $this->uri->segment(3);
		}
		
		$data_ayah = array(
				'p_ay_nipp' 			=> $nipp,
				'p_ay_nama' 			=> $this->input->post('nama_ayah'),
				'p_ay_tmpt_lahir'		=> $this->input->post('tempat_ayah'),
				'p_ay_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal_ayah'))),
				'p_ay_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_ayah'))),
				'p_ay_alamat'			=> $this->input->post('almt_ayah'),
				'p_ay_pekerjaan'		=> $this->input->post('kerja_ayah'),
				'p_ay_update_on'		=> $tanggal,
				'p_ay_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_ayah($data_ayah);
			
		$data_ibu = array(
				'p_ibu_nipp' 			=> $nipp,
				'p_ibu_nama' 			=> $this->input->post('nama_ibu'),
				'p_ibu_tmpt_lahir'		=> $this->input->post('tempat_ibu'),
				'p_ibu_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal_ibu'))),
				'p_ibu_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_ibu'))),
				'p_ibu_alamat'			=> $this->input->post('almt_ibu'),
				'p_ibu_pekerjaan'		=> $this->input->post('kerja_ibu'),
				'p_ibu_update_on'		=> $tanggal,
				'p_ibu_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_ibu($data_ibu);
		
		if ($stk != 'pribadi')
		{
			redirect('pekerja/add_pegawai_mertua/'.$nipp);
		} else {
			redirect('pekerja/index');
		}
	}
	
	public function submit_data_mertua()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$nipp = $this->input->post('nipp');
		
		$data_mert_ayah = array(
				'p_may_nipp' 			=> $nipp,
				'p_may_nama' 			=> $this->input->post('nama_mert_ayah'),
				'p_may_tmpt_lahir'		=> $this->input->post('tempat_mert_ayah'),
				'p_may_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal_mert_ayah'))),
				'p_may_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_mert_ayah'))),
				'p_may_alamat'			=> $this->input->post('almt_mert_ayah'),
				'p_may_pekerjaan'		=> $this->input->post('kerja_mert_ayah'),
				'p_may_update_on'		=> $tanggal,
				'p_may_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_mert_ayah($data_mert_ayah);
			
		$data_mert_ibu = array(
				'p_mib_nipp' 			=> $nipp,
				'p_mib_nama' 			=> $this->input->post('nama_mert_ibu'),
				'p_mib_tmpt_lahir'		=> $this->input->post('tempat_mert_ibu'),
				'p_mib_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal_mert_ibu'))),
				'p_mib_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_mert_ibu'))),
				'p_mib_alamat'			=> $this->input->post('almt_mert_ibu'),
				'p_mib_pekerjaan'		=> $this->input->post('kerja_mert_ibu'),
				'p_mib_update_on'		=> $tanggal,
				'p_mib_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->insert_data_pegawai_mert_ibu($data_mert_ibu);
		
		redirect('pekerja/index');
	}
	
	public function add_data_anak()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$nipp = $this->input->post('nipp');
		#set validation		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('tempat', 'tempat', 'required');		
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			redirect('pekerja/add_anak_pegawai/'.$nipp);
		}
		else
		{
			#preparing data for input
			$data_anak = array(
					'peg_ank_nipp'			=> $nipp,
					'peg_ank_nama'			=> $this->input->post('nama'),
					'peg_ank_tempat_lahir'	=> $this->input->post('tempat'),
					'peg_ank_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal'))),
					'peg_ank_pendidikan'	=> $this->input->post('pendidikan'),
					'p_ank_update_on'		=> $tanggal,
					'p_ank_update_by'		=> 'admin'
				);
				
			$this->kepegawaian->insert_data_pegawai_anak($data_anak);
			
			redirect('pekerja/get_pegawai/'.$nipp);
		}
	}
	
	public function add_data_bahasa()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		$nipp = $this->input->post('nipp');
		#set validation		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('bahasa', 'bahasa', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			redirect('pekerja/add_bahasa_pegawai/'.$nipp);
		}
		else
		{
			#preparing data for input
			$data_bahasa = array(
					'p_bhs_nipp'			=> $nipp,
					'p_bhs_bahasa'			=> $this->input->post('bahasa'),
					'p_bhs_update_on'		=> $tanggal,
					'p_bhs_update_by'		=> 'admin'
				);
				
			$this->kepegawaian->insert_data_pegawai_bahasa($data_bahasa);
			
			redirect('pekerja/get_pegawai/'.$nipp);
		}
	}
	
	// FUNGSI PEMANGGILAN VIEW EDIT DATA //
	public function edit_data($nipp)
	{
		$data['pegawai'] = $this->kepegawaian->get_data_pegawai_by_nipp($nipp);
		$data['agama'] = $this->kepegawaian->get_detail_pegawai_agama($nipp);
		$data['fisik'] = $this->kepegawaian->get_detail_pegawai_fisik($nipp);
		$data['status_keluarga'] = $this->kepegawaian->get_detail_pegawai_status_keluarga($nipp);
		$data['page'] = 'Edit Data Diri';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function edit_alamat_pegawai($nipp)
	{
		$data['alamat'] = $this->kepegawaian->get_detail_pegawai_alamat($nipp);
		$data['page'] = 'Edit Data Alamat';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function edit_pasangan_pegawai($nipp)
	{
		$data['pasangan'] = $this->kepegawaian->get_detail_pegawai_pasangan($nipp);
		$data['page'] = 'Edit Data Pasangan';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function edit_ortu_pegawai($nipp)
	{
		$data['ayah'] = $this->kepegawaian->get_detail_pegawai_ayah($nipp);
		$data['ibu'] = $this->kepegawaian->get_detail_pegawai_ibu($nipp);
		$data['page'] = 'Edit Data Ortu';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function edit_mertua_pegawai($nipp)
	{
		$data['mertua_ayah'] = $this->kepegawaian->get_detail_pegawai_mert_ayah($nipp);
		$data['mertua_ibu'] = $this->kepegawaian->get_detail_pegawai_mert_ibu($nipp);
		$data['page'] = 'Edit Data Mertua';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function edit_anak_pegawai($nipp)
	{		
		$data['anak'] = $this->kepegawaian->get_detail_pegawai_anak($nipp);
		$data['page'] = 'Edit Data Anak';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function edit_jabatan_pegawai($nipp)
	{		
		$data['jabatan_tmt'] = $this->kepegawaian->get_detail_pegawai_jabatan_tmt($nipp);
		$data['list_jabatan'] = $this->kepegawaian->get_list_jabatan();
		$data['list_unit'] = $this->kepegawaian->get_list_unit();
		$data['unit'] = $this->kepegawaian->get_detail_pegawai_unit($nipp);
		$data['grade'] = $this->kepegawaian->get_detail_pegawai_grade($nipp);
		$data['page'] = 'Edit Data Jabatan';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function edit_pendidikan_pegawai($nipp)
	{		
		$data['bahasa'] = $this->kepegawaian->get_detail_pegawai_bahasa($nipp);
		$data['pendidikan'] = $this->kepegawaian->get_detail_pegawai_pendidikan($nipp);
		$data['page'] = 'Edit Data Pendidikan';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	public function add_anak_pegawai($nipp)
	{
		$data['page'] = 'Add Data Anak';
		$data['page_karyawan'] = 'yes';
		$this->load->view('kepegawaian/index',$data);
	}
	
	//FUNGSI PENGUBAHAN DATA PEGAWAI YANG DI DATABASE //
	public function edit_data_diri()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		
		#set validation		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('tempat', 'tempat', 'required');		
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('jns_klm', 'jns_klm', 'required');
		$this->form_validation->set_rules('gol_drh', 'gol_drh', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page'] = 'Input Data Diri';
			$this->load->view('kepegawaian/index',$data);
		}
		else
		{
		$nipp = $this->uri->segment(3);
		$data_pegawai = array(
				'peg_nama' 			=> $this->input->post('nama'),
				'peg_tmpt_lahir'	=> $this->input->post('tempat'),
				'peg_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal'))),
				'peg_jns_kelamin'	=> $this->input->post('jns_klm'),
				'peg_gol_darah'		=> $this->input->post('gol_drh'),
				'peg_update_on'		=> $tanggal,
				'peg_update_by'		=> 'admin'
			);
		
		$data_telp = array(
				'p_al_no_telp'	=> $this->input->post('no_telp')
			);
		#input data to table pegawai
		$this->kepegawaian->update_data_pegawai($data_pegawai);
		$this->kepegawaian->update_data_telp($data_telp);
		}
		redirect('pekerja/get_pegawai/'.$nipp);
	}
	
	public function edit_data_alamat()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
				
		$nipp = $this->uri->segment(3);
		$data_alamat = array(
				'p_al_jalan'		=> $this->input->post('jalan'),
				'p_al_kelurahan'	=> $this->input->post('kelurahan'),
				'p_al_kecamatan'	=> $this->input->post('kecamatan'),
				'p_al_kabupaten'	=> $this->input->post('kabupaten'),
				'p_al_provinsi'		=> $this->input->post('provinsi'),
				'p_al_update_on'	=> $tanggal,
				'p_al_update_by'	=> 'admin'
			);
		#input data to table pegawai
		$this->kepegawaian->update_data_alamat($data_alamat);
		redirect('pekerja/get_pegawai/'.$nipp);
	}
	
	public function edit_data_pasangan()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
				
		$nipp = $this->uri->segment(3);
		$data_pasangan = array(
				'p_ps_nama'			=> $this->input->post('nama'),
				'p_ps_tmpt_lahir'	=> $this->input->post('tempat_lahir'),
				'p_ps_tgl_lahir'	=> mdate($datestring, strtotime($this->input->post('tgl_lahir'))),
				'p_ps_tgl_meninggal'=> mdate($datestring, strtotime($this->input->post('tgl_meninggal'))),
				'p_ps_alamat'		=> $this->input->post('alamat'),
				'p_ps_pekerjaan'	=> $this->input->post('pekerjaan'),
				'p_ps_update_on'	=> $tanggal,
				'p_ps_update_by'	=> 'admin'
			);
		#input data to table pegawai
		$this->kepegawaian->update_data_pasangan($data_pasangan);
		redirect('pekerja/get_pegawai/'.$nipp);
	}
	
	public function edit_data_ortu()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		
		$nipp = $this->uri->segment(3);		
		$data_ayah = array(
				'p_ay_nama' 			=> $this->input->post('nama_ayah'),
				'p_ay_tmpt_lahir'		=> $this->input->post('tempat_ayah'),
				'p_ay_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tgl_ayah'))),
				'p_ay_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_ayah'))),
				'p_ay_alamat'			=> $this->input->post('almt_ayah'),
				'p_ay_pekerjaan'		=> $this->input->post('kerja_ayah'),
				'p_ay_update_on'		=> $tanggal,
				'p_ay_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->update_data_ayah($data_ayah);
			
		$data_ibu = array(
				'p_ibu_nama' 			=> $this->input->post('nama_ibu'),
				'p_ibu_tmpt_lahir'		=> $this->input->post('tempat_ibu'),
				'p_ibu_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tgl_ibu'))),
				'p_ibu_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_ibu'))),
				'p_ibu_alamat'			=> $this->input->post('almt_ibu'),
				'p_ibu_pekerjaan'		=> $this->input->post('kerja_ibu'),
				'p_ibu_update_on'		=> $tanggal,
				'p_ibu_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->update_data_ibu($data_ibu);
		
		redirect('pekerja/get_pegawai/'.$nipp);
	}
	
	public function edit_data_mertua()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		
		$nipp = $this->uri->segment(3);	
				
		$data_mert_ayah = array(
				'p_may_nama' 			=> $this->input->post('nama_ayah'),
				'p_may_tmpt_lahir'		=> $this->input->post('tempat_ayah'),
				'p_may_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tgl_ayah'))),
				'p_may_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_ayah'))),
				'p_may_alamat'			=> $this->input->post('almt_ayah'),
				'p_may_pekerjaan'		=> $this->input->post('kerja_ayah'),
				'p_may_update_on'		=> $tanggal,
				'p_may_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->update_data_mert_ayah($data_mert_ayah);
			
		$data_mert_ibu = array(
				'p_mib_nama' 			=> $this->input->post('nama_ibu'),
				'p_mib_tmpt_lahir'		=> $this->input->post('tempat_ibu'),
				'p_mib_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tgl_ibu'))),
				'p_mib_tgl_meninggal'	=> mdate($datestring, strtotime($this->input->post('meninggal_ibu'))),
				'p_mib_alamat'			=> $this->input->post('almt_ibu'),
				'p_mib_pekerjaan'		=> $this->input->post('kerja_ibu'),
				'p_mib_update_on'		=> $tanggal,
				'p_mib_update_by'		=> 'admin'
			);
			
		$this->kepegawaian->update_data_mert_ibu($data_mert_ibu);
		
		redirect('pekerja/get_pegawai/'.$nipp);
	}
	
	public function edit_data_anak()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
				
		$nipp = $this->uri->segment(3);
		$data_anak = array(
				'peg_ank_nama'			=> $this->input->post('nama'),
				'peg_ank_tempat_lahir'	=> $this->input->post('tempat'),
				'peg_ank_tgl_lahir'		=> mdate($datestring, strtotime($this->input->post('tanggal'))),
				'peg_ank_pendidikan'	=> $this->input->post('pendidikan'),
				'p_ank_update_on'		=> $tanggal,
				'p_ank_update_by'		=> 'admin'
			);
		#input data to table pegawai
		$this->kepegawaian->update_data_anak($data_anak);
		redirect('pekerja/get_pegawai/'.$nipp);
	}
	
	public function edit_data_jabatan()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		if ($this->input->post('status') == 'PKWT')	
		{
			$provider = 'PT Gapura Angkasa';
		}else{
			$provider = $this->input->post('provider');
		}	
		$tanggal_tmt = mdate($datestring, strtotime($this->input->post('tmt')));
		
		$nipp = $this->uri->segment(3);
		$data_jabatan = array(
				'p_jbt_nipp'		=> $nipp,
				'p_jbt_jabatan'		=> $this->input->post('jabatan'),
				'p_jbt_update_on'	=> $tanggal,
				'p_jbt_update_by'	=> 'admin'
			);
		$data_tmt = array(
				'p_tmt_nipp'		=> $nipp,
				'p_tmt_status'		=> $this->input->post('status'),
				'p_tmt_provider'	=> $provider,
				'p_tmt_tmt'			=> $tanggal_tmt,
				'p_tmt_update_on'	=> $tanggal,
				'p_tmt_update_by'	=> 'admin'
			);
		$data_update_tmt_tanggal = array ('p_tmt_end' => $tanggal);
		$data_grade = array(
				'p_grd_nipp'		=> $nipp,
				'p_grd_grade'		=> $this->input->post('grade'),
				'p_grd_update_on'	=> $tanggal,
				'p_grd_update_by'	=> 'admin'
			);
		
		#input data to table pegawai
		$this->kepegawaian->insert_data_pegawai_jabatan($data_jabatan);
		$this->kepegawaian->update_data_tmt($data_update_tmt_tanggal);
		$this->kepegawaian->insert_data_pegawai_tmt($data_tmt);
		$this->kepegawaian->insert_data_pegawai_grade($data_grade);
		redirect('pekerja/get_pegawai/'.$nipp);
	}
	
	public function edit_data_pendidikan()
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
					
		$nipp = $this->uri->segment(3);
		$data_pendidikan = array(
				'p_pdd_tingkat'		=> $this->input->post('pendidikan'),
				'p_pdd_lp'			=> $this->input->post('lp'),
				'p_pdd_masuk'		=> $this->input->post('masuk'),
				'p_pdd_keluar'		=> $this->input->post('keluar'),
				'p_pdd_update_on'	=> $tanggal,
				'p_pdd_update_by'	=> 'admin'
			);
		
		$this->kepegawaian->update_data_pendidikan($data_pendidikan);
		
		$data_id_bahasa = $this->kepegawaian->get_detail_pegawai_bahasa($nipp);
		$nomer = 1;
		foreach ($data_id_bahasa as $row_bahasa) :
		{
			$data_bahasa = array(
					'p_bhs_bahasa'		=> $this->input->post('bahasa'.$nomer),
					'p_bhs_update_on'	=> $tanggal,
					'p_bhs_update_by'	=> 'admin'
				);
			$id_bahasa = $row_bahasa['id_peg_bahasa'];
			$nomer++;
			$this->kepegawaian->update_data_bahasa($data_bahasa, $id_bahasa);
		} endforeach;
		#input data to table pegawai
		$this->kepegawaian->update_data_pendidikan($data_pendidikan);
		redirect('pekerja/get_pegawai/'.$nipp);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */