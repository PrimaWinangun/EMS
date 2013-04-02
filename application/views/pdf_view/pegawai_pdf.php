<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>General Flight Information System | PT Gapura Angkasa Denpasar</title>
<link type="text/css" href="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/css/gfis.css" rel="stylesheet"  />
<link type="text/css" href="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />

<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:10px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
table.footer {
font-family: verdana,arial,sans-serif;
	font-size:8px;
	color:#333333;
}
table.header {
font-family: verdana,arial,sans-serif;
	font-size:12px;
	color:#333333;
}
</style>
	
</head>

<body>
<table border="0" align="center" class="header">
    	<tr>
        	<th colspan="12"><b>PT GAPURA ANGKASA</b></th>
        </tr>
        <tr>
            <th scope="col" width="75px" align="center"></th>
            <th scope="col" width="50px">&nbsp;</th>
            <th scope="col" width="45px">&nbsp;</th>
            <th scope="col" width="45px">&nbsp;</th>
            <th scope="col" width="45px">&nbsp;</th>
            <th scope="col" width="45px">&nbsp;</th>
            <th scope="col" width="45px">&nbsp;</th>
            <th scope="col" width="75px">&nbsp;</th>
            <th scope="col" width="50px">&nbsp;</th>
            <th scope="col" width="50px">&nbsp;</th>
            
            <th scope="col" width="120px"><?php echo mdate("%d-%m-%Y", time()); ?></th>
		</tr>
</table>


<table class="gridtable" border="1">
<tr>
	<th scope="col" width="50px" align="center">NO</th>
	<th scope="col" width="75px" align="center">NIPP</th>
	<th scope="col" width="50px" align="center">NAMA</th>
	<th scope="col" width="50px" align="center">TEMPAT LAHIR</th>
	<th scope="col" width="50px" align="center">TANGGAL LAHIR</th>
	<th scope="col" width="50px" align="center">SEX</th>
	<th scope="col" width="50px" align="center">GOL DARAH</th>
</tr>

<?php 
$i = 1;

foreach ($data_pegawai as $row_pegawai)
{
	echo '<tr>';
	
	echo '<td align="center">';
	echo $i;
	echo '</td>';
	
	echo '<td align="center">';
	echo $row_pegawai['peg_nipp'];
	echo '</td>';
	
	echo '<td align="center">';
	$nama = strtoupper($row_pegawai['peg_nama']);
	echo $nama;
	echo '</td>';
	
	echo '<td align="center">';
	$tmpt = strtoupper($row_pegawai['peg_tmpt_lahir']);
	echo $tmpt;
	echo '</td>';
	
	echo '<td align="center">';
	echo $row_pegawai['peg_tgl_lahir'];
	echo '</td>';
	
	echo '<td align="center">';
	$sex =  strtoupper($row_pegawai['peg_jns_kelamin']);
	echo $sex;
	echo '</td>';
	
	echo '<td align="center">';
	echo $row_pegawai['peg_gol_darah'];
	echo '</td>';
	
	echo '</tr>';
	
	$i++;
}



?>
</table>
</body>
</html>