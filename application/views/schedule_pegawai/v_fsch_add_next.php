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
    <td colspan="3">Input Master Format Schedule</td>
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
    <td><?php echo form_input('fschtime_time_in_'.$i); ?></td>
    <td><?php echo form_input('fschtime_time_out_'.$i); ?></td>
    <td><?php echo form_input('fschtime_off_status_'.$i); ?></td>
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