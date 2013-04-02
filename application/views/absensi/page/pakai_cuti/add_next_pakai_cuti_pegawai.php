<?php $this->load->helper('asset'); ?>
<div class = "oneTwo">
    <div class="widget">
          <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Input Data Pakai Cuti Pegawai</h6></div>
            <?php 
			$this->load->view('asset/v_asset');
			$attributes = array('class'=>'form'); //,'id'=>'wizard3');
			echo form_open('c_absensi/submit_pakai_cuti', $attributes);
			echo form_hidden('id_pegawai' ,$id_pegawai);
			echo form_hidden('sisa_cuti_tahun_lalu' ,$sisa_cuti_tahun_lalu);
			?>
                <fieldset class="step" id="w2first">
                    <div class="formRow">
                        <label>NIPP:<span class="req">*</span></label>
                        <div class="formRight">
						<?php 
						foreach ($pegawai as $row_peg){}
						$nipp = array('name' => 'nipp', 'id'   => 'nipp', 'readonly'=>'readonly');
						echo form_input($nipp ,$row_peg['peg_nipp']) ?><br/>
						<?php echo form_error('nipp'); ?> 
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>SISA CUTI :<span class="req">*</span></label>
                        <div class="formRight">
						<?php 
						$sc_form = array('name' => 'sisa_cuti', 'id'   => 'sisa_cuti', 'readonly'=>'readonly');
						echo form_input($sc_form , $sisa_cuti) ?><br/>
						<?php echo form_error('sisa_cuti'); ?> 
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>MULAI CUTI:<span class="req">*</span></label>
                        <div class="formRight">
						<?php 
						$date = array(
							'name'  => 'date', 
							'id'    => 'date', 
							'title' => 'yyyy-mm-dd',
							'class'=> 'maskDate'
							);
						echo form_input($date) ?><br/>
						<?php echo form_error('date')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>LAMA CUTI :<span class="req">*</span></label>
                        <div class="formRight">
						<select name="lama_cuti">
                                <option value=""> -- Jumlah Hari -- </option>
                                <?php  for($i=$sisa_cuti; $i>0; $i--) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                        </select>
						</div>
						
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>KETERANGAN :<span class="req">*</span></label>
                        <div class="formRight">
						<?php 
						$ket = array(
							'name'  => 'keterangan', 
							'id'    => 'keterangan', 
							);
						echo form_textarea($ket); ?><br/>
						<?php echo form_error('keterangan')?>
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
							'name' => 'submit_pakai_cuti_add_next',
							'value'	=> 'SAVE',
						);
						echo form_submit($submit)?>
                    </span>
				</div>
                <div class="clear"></div>
			<?php echo form_close();?>
			
			
                
        </div>
</div>