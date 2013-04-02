<br /><?php echo anchor('c_absensi/add_format_schedule', img(array('src'=>'images/icons/control/32/plus.png','border'=>'0','alt'=>'ADD')), 'title="ADD"' ); ?>
<div class="widget">
          <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Data Format Schedule</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Jumlah Hari</td>
                        <td>Action</td>
                    </tr>
                </thead>
				<tbody>
				<?php $i = 1 ?>
   				<?php foreach ($showdata as $sd): ?>
					<tr>
                        <td><center><?php echo $i++ ?></center></td>
						<td><center><?php echo anchor('c_absensi/detail_format_schedule/'.$sd->fsch_id.'', $sd->fsch_name); ?></center></td>
						<td><center><?php echo $sd->fsch_total_day ?></center></td>
						<td>
						<?php echo anchor('c_absensi/fsch_edit/'.$sd->fsch_id, 
						img(array('src'=>'images/icons/color/pencil.png','border'=>'0','alt'=>'Edit')), 'title="Edit"' ); ?>
                        <?php echo " "; ?>
        				<?php echo anchor('c_absensi/del_format_schedule/'.$sd->fsch_id, 
						img(array('src'=>'images/icons/color/cross.png','border'=>'0','alt'=>'Delete')), 'title="Delete"' ); ?>
        				</td>
                    </tr>
				<?php endforeach ?>
                </tbody>
            </table>
			
        </div>