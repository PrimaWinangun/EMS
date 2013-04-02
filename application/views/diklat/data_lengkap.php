<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Data Pegawai</title>

</head>
<body>

<div id="container">
	<table border=1>
	<thead><b>Data Pegawai</b></thead>
	<?php 
	foreach ($pegawai as $row_pegawai) :
	{ 
		if ($row_pegawai['jns_kelamin'] == 'P')
		{
			$kelamin = 'Perempuan';
		}
		else
		{
			$kelamin = 'Laki Laki';
		}
		if ($row_pegawai['gol_darah'] == NULL)
		{
			$gol_darah = '-';
		}
		else
		{
			$gol_darah = $row_pegawai['gol_darah'];
		}
		$datestring = "%d-%m-%Y" ;
		$tgl_lahir = mdate($datestring,strtotime($row_pegawai['tgl_lahir']));?>
		<tr><td>NIPP</td><td>:</td><td><?echo $row_pegawai['nipp']; ?></td></tr>
		<tr><td>Nama</td><td>:</td><td><?echo $row_pegawai['nama']; ?></td></tr>
		<tr><td>TTL</td><td>:</td><td><?echo $row_pegawai['tmpt_lahir'].'/'.$tgl_lahir; ?></td></tr>
		<tr><td>Jenis Kelamin</td><td>:</td><td><?echo $kelamin; ?></td></tr>
		<tr><td>Gol. Darah</td><td>:</td><td><?echo $gol_darah ?></td></tr>
	<?php } endforeach; 
	foreach ($data_agama as $row_agama) :
	{ ?>
		<tr><td>Agama</td><td>:</td><td><?echo $row_agama['agama']; ?></td></tr>
	<?php } endforeach; 
	foreach ($data_alamat as $row_alamat) :
	{ 
		if ($row_alamat['jalan'] != NULL)
		{
			$jalan = 'Jln. '.$row_alamat['jalan'];
		}
		else
		{
			$jalan = '- ';
		}
		if ($row_alamat['kelurahan'] != NULL)
		{
			$kelurahan = ', '.$row_alamat['kelurahan'];
		}
		else
		{
			$kelurahan = '';
		}
		if ($row_alamat['kecamatan'] != NULL)
		{
			$kecamatan = ', '.$row_alamat['kecamatan'];
		}
		else
		{
			$kecamatan = '';
		}
		if ($row_alamat['kabupaten'] != NULL)
		{
			$kabupaten = ', '.$row_alamat['kabupaten'];
		}
		else
		{
			$kabupaten = '';
		}
		if ($row_alamat['provinsi'] != NULL)
		{
			$provinsi = ', '.$row_alamat['provinsi'];
		}
		else
		{
			$provinsi = '';
		}
		if ($row_alamat['no_telp'] != NULL)
		{
			$no_telp = $row_alamat['no_telp'];
		}
		else
		{
			$no_telp = '-';
		}
		if ($row_alamat['email'] != NULL)
		{
			$email = $row_alamat['email'];
		}
		else
		{
			$email = '-';
		}
		
		$alamat = $jalan.$kelurahan.$kecamatan.$kabupaten.$provinsi;?>
		<tr><td>Alamat</td><td>:</td><td><?echo $alamat; ?></td></tr>
		<tr><td>No. Telp</td><td>:</td><td><?echo $no_telp; ?></td></tr>
		<tr><td>Email</td><td>:</td><td><?echo $email; ?></td></tr>
	<?php } endforeach; 
	foreach ($data_fisik as $row_fisik) :
	{ 
		if ($row_fisik['tinggi'] != NULL)
		{
			$tinggi = $row_fisik['tinggi'].' cm';
		}
		else
		{
			$tinggi = '-';
		}if ($row_fisik['berat'] != NULL)
		{
			$berat = $row_fisik['berat'].' kg';
		}
		else
		{
			$berat = '-';
		}?>
		<tr><td>Tinggi</td><td>:</td><td><?echo $tinggi; ?></td></tr>
		<tr><td>Berat</td><td>:</td><td><?echo $berat; ?></td></tr>
	<?php } endforeach; 
	$jumlah = 1; ?>
	</table>
	<br/>
	<table border=1>
	<tr><td colspan=3><b>Data Jabatan</b></td></tr>
	<tr><td>No.</td><td>Jabatan</td><td>Terhitung Mulai Tanggal</td></tr>
	<?php 
	foreach ($data_jabatan_tmt as $row_jabatan_tmt) :
	{ 	
		$datestring = "%d-%m-%Y" ;
		$tmt = mdate($datestring,strtotime($row_jabatan_tmt['tmt']));?>
			<td><?php echo $jumlah ?></td><td><?echo $row_jabatan_tmt['jabatan']?></td><td><?php echo $tmt; ?></td></tr>
		<?php $jumlah++;
	} endforeach; 
	$jumlah = 1;?>
	<tr><td colspan=3><b>Data Pendidikan</b></td></tr>
	<tr><td>Bahasa</td><td>:</td>
	<?php foreach ($data_bahasa as $row_bahasa) :
	{ 	
		if ($jumlah == 1)
		{?>
			<td><?echo $row_bahasa['bahasa'];?></td></tr>
		<?php }
		else
		{ ?>
			<td></td><td></td><td><?echo $row_bahasa['bahasa']; ?></td></tr>
		<?php } 
		$jumlah++;
	} endforeach;
	$jumlah = 1;?>
	</table>
	<table>
	<tr><td>No.</td><td>Pendidikan</td><td>Lulusan</td></tr>
	<?php foreach ($data_pendidikan as $row_pendidikan) :
	{ ?>
			<td><?php echo $jumlah; ?></td><td><?echo $row_pendidikan['tingkat'];?></td><td><?php echo $row_pendidikan['lp']; ?></td></tr>
		<?php 
		$jumlah++;
	} endforeach;?>
	</table>
</div>

</body>
</html>

 