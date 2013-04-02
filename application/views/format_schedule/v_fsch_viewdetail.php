<html>
<head>
<title>Welcome to CodeIgniter</title>
</head>
<body>

<table width="306" height="68" border="1"  cellpadding="0" cellspacing="0"> 
<tr>
    <td>No.</td>
    <td>Time In</td>
    <td>Time Out</td>
</tr>
<?php $i = 1 ?>
<?php foreach ($showdata as $sd): ?>
<tr>
	<td><?php echo $i++ ?></td>
	<?php if($sd->fschtime_off_status == 1) { ?>
    <td colspan="2">LIBUR</td>
    <?php } else { ?>
    <td><?php echo $sd->fschtime_time_in ?></td>
    <td><?php echo $sd->fschtime_time_out?><?php if($sd->fschtime_time_in >= $sd->fschtime_time_out) { echo " / Next Day"; }?></td>
    <?php } ?>
</tr>
<?php endforeach ?>
</table>

</body>
</html>