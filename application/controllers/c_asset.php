<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_asset extends Application {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_absensi');
		$this->load->model('m_asset');
		$this->load->helper('url');
		$this->load->helper('array');
		$this->ag_auth->restrict('user');
	}

	/*
	======================================================================================================
	 CONTROLLER ASSET
	======================================================================================================
	*/
	
	// ambil data nipp pegawai berdasarkan unit
	public function cari_nipp()
	{
		$unit = $this->input->post('kode_unit');
		$data['showdata'] = $this->m_asset->ambil_data_pegawai($unit);
		?>
		<select class="nipp" name="nipp">
			<option value="all">ALL</option>
            
			<?php foreach($data['showdata']->result() as $data) { ?>
		   	<option value="<?php echo $data->id_pegawai; ?>"><?php echo $data->p_unt_nipp; ?></option>
		    <?php } ?>
            
		</select>
        
		<?php	
				
	}
	
	// ambil data nipp pegawai berdasarkan unit
	public function cari_time()
	{
		$fsch_id = $this->input->post('kode_time');
		$data['showdata'] = $this->m_asset->ambil_data_time_schedule($fsch_id);
		?>
		<select class="starttime" name="starttime">            
			<?php foreach($data['showdata']->result() as $data) { ?>
		   	<option value="<?php echo $data->fschtime_id; ?>">
			<?php echo "Day ".$data->fschtime_order. " / "; if($data->fschtime_off_status == "1") { echo "LIBUR"; } else { echo substr($data->fschtime_time_in, 0, 5); } ?></option>
		    <?php } ?>
            
		</select>
        
		<?php	
				
	}
	
	//Function membuat array tanggal sesuai range
	public function createDateRangeArray($start, $end) 
	{
		$range = array();
		if (is_string($start) === true) $start = strtotime($start);
		if (is_string($end) === true ) $end = strtotime($end);
		if ($start > $end) return createDateRangeArray($end, $start);
		do {
		$range[] = date('Y-m-d', $start);
		$start = strtotime("+ 1 day", $start);
		}
		while($start < $end);
		
		return $range;
	} 
		
	//function untuk menambah atau mengurangi tanggal
	public function adddate($vardate,$added)
	{
		$data = explode("-", $vardate);
		$date = new DateTime();            
		$date->setDate($data[0], $data[1], $data[2]);
		$date->modify("".$added."");
		$day= $date->format("Y-m-d");
		return $day;    
	}
		
	//function menghitung jumlah hari
	public function hitunghari($datestart,$dateend)
	{
		$sql = "SELECT datediff('$dateend','$datestart') as selisih"; // for count summary date in a month
		$hasil = mysql_query($sql);
		$data = mysql_fetch_array($hasil);
		$jmlhari = $data['selisih']-1 ;
		return $jmlhari;
	}
		
	//function menamai bulan dengan inputan angka
	public function namabulan($bulan)
	{
		if($bulan == "01") { $bulan = "Januari"; }
		else if($bulan == "02") { $bulan = "Februari"; }
		else if($bulan == "03") { $bulan = "Maret"; }
		else if($bulan == "04") { $bulan = "April"; }
		else if($bulan == "05") { $bulan = "Mei"; }
		else if($bulan == "06") { $bulan = "Juni"; }
		else if($bulan == "07") { $bulan = "Juli"; }
		else if($bulan == "08") { $bulan = "Agustus"; }
		else if($bulan == "09") { $bulan = "September"; }
		else if($bulan == "10") { $bulan = "Oktober"; }
		else if($bulan == "11") { $bulan = "November"; }
		else if($bulan == "12") { $bulan = "Desember"; }
		return $bulan;
	}
	
	//function untuk mengambil nilai 01 dari nilai 1
	public function month($month)
	{
		$array = array('1'=>'01', '2'=>'02', '3'=>'03', '4'=>'04', '5'=>'05', '6'=>'06', '7'=>'07', '8'=>'08', '9'=>'09', '10'=>'10', '11'=>'11', '12'=>'12' );
		$newmonth = element($month, $array);
		return $newmonth;
	}
	
}

?>