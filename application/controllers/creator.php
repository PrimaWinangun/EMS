<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Creator extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->helper('html');
		$this->load->model('pdf/pdf_creator');
		$this->load->library('table');
		$this->load->helper('skm_pdf');
    }

	public function pegawai_pdf()
	{
		$data['data_pegawai'] = $this->pdf_creator->get_data_pegawai_pdf();
		$stream = TRUE; 
		$papersize = 'letter'; 
		$orientation = 'potrait';
		$filename = 'ems-dps-' .mdate("%d%m%Y%H%i%s", time());
		
		$html = $this->load->view('pdf_view/pegawai_pdf', $data, true);
     	pdf_create($html, $filename, $stream, $papersize, $orientation);
	}
}