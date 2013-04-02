<br /><?php echo anchor('c_absensi/add_hari_libur', img(array('src'=>'images/icons/control/32/plus.png','border'=>'0','alt'=>'ADD')), 'title="ADD"' ); ?>
<div class="widget">
          <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Data Hari Libur</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Deskripsi</td>
                        <td>Action</td>
                    </tr>
                </thead>
				<tbody>
				<?php $i = 1 ?>
   				<?php foreach ($showdata as $sd): ?>
					<tr>
                        <td><center><?php echo $i++ ?></center></td>
						<td><center><?php echo $sd->lnas_date ?></center></td>
						<td><?php echo $sd->lnas_desc ?></td>
						<td>
						<?php echo anchor('c_absensi/edit_hari_libur/'.$sd->lnas_id.'', 
						img(array('src'=>'images/icons/color/pencil.png','border'=>'0','alt'=>'Edit')), 'title="Edit"' ); ?>
                        <?php echo " "; ?>
        				<?php echo anchor('c_absensi/del_hari_libur/'.$sd->lnas_id.'', 
						img(array('src'=>'images/icons/color/cross.png','border'=>'0','alt'=>'Delete')), 'title="Delete"' ); ?>
        				</td>
                    </tr>
				<?php endforeach ?>
                </tbody>
            </table>
			
        </div>