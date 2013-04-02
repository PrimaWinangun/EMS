<html>
<head>
<title>Welcome to CodeIgniter</title>
</head>
<body>

<table width="306" height="68" border="1"  cellpadding="0" cellspacing="0"> 
<tr>
    <td>No.</td>
    <td>NIPP</td>
    <td>Unit</td>
    <td>Format Schedule</td>
    <td>Action</td>
</tr>
	<?php $i = 1 ?>
    <?php foreach ($showdata as $sd): ?>
<tr>
    <td><?php echo $i++ ?></td>
    <td><?php echo anchor('c_absensi/fsch_viewdetail/'.$sd->fsch_id.'', $sd->fsch_name); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $sd->fsch_total_day ?></td>
    <td>
		<?php echo anchor('c_absensi/fsch_del/'.$sd->fsch_id.'', 'Del'); ?>
        <?php echo anchor('c_absensi/fsch_edit/'.$sd->fsch_id.'', 'Edit'); ?>    </td>
</tr>
    <?php endforeach ?>
</table>

</body>
</html>