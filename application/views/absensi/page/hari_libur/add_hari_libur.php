<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" />
            <h6>Input Data Hari Libur</h6></div>
			<?php 
			$attributes = array('class'=>'form'); //,'id'=>'wizard3');
			echo form_open('c_absensi/submit_hari_libur', $attributes);
			?>
                <fieldset class="step" id="w1first">
                    <div class="formRow">
                        <label>TANGGAL :<span class="req">*</span></label>
                        <div class="formRight">
						<?php 
						$date = array('name' => 'date', 'id'   => 'date', 'title' => 'yyyy-mm-dd', 'class'=>'maskDate');
						echo form_input($date) ?><br/>
						<?php echo form_error('date')?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>DESKRIPSI:<span class="req">*</span></label>
                        <div class="formRight">
						<?php 
						$desc = array('name' => 'desc', 'id' => 'desc',);
						echo form_input($desc) ?><br/>
						<?php echo form_error('desc')?></div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
				<div class="wizButtons"> 
                    <div class="status" id="status1"></div>
					<span class="wNavButtons">
                        <input class="basic" id="back2" value="RESET" type="reset" />
						<?php 
						$submit = array(
							'class' => 'blueB m110',
							'name' => 'submit_lnas_add',
							'value'	=> 'SIMPAN',
						);
						echo form_submit($submit)?>
                    </span>
				</div>
                <div class="clear"></div>
			<?php echo form_close();?>
        </div>
</div>