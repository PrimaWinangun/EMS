<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Input Data Pakai Cuti Pegawai</h6></div>
			<?php 
			$this->load->view('asset/v_asset');
			$attributes = array('class'=>'form'); //,'id'=>'wizard3');
			echo form_open('c_absensi/submit_pakai_cuti', $attributes);
			?>
                <fieldset class="step" id="w2first">
					<div class="formRow">
                        <label>NIPP:<span class="req">*</span></label>
                        <div class="formRight">
							<div id="tampil_data">
                            <select class="unit" name="unit">
                                <option value="pilih"> -- Pilih Unit -- </option>
                                <?php foreach($showdata as $unit) { ?>
                                <option value="<?php echo $unit['kode_unit']; ?>"><?php echo $unit['kode_unit']; ?></option>
                                <?php } ?>
                            </select>
                            </div>
						</div>
                        <div class="clear"></div>
                    </div>
				</fieldset>
				<div class="wizButtons"> 
                    <div class="status" id="status2"></div>
					<span class="wNavButtons">
                        <input class="basic" id="back2" value="RESET" type="reset" />
						<?php 
						$submit = array(
							'class' => 'blueB m110',
							'name' => 'submit_pakai_cuti_add',
							'value'	=> 'NEXT',
						);
						echo form_submit($submit)?>
                    </span>
				</div>
                <div class="clear"></div>
			<?php echo form_close();?>
        </div>
</div>