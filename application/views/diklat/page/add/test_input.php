<div class="widget">
		  <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>STKP : <?php echo$STKP.' - Tanggal Pelaksanaan :'.$tanggal; ?></h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="display sTable">
                <thead>
                    <tr>
						<td rowspan="2" width="19px">NO</td>
                        <td rowspan="2" width="50px">NIPP</td>
                        <td rowspan="2" width="19px">Mandatory</td>
						<td rowspan="2" width="400px">License</td>
                        <td colspan="2">Validity</td>
                    </tr>
					<tr>
						<td width="120px">Start Date</td>
						<td width="120px">End Date</td>
					</tr>
                </thead>
				<tbody>
				<?php 
				echo form_open('diklat/input_nilai_stkp');
				echo form_hidden('STKP', $STKP);
				echo form_hidden('tanggal', $tanggal);
				for($i=1;$i<=$jumlah;$i++)
					{ 
					echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td align="center"><input type="text" name="nipp<?php echo $i;?>" value="" id="nipp<?php echo $i;?>"  /></td>';
					echo '<td><input type="checkbox" name="mandatory<?php echo $i;?>" id="mandatory<?php echo $i;?>" value="" checked="" /></td>';
					echo '<td align="center"><input type="text" name="license<?php echo $i;?>" value="" id="license<?php echo $i;?>" style="width:80%"  /></td>';
					echo '<td align="center"><input type="text" name="start<?php echo $i;?>" value="" id="start<?php echo $i;?>" style="width:50%" class="maskDate"/></td>';
					echo '<td align="center"><input type="text" name="end<?php echo $i;?>" value="" id="end<?php echo $i;?>" style="width:50%" class="maskDate"/></td>';
					echo '</tr>';
					}?>
				
                </tbody>
				<tfoot>
				<tr><td colspan="6">
				<div class="wizButtons"> 
					<span class="wNavButtons">
                        <input class="blueB ml10" id="next2" value="Submit" type="submit" />
                    </span>
				</div>
				</tr></td>
				</tfoot>
				</form>
			</table>
</div>