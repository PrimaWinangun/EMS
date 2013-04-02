<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.livequery.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	$('.unit').livequery('change', function() {
		$(this).nextAll('.nipp').remove();
		$.post("<?php echo base_url(); ?>index.php/c_absensi/cari_nipp", {kode_unit: $(this).val(),
		}, function(response){
			setTimeout("selesaiMuatData('tampil_data', '"+escape(response)+"')", 300);
		});
		return false;
	});
	
	$('.format_schedule').livequery('change', function() {
		$(this).nextAll('.starttime').remove();
		$.post("<?php echo base_url(); ?>index.php/c_absensi/cari_time", {kode_time: $(this).val(),
		}, function(response){
			setTimeout("selesaiMuatData('tampil_data2', '"+escape(response)+"')", 300);
		});
		return false;
	});
});

function selesaiMuatData(kode, response){
  $('#'+kode).append(unescape(response));
} 

</script>