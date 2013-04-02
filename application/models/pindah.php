<?php
class pindah extends CI_Model
{

	function __construct()
	{
        parent::__construct();
		$this->load->database();
    }

	#----- GETTING DATA FROM DATABASE -----#
	function get_stkp()
	{
		$this->db->select('*');
		$query = $this->db->get('ikutstkp');
		return $query->result_array();
	}
	
	function pindah_stkp($data)
	{
		$this->db->insert('v3_peg_stkp',$data);
	}
	
	function delete_pegawai($nipp)
	{
		$this->db->where('peg_nipp', $nipp);
		$this->db->delete('v3_pegawai'); 
		$this->db->where('p_ag_nipp', $nipp);
		$this->db->delete('v3_peg_agama'); 
		$this->db->where('p_al_nipp', $nipp);
		$this->db->delete('v3_peg_alamat'); 
		$this->db->where('p_ay_nipp', $nipp);
		$this->db->delete('v3_peg_ayah'); 
		$this->db->where('p_bhs_nipp', $nipp);
		$this->db->delete('v3_peg_bahasa'); 
		$this->db->where('p_fs_nipp', $nipp);
		$this->db->delete('v3_peg_fisik'); 
		$this->db->where('p_ibu_nipp', $nipp);
		$this->db->delete('v3_peg_ibu'); 
		$this->db->where('p_jbt_nipp', $nipp);
		$this->db->delete('v3_peg_jabatan'); 
		$this->db->where('p_may_nipp', $nipp);
		$this->db->delete('v3_peg_mert_ayah'); 
		$this->db->where('p_mib_nipp', $nipp);
		$this->db->delete('v3_peg_mert_ibu'); 
		$this->db->where('p_ps_nipp', $nipp);
		$this->db->delete('v3_peg_pasangan');
		$this->db->where('p_pdd_nipp', $nipp);
		$this->db->delete('v3_peg_pendidikan');
		$this->db->where('p_stk_nipp', $nipp);
		$this->db->delete('v3_peg_status_keluarga');
		$this->db->where('p_tmt_nipp', $nipp);
		$this->db->delete('v3_peg_tmt');
		$this->db->where('p_unt_nipp', $nipp);
		$this->db->delete('v3_peg_unit');
	}

}
/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */