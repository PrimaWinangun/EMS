<div class = "oneTwo">
<br /><?php echo anchor('c_absensi/cuti_add', img(array('src'=>'images/icons/control/32/plus.png','border'=>'0','alt'=>'ADD')), 'title="ADD"' ); ?>


<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Cuti Pegawai</h6></div>
			<?php
			$attributes = array('class'=>'form');
			echo form_open('c_absensi/submit_cuti_pegawai', $attributes);
			?>
                <fieldset class="step" id="w2first">
                    <div class="formRow">
                        <label>UNIT<span class="req">*</span></label>
                        <div class="formRight">
                            <select class="unit" name="unit">
                                <option value="pilih"> -- Pilih Unit -- </option>
                                <?php foreach($showdata as $unit) { ?>
                                <option value="<?php echo $unit['kode_unit']; ?>"><?php echo $unit['kode_unit']; ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>WAKTU:<span class="req">*</span></label>
                        <div class="formRight">
							<?php
							$year = array(
										  '2012' => '2012',
										  '2013' => '2013',
										  '2014' => '2014',
										  '2015' => '2015',
										  '2016' => '2016',
										);
						
							echo form_dropdown('year', $year, '2013');
							?>
                            </div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
				<div class="wizButtons"> 
                    <div class="status" id="status2"></div>
					<span class="wNavButtons">
						<?php 
						$submit = array(
							'class' => 'blueB m110',
							'name' => 'submit_cuti_view',
							'value'	=> 'LIHAT',
						);
						echo form_submit($submit)?>
                    </span>
				</div>
                <div class="clear"></div>
			<?php echo form_close();?>
        </div>
</div>