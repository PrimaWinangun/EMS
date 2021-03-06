<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_absensi extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/*
	=====================================================================================================
	 MODEL UNTUK LIBUR NASIONAL
	=====================================================================================================
	*/
	
	//tambah data libur nasional
	function lnas_add($lnas_date, $lnas_desc, $lnas_user)
	{
      $data = array(
      	'lnas_date' => $lnas_date, 
		'lnas_desc' => $lnas_desc,
        'lnas_update_by' => $lnas_user
      );
      
	  $this->db->insert('v3_libur_nasional', $data); 
      
	  if($this->db->affected_rows())
      	return '1';
      else
      	return '0';             
    }  
	
	//lihat data libur nasional keseluruhan
	function lnas_viewall()
	{
		return $this->db->order_by('lnas_date', 'asc')->get('v3_libur_nasional')->result();
	}
	
	//untuk check date apakah sudah ada dalam db
	function lnas_check($lnas_date)
	{
		return $this->db->get_where('v3_libur_nasional', array('lnas_date' => $lnas_date))->result(); 
	}
	
	function lnas_date($lnas_id)
	{
		$data = $this->db->get_where('v3_libur_nasional', array('lnas_id' => $lnas_id));
		
		if($this->db->affected_rows())
		{
			foreach ($data->result() as $row)
            {
				return $row->lnas_date;
			}
		}
	}
	
	//untuk menghapus data libur nasional
	function lnas_del($lnas_id)
	{
		return $this->db->delete('v3_libur_nasional', array('lnas_id' => $lnas_id)); 
	}
	
	//untuk mengambil data libur nasional yang mau diedit
	function lnas_viewedit($lnas_id)
	{
		return $this->db->order_by('lnas_date', 'asc')->get_where('v3_libur_nasional', array('lnas_id' => $lnas_id))->result(); 
	}
	
	//untuk menyimpan hasil data libur nasional yang sudah diedit
	function lnas_edit($lnas_id, $lnas_date, $lnas_desc, $lnas_user)
	{
		$data = array(
               'lnas_date' => $lnas_date,
               'lnas_desc' => $lnas_desc,
			   'lnas_update_by' => $lnas_user
        );
		
		$this->db->update('v3_libur_nasional', $data, array('lnas_id' => $lnas_id));
		
		if($this->db->affected_rows())
      		return '1';
      	else
      		return '0';
	}
	
	/*
	=====================================================================================================
	 MODEL UNTUK FORMAT SCHEDULE
	=====================================================================================================
	*/
	
	//lihat data format schedule keseluruhan
	function fsch_viewall()
	{
		return $this->db->order_by('fsch_id', 'asc')->get('v3_format_schedule')->result();
	}
	
	//lihat data format schedule detail
	function fsch_viewdetail($fsch_id)
	{
		return $this->db->order_by('fschtime_id', 'asc')->get_where('v3_fsch_time', array('fschtime_fsch_id' => $fsch_id))->result(); 
	}
	
	function fsch_getdata($fsch_id)
	{
		$query=	"	
					SELECT *
					FROM v3_format_schedule
					WHERE (fsch_id = $fsch_id)
				";
		$query = $this->db->query($query);
		return  $query->result_array();
	}
	function fsch_getdetail($fsch_id)
	{
		$query=	"	
					SELECT *
					FROM v3_fsch_time
					WHERE (fschtime_fsch_id = $fsch_id)
				";
		$query = $this->db->query($query);
		return  $query->result_array();
	}
	
	//ambil data fsch_id dari tabel v3_format_schedule by name
	function fsch_getid($fsch_name)
	{
		$data =  $this->db->get_where('v3_format_schedule', array('fsch_name' => $fsch_name));
		if($this->db->affected_rows())
		{
			foreach ($data->result() as $row)
            {
				return $row->fsch_id;
			}
		}
		
	}
	
	//tambah data format schedule
	function fsch_add($fsch_name, $fsch_total_day, $fschtime_update_by)
	{
      $data = array(
      	'fsch_name' => $fsch_name, 
		'fsch_total_day' => $fsch_total_day,
		'fsch_update_by' => $fschtime_update_by
      );
      
	  $this->db->insert('v3_format_schedule', $data); 
      
	  if($this->db->affected_rows())
      	return '1';
      else
      	return '0';             
    }  
	
	//tambah data detail format schedule
	function fsch_add_next($fschtime_fsch_id, $fschtime_order, $fschtime_time_in, $fschtime_time_out, $fschtime_update_by, $fschtime_off_status)
	{
      $data = array(
      	'fschtime_fsch_id' => $fschtime_fsch_id, 
		'fschtime_order' => $fschtime_order,
		'fschtime_time_in' => $fschtime_time_in,
		'fschtime_time_out' => $fschtime_time_out,
		'fschtime_update_by' => $fschtime_update_by,
		'fschtime_off_status' => $fschtime_off_status
      );
      
	  $this->db->insert('v3_fsch_time', $data); 
      
	  if($this->db->affected_rows())
      	return '1';
      else
      	return '0';             
    } 
	
	//untuk menghapus data master format schedule
	function fsch_del($fsch_id)
	{
		return $this->db->delete('v3_format_schedule', array('fsch_id' => $fsch_id)); 
	}
	
	//untuk menghapus data master format schedule time
	function fschtime_del($fsch_id)
	{
		return $this->db->delete('v3_fsch_time', array('fschtime_fsch_id' => $fsch_id)); 
	}
	
	function fsch_edit($fsch_id, $fsch_name, $fsch_total_day, $fschtime_update_by)
	{
      $data = array(
      	'fsch_name' => $fsch_name, 
		'fsch_total_day' => $fsch_total_day,
		'fsch_update_by' => $fschtime_update_by
      );
      
	 //$this->db->insert('v3_format_schedule', $data); 
	  $this->db->update('v3_format_schedule', $data, array('fsch_id' => $fsch_id));
      
	  if($this->db->affected_rows())
      	return '1';
      else
      	return '0';             
    }  
	
	function fsch_edit_next($fschtime_id, $fschtime_fsch_id, $fschtime_order, $fschtime_time_in, $fschtime_time_out, $fschtime_update_by, $fschtime_off_status)
	{
      $data = array(
      	'fschtime_fsch_id' => $fschtime_fsch_id, 
		'fschtime_order' => $fschtime_order,
		'fschtime_time_in' => $fschtime_time_in,
		'fschtime_time_out' => $fschtime_time_out,
		'fschtime_update_by' => $fschtime_update_by,
		'fschtime_off_status' => $fschtime_off_status
      );
      
	  $this->db->update('v3_fsch_time', $data, array('fschtime_id' => $fschtime_id)); 
      
	  if($this->db->affected_rows())
      	return '1';
      else
      	return '0';             
    } 
	
	
	/*
	=====================================================================================================
	 MODEL UNTUK FORMAT SCHEDULE ABSENSI
	=====================================================================================================
	*/
	
	// ambil data format schedule
	function ambil_data_format_schedule() 
	{
		return $this->db->get('v3_format_schedule')->result();
	}
	
	function insert_data_format_schedule_pegawai($fschpeg_id, $fsch, $id_pegawai, $month, $year, $update_by )
	{
		$data = array(
		'fschpeg_id' => $fschpeg_id,
      	'fschpeg_fsch_id' => $fsch, 
		'fschpeg_id_pegawai' => $id_pegawai,
		'fschpeg_month' => $month,
		'fschpeg_year' => $year,
		'fschpeg_update_by' => $update_by
      );
      
	  $this->db->insert('v3_fsch_pegawai', $data); 
      
	  if($this->db->affected_rows())
      	return '1';
      else
      	return '0';
	}
	
	function insert_data_format_schedule_pegawai_absensi($fschpeg_id, $time_in, $time_out,	$offstatus, $update_by, $year)
	{
		$data = array(
		'fschpegabs_fschpeg_id' => $fschpeg_id,
      	'fschpegabs_sch_time_in' => $time_in, 
		'fschpegabs_sch_time_out' => $time_out,
		'fschpegabs_off_status' => $offstatus,
		'fschpegabs_update_by' => $update_by
      );
      
	  $this->db->insert('v3_fschpeg_absensi_'.$year, $data); 
      
	  if($this->db->affected_rows())
      	return '1';
      else
      	return '0';
	}
	
	//untuk ambil schedule pegwai
	// ambil data pegawai berdasarkan unit
	function ambil_data_schedule_pegawai($unit, $month, $year) 
	{
		$this->db->join('v3_pegawai', 'v3_pegawai.peg_nipp = v3_peg_unit.p_unt_nipp', 'left');
		$this->db->join('v3_fsch_pegawai', 'v3_fsch_pegawai.fschpeg_id_pegawai = v3_pegawai.id_pegawai', 'left');
		$this->db->where('v3_peg_unit.p_unt_kode_unit', $unit);
		$this->db->where('v3_fsch_pegawai.fschpeg_month', $month); 
		$this->db->where('v3_fsch_pegawai.fschpeg_year', $year); 
		$data = $this->db->get('v3_peg_unit');
		
		return $data->result_array();
	}
	
	/*
	=====================================================================================================
	 MODEL UNTUK CUTI
	=====================================================================================================
	*/
	
	//tambah data cuti master
	function cuti_add($id_pegawai, $totalcuti, $year, $update_by)
	{
      $data = array(
      	'cm_id_peg' => $id_pegawai, 
		'cm_total' => $totalcuti,
        'cm_year' => $year,
		'cm_status_aktif' => '1',
		'cm_update_by' => $update_by
      );
      
	  $this->db->insert('v3_cuti_master', $data); 
      
	  if($this->db->affected_rows())
      	return '1';
      else
      	return '0';             
    }  
	
	//lihat data libur nasional keseluruhan
	function cuti_pegawai($unit, $year)
	{
		$this->db->order_by('cm_id', 'asc');
		$this->db->join('v3_pegawai', 'v3_pegawai.id_pegawai = v3_cuti_master.cm_id_peg', 'left');
		$this->db->join('v3_peg_unit', 'v3_peg_unit.p_unt_nipp = v3_pegawai.peg_nipp', 'left');
		$this->db->where('v3_peg_unit.p_unt_kode_unit', $unit);
		$this->db->where('v3_cuti_master.cm_year', $year);
		$data = $this->db->get('v3_cuti_master');
		
		return $data->result_array();
	}
		
	//untuk menghapus data libur nasional
	function cuti_del($cm_id)
	{
		return $this->db->delete('v3_cuti_master', array('cm_id' => $cm_id)); 
	}
	
	//untuk mengambil data libur nasional yang mau diedit
	function cuti_viewedit($lnas_id)
	{
		return $this->db->order_by('lnas_date', 'asc')->get_where('v3_libur_nasional', array('lnas_id' => $lnas_id))->result(); 
	}
	
	//untuk menyimpan hasil data libur nasional yang sudah diedit
	function cuti_edit($lnas_id, $lnas_date, $lnas_desc, $lnas_user)
	{
		$data = array(
               'lnas_date' => $lnas_date,
               'lnas_desc' => $lnas_desc,
			   'lnas_update_by' => $lnas_user
        );
		
		$this->db->update('v3_libur_nasional', $data, array('lnas_id' => $lnas_id));
		
		if($this->db->affected_rows())
      		return '1';
      	else
      		return '0';
	}
	
	function cuti_pegawai_edit($cm_id, $id_pegawai, $totalcuti, $year, $update_by)
	{
		$data = array(
               'cm_total' => $totalcuti,
			   'cm_year' => $year,
			   'cm_update_by' => $update_by
        );
		
		$this->db->update('v3_cuti_master', $data, array('cm_id' => $cm_id));
		
		if($this->db->affected_rows())
      		return '1';
      	else
      		return '0';
	}
	
	/*
	=====================================================================================================
	 MODEL UNTUK  ABSENSI
	=====================================================================================================
	*/
	
	function ambil_data_absensi($unit, $month, $year) 
	{
		$this->db->join('v3_pegawai', 'v3_pegawai.peg_nipp = v3_peg_unit.p_unt_nipp', 'left');
		$this->db->join('v3_fsch_pegawai', 'v3_fsch_pegawai.fschpeg_id_pegawai = v3_pegawai.id_pegawai', 'left');
		$this->db->where('v3_peg_unit.p_unt_kode_unit', $unit);
		$this->db->where('v3_fsch_pegawai.fschpeg_month', $month); 
		$this->db->where('v3_fsch_pegawai.fschpeg_year', $year); 
		$data = $this->db->get('v3_peg_unit');
		
		return $data->result_array();
	}
	
	function ambil_data_detail_absensi($fschpeg_id,$year) 
	{
		$this->db->join('v3_fsch_pegawai', 'v3_fsch_pegawai.fschpeg_id = v3_fschpeg_absensi_'.$year.'.fschpegabs_fschpeg_id', 'left');
		$this->db->join('v3_pegawai', 'v3_pegawai.id_pegawai = v3_fsch_pegawai.fschpeg_id_pegawai', 'left');
		$this->db->where('fschpegabs_fschpeg_id', $fschpeg_id); 
		$data = $this->db->get('v3_fschpeg_absensi_'.$year);
		
		return $data->result_array();
	}
	
	function ambil_data_detail_absensi_by_tanggal($fschpeg_id, $fschpeg_tanggal, $year) 
	{
		$this->db->join('v3_fsch_pegawai', 'v3_fsch_pegawai.fschpeg_id = v3_fschpeg_absensi_'.$year.'.fschpegabs_fschpeg_id', 'left');
		$this->db->join('v3_pegawai', 'v3_pegawai.id_pegawai = v3_fsch_pegawai.fschpeg_id_pegawai', 'left');
		$this->db->where('fschpegabs_fschpeg_id', $fschpeg_id); 
		$this->db->where('fschpegabs_id', $fschpeg_tanggal); 
		$data = $this->db->get('v3_fschpeg_absensi_'.$year);
		
		return $data->result_array();
	}
	
	function submit_edit_detail_absensi($fschpeg_id,$fschpeg_tanggal,$year, $data, $user)
	{
		$datestring = "%Y-%m-%d";
		$time = time();
		$date = mdate($datestring, $time);
		
		$data_absensi = array(
			'fschpegabs_sch_time_in' => $data['sch_in'], 
			'fschpegabs_sch_time_out' => $data['sch_out'],
			'fschpegabs_real_time_in' => $data['real_in'], 
			'fschpegabs_real_time_out' => $data['real_out'],
			'fschpegabs_update_on' => $date,
			'fschpegabs_update_by' => $user
		);
		
		$this->db->where('fschpegabs_fschpeg_id', $fschpeg_id); 
		$this->db->where('fschpegabs_id', $fschpeg_tanggal); 
		//print_r($year);
		$this->db->update('v3_fschpeg_absensi_'.$year, $data_absensi); 
	}
	
	#insert data mesin backup
	function input_data_backup_mesin($pin,$datetime,$status)
	{
		$data = array(
		'dbmesin_nipp' => $pin,
      	'dbmesin_datetime' => $datetime, 
		'dbmesin_status' => $status,
		'dbmesin_update_by' => 'admin'
      	);
      
	  	$this->db->insert('v3_databackup_mesin', $data); 	
	}
	
	#insert data mesin to db absensi
	function input_data_absensi_mesin($pin,$datetime,$status)
	{
		# v3_fsch_pegawai cari nilai fschpeg_id-nya berdasarkan id_pegawai, month, dan year
		$this->db->update('v3_libur_nasional', $data, array('lnas_id' => $lnas_id));
	}
	
	
	
	
	  
}

?>