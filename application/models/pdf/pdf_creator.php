<?php
class pdf_creator extends CI_Model
{
	function __construct()
	{
        parent::__construct();
		$this->load->database();
    }
	
	function get_data_pegawai_pdf()
	{
		$this->db->select('*');
		$this->db->limit(100);
		$query = $this->db->get('v3_pegawai');
		return $query->result_array();
	}
}