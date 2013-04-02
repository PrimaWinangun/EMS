<html>
<head>
<title>Welcome to CodeIgniter</title>
</head>
<body>
<?php
$this->load->helper('form');
echo form_open('c_absensi/fsch_submit');
?>
<table width="300" border="1">
  <tr>
    <td colspan="3">Input Master Format Schedule</td>
  </tr>
  <tr>
    <td>Nama Schedule</td>
    <td>:</td>
    <td><?php echo form_input('fsch_name'); ?></td>
  </tr>
  <tr>
    <td>Jumlah Hari Kerja + Libur</td>
    <td>:</td>
    <td><?php echo form_input('fsch_total_day'); ?></td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><?php echo form_submit('submit_fsch_add', 'NEXT'); ?></td>
  </tr>
</table>

</body>
</html>