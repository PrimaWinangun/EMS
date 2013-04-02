<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Data Pegawai</title>

	
</head>
<body>

<div id="container">
	<?php 
	$number = 1;
	foreach ($pegawai as $row_pegawai) :
	{ 
		$detail = anchor('pekerja/get_pegawai/'.$row_pegawai['nipp'],'Detail');
		$this->table->add_row($number,$row_pegawai['nipp'],$row_pegawai['nama'],$row_pegawai['tmpt_lahir'],$row_pegawai['tgl_lahir'],$row_pegawai['jns_kelamin'],$row_pegawai['gol_darah'],$detail);
		$number++;
	}endforeach;
	echo $this->table->generate(); ?>
	
</div>

</body>
</html>