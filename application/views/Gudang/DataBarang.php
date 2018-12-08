
   <div id="admin-kotak-utama">
    <div id="admin-konten">
    	<h1>Data Persediaan Barang
    	<hr>
   <div class="<?php echo $this->session->flashdata('Color')." ".$this->session->flashdata('Pad') ?> fg-white alert-flashdata text-center"><?php echo $this->session->flashdata('Pesan') ?></div><br>
       <table width="100%" cellpadding="10px" style="text-align:left;" class="table hovered bordered">
    		<thead>
    			<th>No</th>
                <th>Foto</th>                
    			<th>Nama Barang</th>
                <th>Jumlah Stok</th>
    			<th>Harga</th>
                <!--<th>Kadaluarsa</th>-->
    			<th>Opsi</th>
    		</thead>
    		<tbody>
    			<?php
    				$no=$nomor;
    				foreach($data_get as $row) {
                    $no++;
    				?>
    				<tr>
    					<td><?php echo $no; ?></td>
                        <td>
                            <div class="image-container shadow span1">
                                <img src="<?php echo base_url()."/img/photo/thumbs/".$row->photo_url ?>">
                                <div class="overlay-fluid">
                                    <a href="<?php echo base_url()."Gudang/Barang/GantiFoto/".$row->kode_barang ?>"><button class="button primary"><i class="icon-pictures on-left"></i>Ganti Gambar</button></a>
                                </div>
                            </div>
                        </td>
    					<td><?php echo $row->nama_barang ?></td>
    					<td><?php echo $row->jumlah_stok ?></td>
                        <td><?php echo "Rp. ".number_format($row->harga, '0', ',' ,'.') ?></td>
                       <!-- <td><?php echo $row->kadaluarsa ?></td>-->
    					<td>
                            <a href="<?php echo base_url()."Gudang/Barang/Details/".$row->kode_barang ?>" title="Detail">
                                <i class="icon-clipboard-2 bg-Green bg-hover-darkGreen" style="color: white;padding: 10px;border-radius: 50%"></i>
                            </a> 
    						<a href="<?php echo base_url()."Gudang/Barang/Edit/".$row->kode_barang ?>" title="Edit">
                                <i class="icon-Pencil bg-Blue bg-hover-darkBlue" style="color: white;padding: 10px;border-radius: 50%" ></i>
                            </a> 
    						<a href="<?php echo base_url()."Gudang/Barang/delete/".$row->kode_barang ?>" title="Hapus">
                                 <i class="icon-cancel-2 bg-red bg-hover-darkred" style="color: white;padding: 10px;border-radius: 50%"></i>
                            </a>
    						</td>
    				</tr>
    				<?php
    				}
    			?>
    		</tbody>	
    	</table>	
        <table style="margin-left:auto;margin-right:10%;">
            <tr><td>
                <div class="pagination">
                    <ul>
                        <?php echo $pagt; ?><br>
                    </ul>
                </div>
            </td></tr>
        </table>
        <br><br>
        <a href="<?php echo base_url()."Gudang/Laporan/PrintPersediaanBarang" ?>"><button class="command-button primary" ><i class="icon-printer on-left"></i> Cetak Laporan <small> Persediaan Stok Barang</small></button></a> 
    </div>
</div>
