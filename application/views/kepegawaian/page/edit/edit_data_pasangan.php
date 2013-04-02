<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Data Pribadi Pegawai</h6></div>
			<?php 
			foreach ($pasangan as $row_pasangan) : 
			{} endforeach;
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open('pekerja/edit_data_pasangan/'.$this->uri->segment(3), $attributes) ?>
                <fieldset class="step" id="w2first">
                    <h1>Edit Data Pasangan</h1>
                    <div class="formRow">
                        <label>Nama:</label>
                        <div class="formRight"><?php 
						$nama = array(
							'name' => 'nama',
							'id'   => 'nama',
							'value'=> $row_pasangan['p_ps_nama']
						);
						echo form_input($nama) ?><br/>
						<?php echo form_error('nama')?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Tempat Lahir:</label>
                        <div class="formRight"><?php 
						$tempat = array(
							'name' => 'tempat_lahir',
							'id'   => 'tempat_lahir',
							'value'=> $row_pasangan['p_ps_tmpt_lahir']
						);
						echo form_input($tempat) ?><br/>
						<?php echo form_error('tempat')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal Lahir:</label>
                        <div class="formRight"><?php 
						$tgl_lahir = array(
							'name' => 'tgl_lahir',
							'id'   => 'tgl_lahir',
							'value'=> $row_pasangan['p_ps_tgl_lahir']
						);
						echo form_input($tgl_lahir) ?><br/>
						<?php echo form_error('tgl_lahir')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal Meninggal:</label>
                        <div class="formRight"><?php 
						$tgl_meninggal = array(
							'name' => 'tgl_meninggal',
							'id'   => 'tgl_meninggal',
							'value'=> $row_pasangan['p_ps_tgl_meninggal']
						);
						echo form_input($tgl_meninggal) ?><br/>
						<?php echo form_error('tgl_meninggal')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Alamat:</label>
                        <div class="formRight"><?php 
						$alamat = array(
							'name' => 'alamat',
							'id'   => 'alamat',
							'value'=> $row_pasangan['p_ps_alamat']
						);
						echo form_input($alamat) ?><br/>
						<?php echo form_error('alamat')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Pekerjaan:</label>
                        <div class="formRight"><?php 
						$pekerjaan = array(
							'name' => 'pekerjaan',
							'id'   => 'pekerjaan',
							'value'=> $row_pasangan['p_ps_pekerjaan']
						);
						echo form_input($pekerjaan) ?><br/>
						<?php echo form_error('pekerjaan')?></div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
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