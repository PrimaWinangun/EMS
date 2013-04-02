<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diklat extends Application {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('diklat/pendidikan');
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
		//pagination config
		$config['base_url'] = base_url().'index.php/diklat/index/'; //set the base url for pagination
		$config['total_rows'] = $this->pendidikan->countPegawai(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		#data preparing
		$data['pegawai'] = $this->pendidikan->get_data_pegawai_with_unit($config['per_page'],$page);
		$data['page'] = 'Pegawai';
		#calling view
		$this->load->view('diklat/index',$data);
	}
	
	public function add_new_stkp($nipp)
	{
		$data['pegawai'] = $this->pendidikan->get_data_pegawai_by_nipp($nipp);
		$data['list_stkp'] = $this->pendidikan->get_list_stkp();
		$data['page'] = 'Add STKP';
		#calling view
		$this->load->view('diklat/index',$data);
	}
	
	public function add_data_stkp($nipp)
	{
		#preparing date update
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		
		$data_stkp = array(
				'p_stkp_nipp' 			=> $nipp,
				'p_stkp_type' 			=> $this->input->post('type'),
				'p_stkp_jenis' 			=> $this->input->post('stkp'),
				'p_stkp_lembaga'		=> $this->input->post('lembaga'),
				'p_stkp_no_license'		=> $this->input->post('license'),
				'p_stkp_pelaksanaan'	=> mdate($datestring, strtotime($this->input->post('pelaksanaan'))),
				'p_stkp_mulai'			=> mdate($datestring, strtotime($this->input->post('validitas_awal'))),
				'p_stkp_finish'			=> mdate($datestring, strtotime($this->input->post('validitas_akhir'))),
				'p_stkp_rating'			=> $this->input->post('rating'),
				'p_stkp_update_on'		=> $tanggal,
				'p_stkp_update_by'		=> 'admin'
			);
		
		
		#input data to table pegawai
		$this->pendidikan->insert_data_stkp($data_stkp);
		
		redirect('diklat/');
	}
	
	public function get_stkp()
	{
		#pagination config
		$config['base_url'] = base_url().'index.php/diklat/get_stkp/'; //set the base url for pagination
		$config['total_rows'] = $this->pendidikan->countSTKP(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['list_stkp'] = $this->pendidikan->get_list_stkp();
		$data['list_unit'] = $this->pendidikan->get_list_unit();
		$data['pegawai_with_stkp_and_unit'] = $this->pendidikan->get_data_stkp_with_unit_and_name($config['per_page'],$page);
		$data['page'] = 'Report STKP';
		
		$this->load->view('diklat/index',$data);
	}
	
	public function get_non_stkp()
	{
		#pagination config
		$config['base_url'] = base_url().'index.php/diklat/get_non_stkp/'; //set the base url for pagination
		$config['total_rows'] = $this->pendidikan->countNon_STKP(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['list_unit'] = $this->pendidikan->get_list_unit();
		$data['pegawai_with_stkp_and_unit'] = $this->pendidikan->get_data_nstkp_with_unit_and_name($config['per_page'],$page);
		$data['page'] = 'Report Non STKP';
		$data['view_input_nstkp'] = 'class="this"';
		
		$this->load->view('diklat/index',$data);
	}
	
	public function sort_stkp()
	{
		if ($this->input->post('stkp')== NULL)
		{
			$stkp = $this->uri->segment(3);
		}else{
			$stkp = $this->input->post('stkp');
		}
		
		if (($this->input->post('unit')== NULL))
		{
			$unit = str_replace('%20',' ',$this->uri->segment(4));
		}else{
			$unit = $this->input->post('unit');
		}
		
		if ($unit == 'ALL')
		{
			$unit = '%';
		}
		
		if ($stkp == 'ALL')
		{
			$stkp = '%';
		}
		
		if ($unit == '%')
		{
			$unit_search = 'ALL';
		}else{
			$unit_search = $unit;
		}
		
		if ($stkp == '%')
		{
			$stkp_search = 'ALL';
		}else{
			$stkp_search = $stkp;
		}
		
		#pagination config
		$config['base_url'] = base_url().'index.php/diklat/sort_stkp/'.$stkp_search.'/'.$unit_search; //set the base url for pagination
		$config['total_rows'] = $this->pendidikan->countSTKP_Unit($stkp, $unit); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 5; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		
		$data['list_stkp'] = $this->pendidikan->get_list_stkp();
		$data['list_unit'] = $this->pendidikan->get_list_unit();
		$data['pegawai_with_stkp_and_unit'] = $this->pendidikan->search_data_stkp_with_unit_and_name($config['per_page'],$page, $stkp, $unit);
		
		$data['page'] = 'Report STKP';
				
		$this->load->view('diklat/index',$data);
	}
	
	public function sort_non_stkp()
	{
		if ($this->input->post('license')== NULL)
		{
			$stkp = '%'.str_replace('%20',' ',$this->uri->segment(3)).'%';
		}else{
			$stkp = '%'.$this->input->post('license').'%';
		}
		
		if (($this->input->post('unit')== NULL))
		{
			$unit = str_replace('%20',' ',$this->uri->segment(4));
		}else{
			$unit = $this->input->post('unit');
		}
		
		if ($unit == 'ALL')
		{
			$unit = '%';
		}
		
		if ($stkp == 'ALL' or $stkp == '%ALL%')
		{
			$stkp = '%';
		}
		
		if ($unit == '%')
		{
			$unit_search = 'ALL';
		}else{
			$unit_search = $unit;
		}
		
		if ($stkp == '%' OR $stkp == '%%')
		{
			$stkp_search = 'ALL';
		}else{
			$stkp_search = $stkp;
		}
		
		#pagination config
		$config['base_url'] = base_url().'index.php/diklat/sort_non_stkp/'.$stkp_search.'/'.$unit_search; //set the base url for pagination
		$config['total_rows'] = $this->pendidikan->count_non_STKP_Unit($stkp, $unit); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 5; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		
		$data['view_input_nstkp'] = 'class="this"';
		$data['list_unit'] = $this->pendidikan->get_list_unit();
		$data['pegawai_with_stkp_and_unit'] = $this->pendidikan->search_data_nstkp_with_unit_and_name($config['per_page'],$page, $stkp, $unit);
		
		$data['page'] = 'Report Non STKP';
		
		//print_r($config);
		$this->load->view('diklat/index',$data);
	}
	
	public function search_pegawai()
	{
		if ($this->input->post('search') == NULL )
		{
			$search_data = str_replace('%20',' ',$this->uri->segment(3));
		}else{
			$search_data = $this->input->post('search');
		}
		
		$search = '%'.$search_data.'%';
		#pagination config
		$config['base_url'] = base_url().'index.php/diklat/search_pegawai/'.$search_data.'/'; //set the base url for pagination
		$config['total_rows'] = $this->pendidikan->count_search_Pegawai($search); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['pegawai'] = $this->pendidikan->search_data_pegawai($config['per_page'], $page, $search);
		$data['list_unit'] = $this->pendidikan->get_list_unit();
		$data['page'] = 'Search Result';
		
		//print_r($data);
		//print_r($search);
		#calling view
		$this->load->view('diklat/index', $data);
	}
	
	public function input_stkp_bulanan()
	{
		if ($this->uri->segment(3) === 'part_one' )
		{
			$data['page'] = 'STKP Bulanan';
			$data['view_input_stkp'] = 'class="this"';
			$this->load->view('diklat/index', $data);
		} else 
		if ($this->uri->segment(3) === 'part_two' )
		{
			$data['page'] = 'STKP Bulanan Next';
			$data['STKP'] = $this->input->post('stkp');
			$data['jumlah'] = $this->input->post('jumlah');
			$data['tanggal'] = $this->input->post('tanggal');
			$data['license'] = $this->input->post('license');
			$data['lp'] = $this->input->post('lp');
			$data['view_input_stkp'] = 'class="this"';
			
			$this->load->view('diklat/index', $data);
		}
	}
	
	public function input_nilai_stkp()
	{
		$stkp = $this->input->post('stkp');
		$jumlah = $this->input->post('jumlah');
		$tanggal_stkp = $this->input->post('tanggal');
		
		$datestring = "%Y-%m-%d" ;
		$time = time();
				
		//print_r((str_replace('/','-',$tanggal_stkp)));
		//print_r(mdate($datestring, strtotime(str_replace('/','-',$tanggal_stkp))));
		if ($this->input->post('license') == 'yes')
		{
			$this->pendidikan->input_nilai_stkp($stkp, $jumlah, $tanggal_stkp, username());
		} else {
			$this->pendidikan->input_nilai_nstkp($stkp, $jumlah, $tanggal_stkp, username());
		}
		redirect('diklat/input_stkp_bulanan/part_one');
	}
	
	function edit_non_stkp($id)
	{
		$data['nstkp'] = $this->pendidikan->get_nilai_non_stkp($id);
		
		$data['page'] = 'Edit non STKP';
		$this->load->view('diklat/index', $data);
	}
	
	function update_non_stkp($id)
	{
		#update data to table pegawai
		$this->pendidikan->update_data_non_stkp($id);
		redirect('diklat/');
	}
	
	function delete_non_stkp($id)
	{
		#update data to table pegawai
		$this->pendidikan->delete_data_non_stkp($id);
		redirect('diklat/');
	}
	
	public function excel_non_stkp()
	{
		$datestring = "%Y-%m-%d" ;
		$time = time();
		$tanggal = mdate($datestring, $time);
		
		$pegawai_with_stkp_and_unit = $this->pendidikan->get_data_nstkp_with_unit_and_name_unlimited();
				
				
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle("Diklat Non STKP  $tanggal");
		//set cell A1 content with some text
		
		$this->excel->getActiveSheet()->setCellValue('A1', 'No');
		$this->excel->getActiveSheet()->setCellValue('B1', 'NIPP');
		$this->excel->getActiveSheet()->setCellValue('C1', 'Nama');
		$this->excel->getActiveSheet()->setCellValue('D1', 'STKP');
		$this->excel->getActiveSheet()->setCellValue('E1', 'Rating');
		$this->excel->getActiveSheet()->setCellValue('F1', 'No Sertifikat');
		$this->excel->getActiveSheet()->setCellValue('G1', 'Validitas');
		$this->excel->getActiveSheet()->setCellValue('I1', 'Lembaga');
		$this->excel->getActiveSheet()->setCellValue('J1', 'Tanggal Pelaksanaan');
		$this->excel->getActiveSheet()->setCellValue('K1', 'Jenis STKP');
		$this->excel->getActiveSheet()->setCellValue('G2', 'From');
		$this->excel->getActiveSheet()->setCellValue('H2', 'Until');
		
		$i=2;
		$number=0;
		
		$nipp = '';
		foreach ($pegawai_with_stkp_and_unit as $row_pegawai) :
		{ 
			$i++;
			$number++;
			if ($row_pegawai['peg_nipp'] == $nipp)
			{
				$nipp = '';
				$nama = '';
			}
			else
			{
				$nipp = $row_pegawai['p_nstkp_nipp'];
				$nama = $row_pegawai['peg_nama'];
			}
			if ($row_pegawai['p_nstkp_pelaksanaan'] == '0000-00-00')
			{
				$pelaksanaan = '-';
			}
			else
			{
				$pelaksanaan = $row_pegawai['p_nstkp_pelaksanaan'];
			}
			if ($row_pegawai['p_nstkp_mulai'] == '0000-00-00')
			{
				$stkp_mulai = '-';
			}
			else
			{
				$stkp_mulai = mdate($datestring,strtotime($row_pegawai['p_nstkp_mulai']));
			}
			if ($row_pegawai['p_nstkp_finish'] == '0000-00-00')
			{
				$stkp_selesai = '-';
			}
			else
			{
				$stkp_selesai = mdate($datestring,strtotime($row_pegawai['p_nstkp_finish']));
			}
			
			//masukkan data ke tabel excel
			$this->excel->getActiveSheet()->setCellValue("A$i", "$number");
			$this->excel->getActiveSheet()->setCellValue("B$i", "$nipp");
			$this->excel->getActiveSheet()->setCellValue("C$i", "$nama");
			$this->excel->getActiveSheet()->setCellValue("D$i", "$row_pegawai[p_nstkp_jenis]");
			$this->excel->getActiveSheet()->setCellValue("E$i", "$row_pegawai[p_nstkp_rating]");
			$this->excel->getActiveSheet()->setCellValue("F$i", "$row_pegawai[p_nstkp_no_license]");
			$this->excel->getActiveSheet()->setCellValue("G$i", "$stkp_mulai");
			$this->excel->getActiveSheet()->setCellValue("H$i", "$stkp_selesai");
			$this->excel->getActiveSheet()->setCellValue("I$i", "$row_pegawai[p_nstkp_lembaga]");
			$this->excel->getActiveSheet()->setCellValue("J$i", "$pelaksanaan");
			$this->excel->getActiveSheet()->setCellValue("K$i", "$row_pegawai[p_nstkp_type]");
			
			$nipp = $row_pegawai['peg_nipp'];
			
		}endforeach;
		
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1:K1')->getFont()->setSize(14);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('G2:H2')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:A2');
		$this->excel->getActiveSheet()->mergeCells('B1:B2');
		$this->excel->getActiveSheet()->mergeCells('C1:C2');
		$this->excel->getActiveSheet()->mergeCells('D1:D2');
		$this->excel->getActiveSheet()->mergeCells('E1:E2');
		$this->excel->getActiveSheet()->mergeCells('F1:F2');
		$this->excel->getActiveSheet()->mergeCells('G1:H1');
		$this->excel->getActiveSheet()->mergeCells('I1:I2');
		$this->excel->getActiveSheet()->mergeCells('J1:J2');
		$this->excel->getActiveSheet()->mergeCells('K1:K2');
		
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1:K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$filename="Report Non STKP.xls"; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
					 
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */