<?php
$koneksi =  mysqli_connect("localhost","root","","db_sima");
 
 $judul=$_POST["judul"]; 
 $sqy3=$_POST["sqy3"]; 
  
 $result=mysqli_query($koneksi,"SELECT * FROM tb_barang where nama_barang like '%$judul%' and kode_barang not in (".$sqy3.")");
 $found=mysqli_num_rows($result);
 
 if($found>0){
       echo "found";
 }else{
       echo "notfound";
 }
?>