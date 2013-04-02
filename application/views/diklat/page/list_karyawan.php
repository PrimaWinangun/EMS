<div class="widgets">
<div class="twoOne"> 
<div class="widget"> 
<br/><br/>
	<fieldset class="step" id="w2first"> <div class="searchWidget1">
                    <?php echo form_open('diklat/search_pegawai');?>
                        &nbsp &nbsp <input type="text" name="search" placeholder="Enter search text..." />
                        <input type="submit" name="find" value="" />
                    </form>
	</div></fieldset>
	</div> 
<div class="oneTwo"> 
<br/>
</div>
	

	<div class="widget">
		  <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Data Pegawai</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="display sTable">
                <thead>
                    <tr>
                        <td>NIPP</td>
                        <td>Nama</td>
						<td>Unit</td>
                        <td>More</td>
                    </tr>
                </thead>
				<tfoot>
					<tr><td colspan="4"><center><div class="pagination"><?php echo $this->pagination->create_links();?></td></tr></div>
				</tfoot>
				<tbody>
				<?php 
				echo form_open('diklat/submit_stkp');
				foreach ($pegawai as $row_pegawai) :
				{
					$datestring = "%d-%m-%Y" ; ?>
					<tr>
						<td><center><?php echo $row_pegawai['peg_nipp']; ?></center></td>
						<td><?php echo $row_pegawai['peg_nama']; ?></td>
						<td><?php echo $row_pegawai['p_unt_kode_unit']?></td>
						<td><center><?php echo anchor('diklat/add_new_stkp/'.$row_pegawai['peg_nipp'],img(array('src'=>"images/plus.png", 'alt'=>'Add New STKP'))); ?></center></td>
                    </tr> <?php
				}endforeach; 
				echo form_close();?>
                </tbody>
            </table>
			</div>
        </div>
	</div>	

	</div>