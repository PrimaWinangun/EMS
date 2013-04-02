<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Data Pribadi Pegawai</h6></div>
			<?php 
			foreach ($mertua_ayah as $row_mertua_ayah) : 
			{} endforeach;
			foreach ($mertua_ibu as $row_mertua_ibu) : 
			{} endforeach;
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open('pekerja/edit_data_mertua/'.$this->uri->segment(3), $attributes) ?>
                <fieldset class="step" id="w2first">
                    <h1>Edit Data Mertua - Ayah</h1>
                    <div class="formRow">
                        <label>Nama:</label>
                        <div class="formRight"><?php 
						$nama = array(
							'name' => 'nama_ayah',
							'id'   => 'nama_ayah',
							'value'=> $row_mertua_ayah['p_may_nama']
						);
						echo form_input($nama) ?><br/>
						<?php echo form_error('nama')?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Tempat Lahir:</label>
                        <div class="formRight"><?php 
						$tempat = array(
							'name' => 'tempat_ayah',
							'id'   => 'tempat_ayah',
							'value'=> $row_mertua_ayah['p_may_tmpt_lahir']
						);
						echo form_input($tempat) ?><br/>
						<?php echo form_error('tempat')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal Lahir:</label>
                        <div class="formRight"><?php 
						$tgl_lahir = array(
							'name' => 'tgl_ayah',
							'id'   => 'tgl_ayah',
							'value'=> $row_mertua_ayah['p_may_tgl_lahir']
						);
						echo form_input($tgl_lahir) ?><br/>
						<?php echo form_error('tgl_lahir')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal Meninggal:</label>
                        <div class="formRight"><?php 
						$tgl_meninggal = array(
							'name' => 'meninggal_ayah',
							'id'   => 'meninggal_ayah',
							'value'=> $row_mertua_ayah['p_may_tgl_meninggal']
						);
						echo form_input($tgl_meninggal) ?><br/>
						<?php echo form_error('tgl_meninggal')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Alamat:</label>
                        <div class="formRight"><?php 
						$alamat = array(
							'name' => 'almt_ayah',
							'id'   => 'almt_ayah',
							'value'=> $row_mertua_ayah['p_may_alamat']
						);
						echo form_input($alamat) ?><br/>
						<?php echo form_error('alamat')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Pekerjaan:</label>
                        <div class="formRight"><?php 
						$pekerjaan = array(
							'name' => 'kerja_ayah',
							'id'   => 'kerja_ayah',
							'value'=> $row_mertua_ayah['p_may_pekerjaan']
						);
						echo form_input($pekerjaan) ?><br/>
						<?php echo form_error('pekerjaan')?></div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
				<fieldset id="w2confirmation" class="step">
                    <h1>Edit Data Mertua - Ibu</h1>
                    <div class="formRow">
                        <label>Nama:</label>
                        <div class="formRight"><?php 
						$nama = array(
							'name' => 'nama_ibu',
							'id'   => 'nama_ibu',
							'value'=> $row_mertua_ibu['p_mib_nama']
						);
						echo form_input($nama) ?><br/>
						<?php echo form_error('nama')?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Tempat Lahir:</label>
                        <div class="formRight"><?php 
						$tempat = array(
							'name' => 'tempat_ibu',
							'id'   => 'tempat_ibu',
							'value'=> $row_mertua_ibu['p_mib_tmpt_lahir']
						);
						echo form_input($tempat) ?><br/>
						<?php echo form_error('tempat')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal Lahir:</label>
                        <div class="formRight"><?php 
						$tgl_lahir = array(
							'name' => 'tgl_ibu',
							'id'   => 'tgl_ibu',
							'value'=> $row_mertua_ibu['p_mib_tgl_lahir']
						);
						echo form_input($tgl_lahir) ?><br/>
						<?php echo form_error('tgl_lahir')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal Meninggal:</label>
                        <div class="formRight"><?php 
						$tgl_meninggal = array(
							'name' => 'meninggal_ibu',
							'id'   => 'meninggal_ibu',
							'value'=> $row_mertua_ibu['p_mib_tgl_meninggal']
						);
						echo form_input($tgl_meninggal) ?><br/>
						<?php echo form_error('tgl_meninggal')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Alamat:</label>
                        <div class="formRight"><?php 
						$alamat = array(
							'name' => 'almt_ibu',
							'id'   => 'almt_ibu',
							'value'=> $row_mertua_ibu['p_mib_alamat']
						);
						echo form_input($alamat) ?><br/>
						<?php echo form_error('alamat')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Pekerjaan:</label>
                        <div class="formRight"><?php 
						$pekerjaan = array(
							'name' => 'kerja_ibu',
							'id'   => 'kerja_ibu',
							'value'=> $row_mertua_ibu['p_mib_pekerjaan']
						);
						echo form_input($pekerjaan) ?><br/>
						<?php echo form_error('pekerjaan')?></div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
				<div class="wizButtons"> 
                    <div class="status" id="status2"></div>
					<span class="wNavButtons">
					 <input class="basic" id="back2" value="Back" type="reset" />
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