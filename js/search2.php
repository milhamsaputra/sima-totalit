<?php
$koneksi =  mysqli_connect("localhost","root","","db_sima");
 
 $judul=$_POST["judul"]; 
 $vsqy3=$_POST['vsqy3'];
  
 $result=mysqli_query($koneksi,"SELECT * FROM tb_barang where nama_barang like '%$judul%' and kode_barang not in ($vsqy3)");
 $row=mysqli_fetch_array($result);
 $found=mysqli_num_rows($result);
 
 if($found>0){
       echo $row['kode_barang'];
 }else{
       echo "notfound";
 }
 //and Not in (".$sqy3.")
?>