<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Input Data Format Schedule</h6></div>
			<?php 
			foreach ($showdata as $sd){}
			$attributes = array('class'=>'form'); //,'id'=>'wizard3');
			echo form_open('c_absensi/update_format_schedule', $attributes);
			echo form_hidden('fsch_id', $sd['fsch_id']);
			?>
                <fieldset class="step" id="w2first">
                    <div class="formRow">
                        <label>NAMA SCHEDULE:<span class="req">*</span></label>
                        <div class="formRight">
						<?php 
						$fsch_name = array('name' => 'fsch_name', 'id'   => 'fsch_name',);
						echo form_input($fsch_name,$sd['fsch_name']); ?><br/>
						<?php echo form_error('fsch_name')?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>JUMLAH HARI:<span class="req">*</span></label>
                        <div class="formRight">
						<?php 
						$fsch_total_day = array('name' => 'fsch_total_day', 'id' => 'fsch_total_day',);
						echo form_input($fsch_total_day,$sd['fsch_total_day']) ?><br/>
						<?php echo form_error('fsch_total_day')?></div>
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
							'name' => 'submit_fsch_add',
							'value'	=> 'NEXT',
						);
						echo form_submit($submit)?>
                    </span>
				</div>
                <div class="clear"></div>
			<?php echo form_close();?>
        </div>
</div>