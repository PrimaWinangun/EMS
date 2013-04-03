<div class="widget">  
		  <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Data Pegawai</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
                        <td width="1%">No</td>
                        <td width="1%">No Unit</td>
                        <td>Nama Pegawai</td>
                        <td width="4%">NIPP</td>
                        <td width="1%">Grade</td>
                        <td width="1%">M.K.A</td>
                        <td>T.M.T GA / GS</td>
                        <td width="1%">Jenis Kelamin</td>
                        <td>Tgl Lagir</td>
                        <td>Umur</td>
                        <td>T.M.T Mutasi</td>
                        <td>Jabatan</td>
                        <td>Keterangan</td>
                    </tr>
                </thead>
				<tfoot>
					<tr><td colspan=13><center><div class="pagination"><?php echo $this->pagination->create_links();?></div></center></td></td></tr>
				</tfoot>
				<tbody>
				<?php 
				if ($this->uri->segment(3)== NULL)
				{
					$number = 1;
				} else {
					$number = $this->uri->segment(3)+1;
				}
				foreach ($supervisor as $row_supervisor) :
				{ 
					$datestring = "%d-%m-%Y" ;
					$tgl_lahir = mdate($datestring,strtotime($row_supervisor['peg_tgl_lahir']));
					
					if ($row_supervisor['p_grd_grade'] == NULL)
					{
						$grade = '-';
					}
					else
					{
						$grade = $row_supervisor['p_grd_grade'];
					}
					if (($row_supervisor['p_tmt_tmt'] == NULL) OR ($row_supervisor['p_tmt_tmt'] == '0000-00-00'))
					{
						$tmt = '-';
					}
					else
					{
						$tmt = mdate($datestring,strtotime($row_supervisor['p_tmt_tmt']));
					}
					  ?>
					<tr>
                        <td><center><?php echo $number; ?></center></td>
						<td><center><?php echo ''; ?></center></td>
						<td><?php echo strtoupper($row_supervisor['peg_nama']); ?></td>
						<td><?php echo $row_supervisor['peg_nipp']; ?></td>
						<td><center><?php echo $grade; ?></center></td>
						<td><?php echo 'MKA'; ?></td>
						<td><?php echo $tmt; ?></td>
						<td><center><?php echo $row_supervisor['peg_jns_kelamin']; ?></center></td>
						<td><?php echo $tgl_lahir; ?></center></td>
						<td><center><?php echo '20'; ?></center></td>
						<td><center><?php echo '12-12-2012'; ?></center></td>
						<td><?php echo strtoupper($row_supervisor['p_jbt_jabatan']); ?></td>
						<td><?php echo ' '; ?></td>
                    </tr> <?php
					$number++;
				}endforeach; 
				?>
                </tbody>
            </table>
			
        </div>