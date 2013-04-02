<html>
<head>
<title>Welcome to CodeIgniter</title>
</head>
<body>
<?php
$this->load->view('asset/v_asset');
$this->load->helper('form');
echo form_open('c_absensi/fschpeg_submit');
?>
<table width="498" border="1">
  <tr>
    <td colspan="3">Input Schedule Pegawai</td>
  </tr>
  <tr>
    <td width="159">NIPP</td>
    <td width="3">:</td>
    <td width="314">
	<div id="tampil_data">
	<select class="unit" name="unit">
		<option value="pilih"> -- Pilih Unit -- </option>
		<?php foreach($showdata as $unit) { ?>
		<option value="<?php echo $unit->unit_code; ?>"><?php echo $unit->unit_code; ?></option>
		<?php } ?>
	</select>
	</div>
    </td>
  </tr>
  <tr>
    <td>Pilih Schedule</td>
    <td>:</td>
    <td>
	<select class="format_schedule" name="format_schedule">
		<option value="pilih"> -- Pilih Schedule -- </option>
		<?php foreach($showdata2 as $fsch) { ?>
		<option value="<?php echo $fsch->fsch_id; ?>"><?php echo $fsch->fsch_name; ?></option>
		<?php } ?>
	</select>
    </td>
  </tr>
  <tr>
    <td>Start Schedule</td>
    <td>:</td>
    <td>
    <div id="tampil_data2">
	</div>
    </td>
  </tr>
  <tr>
    <td>Waktu Penggunaan</td>
    <td>:</td>
    <td>
    <?php
	$month = array(
                  '01' => 'JANUARI',
                  '02' => 'FEBRUARI',
                  '03' => 'MARET',
                  '04' => 'APRIL',
                  '05' => 'MEI',
                  '06' => 'JUNI',
                  '07' => 'JULI',
                  '08' => 'AGUSTUS',
                  '09' => 'SEPTEMBER',
                  '10' => 'OKTOBER',
                  '11' => 'NOVEMBER',
                  '12' => 'DESEMBER',
                );

	echo form_dropdown('month', $month, '01');
	
	$year = array(
                  '2012' => '2012',
                  '2013' => '2013',
                  '2014' => '2014',
                  '2015' => '2015',
                  '2016' => '2016',
                );

	echo form_dropdown('year', $year, '2012');
	?>
    </td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><?php echo form_submit('submit_fschpeg_add', 'SIMPAN'); ?></td>
  </tr>
</table>

</body>
</html>