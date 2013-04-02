<html>
<head>
<title>Welcome to CodeIgniter</title>
</head>
<body>
<?php
$this->load->helper('form');
echo form_open('c_absensi/lnas_submit');
?>
<table width="300" border="1">
  <tr>
    <td colspan="3">Input Master Libur Nasional</td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td><?php 
	echo form_input('lnas_date', @$lnas_date, 'class'=>'maskDate'); ?></td>
  </tr>
  <tr>
    <td>Deskripsi</td>
    <td>:</td>
    <td><?php echo form_input('lnas_desc', @$lnas_desc); ?></td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><?php echo form_submit('submit_lnas_add', 'SIMPAN'); ?></td>
  </tr>
</table>

</body>
</html>