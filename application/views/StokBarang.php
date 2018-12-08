<?php
if(isset($_POST['cari'])){
    $nama = $_POST['carinama'];
    echo "<script>document.location.href='Barang?nama=".$nama."'</script>";
}
if(empty($_GET['nama'])){
    $data = $this->mymodel->tampil('qw_barang');   
    $text = "";
}else{
    $data = $this->mymodel->tampil("qw_barang WHERE nama_barang like '%".$_GET['nama']."%'"); 
    $text = $_GET['nama'];
}
?>
    <form method="POST" action="">
     <div id="boxkonten">
       <br>
        <font class="judul2">Daftar Stok Barang</font><hr>  
        <div id="konten2">
                 <h2>Cari Stok</h2>
                 <br>
                  <input type="hidden" name="menu" value="StokBarang" >
                 <fieldset>
                 <label>Nama Barang :</label> 
                 <div class="input-control text">
                    <input type="text" name="carinama" value="<?php echo $text ?>">
                    <button class="btn-search" name="cari"></button>
                 </div>
                 </fieldset>
                 
            </div>  
                        <div id="konten1">
                         <h2>Stok Barang yang Tersedia</h2>
                         <br>
                        <?php
                            foreach($data as $att)
                            {   
                        ?>
                           <div class="kontenstok polaroid bd-white shadow span3">
                            <img src="<?php echo base_url()."/img/photo/".$att['photo_url'] ?>" class="Produk-Photo" >
                            <div class="margin10">
                                <font class="fg-green"><?php echo $att['nama_barang'] ?></font><br>
                                <small>
                                	Kategori : <?php echo $att['nama_kategori'] ?><br>
                                    Harga : Rp. <?php echo number_format($att['harga'], 0, ",",".") ?><br>
                                    Stok Terkini : <?php echo $att['jumlah_stok'] ?><br>
                                    <!--Indikasi : <?php echo substr($att['indikasi'], 0,25)." ... "." " ?><a href="<?php echo base_url()."Barang/Details/".$att['kode_barang'] ?>">Detail</a><br>-->
                                </small>
                            </div>
                            </div>
                        <?php
                            }
                        ?>
                </div>
     </div>
    </form>