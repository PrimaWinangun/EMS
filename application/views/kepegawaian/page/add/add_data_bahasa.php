<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Data Bahasa Pegawai</h6></div>
			<?php 
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open('pekerja/add_data_bahasa/', $attributes) ?>
                <fieldset class="step" id="w2first">
					<?php echo form_hidden('nipp',$this->uri->segment(3))?>
                    <h1>Data Bahasa</h1>
					<div class="formRow">
                        <label>Bahasa yang dikuasai:</label>
                        <div class="formRight"><input type="text" name="bahasa" id="bahasa" /></div>
                        <div class="clear"></div>
                    </div>
				</fieldset>
				<div class="wizButtons"> 
                    <div class="status" id="status2"></div>
					<span class="wNavButtons">
                        <input class="blueB ml10" id="next2" value="Next" type="submit" />
                    </span>
				</div>
                <div class="clear"></div>
			</form>
			<div class="data" id="w2"></div>
        </div>
</div>