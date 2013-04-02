<html>
<head>
<title>Welcome to CodeIgniter</title>
</head>
<body>

<table width="306" height="68" border="1"  cellpadding="0" cellspacing="0"> 
<tr>
    <td>No.</td>
    <td>Tanggal</td>
    <td>Deskripsi</td>
    <td>Action</td>
</tr>
	<?php $i = 1 ?>
    <?php foreach ($showdata as $sd): ?>
<tr>
    <td><?php echo $i++ ?></td>
    <td><?php echo $sd->lnas_date ?></td>
    <td><?php echo $sd->lnas_desc ?></td>
    <td>
		<?php echo anchor('c_absensi/lnas_del/'.$sd->lnas_id.'', 'Del'); ?>
        <?php echo anchor('c_absensi/lnas_edit/'.$sd->lnas_id.'', 'Edit'); ?>
    </td>
</tr>
    <?php endforeach ?>
</table>

</body>
</html>