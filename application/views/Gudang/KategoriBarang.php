
   <div id="admin-kotak-utama">
    <div id="admin-konten">

    <h1>Manajemen Kategori Barang</h1>
    <hr><br>
    <table width="100%" cellpadding="10px" class="table hovered" style="text-align:left;">
        <thead class="striped">
           <tr>
                <th width="7%">&nbsp;  </th>
                <th> Nama Pengguna </th>
                <th> Opsi </th>
            </tr>
        </thead>
        <tbody class="striped">
        <?php 
        foreach($data as $d){
        ?>
        <tr>    
            <td>&nbsp;  </td>
            <td> <?php echo $d['nama_kategori']?> </td>
            <td> <a href="<?php echo base_url()."Gudang/Kategori/remove_kategori/".$d['id_kategori'] ?>"><i class="icon-remove"  style="background: #09f;
color: white;
padding: 5px;
border-radius: 50%" title="Hapus User!"></i></a> </td>
        </tr>
        <?php
        }    
        ?>
        </tbody>
    </table>

<br>

                            <div class="accordion" data-role="accordion">
                                    <div class="accordion-frame">
                                        <a class="heading bg-cyan fg-white" href="#"><i class="icon-rocket"></i> Tambah Kategori Baru</a>
                                        <div class="content">
                                            <form method="POST" action="<?php echo base_url()."Gudang/kategori/add_kategori"?>">
                                         <table width="50%">
        <tr>
            <td>Nama Kategori</td>
            <td>
                <div class="input-control text">
                    <input type="text" name="kategori" placeholder="Nama Kategori" maxlength="25">
                    <button class="btn-clear"></button>
                </div>
            </td>
        </tr>   
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="tambahkategori" value="Tambah Kategori" class="primary">
            </td>   
        </tr>
    </table>
                                        </form>
    <br>
                                        </div>
                                    </div>
                                </div>

    </div>
</div>
