<div class="widget">
          <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Data Format Schedule</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Jam Masuk</td>
                        <td>Jam Pulang</td>
                    </tr>
                </thead>
				<tbody>
				<?php $i = 1 ?>
   				<?php foreach ($showdata as $sd): ?>
					<tr>
                        <td><center><?php echo $i++ ?></center></td>
						<?php if($sd->fschtime_off_status == 1) { ?>
                        <td colspan="2" style="background-color:#ffdfdf">OFF</td>
                        <?php } else { ?>
                        <td><?php echo $sd->fschtime_time_in ?></td>
                        <td><?php echo $sd->fschtime_time_out?><?php if($sd->fschtime_time_in >= $sd->fschtime_time_out) { echo " / Next Day"; }?></td>
                        <?php } ?>
                    </tr>
				<?php endforeach ?>
                <tr>
                <td colspan="3"><input class="basic" value="Back" type="reset" onClick="javascript:history.back(1)" /></td>
                </tr>
                </tbody>
            </table>
			
        </div>