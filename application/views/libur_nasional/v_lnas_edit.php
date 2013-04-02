<html>
<head>
<title>Welcome to CodeIgniter</title>
</head>
<body>
<?php
$this->load->helper('form');
echo form_open('c_absensi/lnas_submit');
foreach ($showdata as $sd):
echo form_hidden('lnas_id', $sd->lnas_id);
?>
<table width="300" border="1">
  <tr>
    <td colspan="3">Edit Master Libur Nasional</td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td><?php echo form_input('lnas_date', $sd->lnas_date, 'readonly'); ?></td>
  </tr>
  <tr>
    <td>Deskripsi</td>
    <td>:</td>
    <td><?php echo form_input('lnas_desc', $sd->lnas_desc); ?></td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><?php echo form_submit('submit_lnas_edit', 'SIMPAN'); ?></td>
  </tr>
</table>
<?php endforeach ?>

</body>
</html>