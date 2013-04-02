<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Data Anak Pegawai</h6></div>
			<?php 
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open('pekerja/edit_data_anak/'.$this->uri->segment(3), $attributes); ?>
			<fieldset class="step" id="w2first">
                    <h1>Edit Data Anak</h1>
			<?php
			foreach ($anak as $row_anak) : 
			{ ?>
                    <div class="formRow">
                        <label>Nama:</label>
                        <div class="formRight"><?php 
						$nama = array(
							'name' => 'nama',
							'id'   => 'nama',
							'value'=> $row_anak['peg_ank_nama']
						);
						echo form_input($nama) ?><br/>
						<?php echo form_error('nama')?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Tempat Lahir:</label>
                        <div class="formRight"><?php 
						$tempat = array(
							'name' => 'tempat',
							'id'   => 'tempat',
							'value'=> $row_anak['peg_ank_tempat_lahir']
						);
						echo form_input($tempat) ?><br/>
						<?php echo form_error('tempat')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal Lahir:</label>
                        <div class="formRight"><?php 
						$tanggal = array(
							'name' => 'tanggal',
							'id'   => 'tanggal',
							'value'=> $row_anak['peg_ank_tgl_lahir']
						);
						echo form_input($tanggal) ?><br/>
						<?php echo form_error('tanggal')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Pendidikan:</label>
                        <div class="formRight"><?php 
						$pendidikan = array(
							'name' => 'pendidikan',
							'id'   => 'pendidikan',
							'value'=> $row_anak['peg_ank_pendidikan']
						);
						echo form_input($pendidikan) ?><br/>
						<?php echo form_error('pendidikan')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        
                    </div>
                </fieldset>
			<?php } endforeach;
			
			?>
                
				<div class="wizButtons"> 
                    <div class="status" id="status2"></div>
					<span class="wNavButtons">
						<?php 
						$submit = array(
							'class' => 'blueB m110',
							'id'	=> 'next2',
							'value'	=> 'Submit',
						);
						echo form_submit($submit)?>
                    </span>
				</div>
                <div class="clear"></div>
			<?php echo form_close();?>
			<div class="data" id="w2"></div>
        </div>
</div>