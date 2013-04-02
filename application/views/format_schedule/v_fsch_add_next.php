<html>
<head>
<title>Welcome to CodeIgniter</title>
</head>
<body>
<?php
$this->load->helper('form');
echo form_open('c_absensi/fsch_submit');
echo form_hidden('fsch_name', $fsch_name);
echo form_hidden('fsch_total_day', $fsch_total_day);
?>
<table width="300" border="1">
  <tr>
    <td colspan="4">Input Master Format Schedule</td>
  </tr>
  <tr>
  	<td>DAY</td>
    <td>TIME IN</td>
    <td>TIME OUT</td>
    <td>STATUS LIBUR</td>
  </tr>
  
  
  <?php for($i=1;$i<=$fsch_total_day;$i++) { ?>
  <tr>
    <td>Day <?php echo $i ?></td>
    <td>
	<?php
    $time = array(
                  '010000' => '01:00',
                  '020000' => '02:00',
                  '030000' => '03:00',
                  '040000' => '04:00',
                  '050000' => '05:00',
                  '060000' => '06:00',
                  '070000' => '07:00',
				  '080000' => '08:00',
                  '090000' => '09:00',
                  '100000' => '10:00',
                  '110000' => '11:00',
                  '120000' => '12:00',
                  '130000' => '13:00',
                  '140000' => '14:00',
                  '150000' => '15:00',
                  '160000' => '16:00',
                  '170000' => '17:00',
                  '180000' => '18:00',
                  '190000' => '19:00',
                  '200000' => '20:00',
                  '210000' => '21:00',
                  '220000' => '22:00',
                  '230000' => '23:00',
                  '240000' => '24:00',
                );

	echo form_dropdown('fschtime_time_in_'.$i, $time, '080000');
    ?>
    </td>
    <td>
	<?php
    $time = array(
                  '010000' => '01:00',
                  '020000' => '02:00',
                  '030000' => '03:00',
                  '040000' => '04:00',
                  '050000' => '05:00',
                  '060000' => '06:00',
                  '070000' => '07:00',
				  '080000' => '08:00',
                  '090000' => '09:00',
                  '100000' => '10:00',
                  '110000' => '11:00',
                  '120000' => '12:00',
                  '130000' => '13:00',
                  '140000' => '14:00',
                  '150000' => '15:00',
                  '160000' => '16:00',
                  '170000' => '17:00',
                  '180000' => '18:00',
                  '190000' => '19:00',
                  '200000' => '20:00',
                  '210000' => '21:00',
                  '220000' => '22:00',
                  '230000' => '23:00',
                  '240000' => '24:00',
                );

	echo form_dropdown('fschtime_time_out_'.$i, $time, '080000');
    ?>
	</td>
    <td>
	<?php
    $status = array(
                  '0' => 'HARI KERJA',
                  '1' => 'HARI LIBUR',
                );

	echo form_dropdown('fschtime_off_status_'.$i, $status, '0');
    ?>
    </td>
  </tr>
  <?php } ?>
  
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><?php echo form_submit('submit_fsch_add_next', 'SIMPAN'); ?></td>
  </tr>
</table>

</body>
</html>