<?php
$koneksi =  mysqli_connect("localhost","root","","db_sima");
 
 $judul=$_POST["judul"];
 
  
 $result=mysqli_query($koneksi,"SELECT * FROM tb_barang where nama_barang like '%$judul%'");
 $found=mysqli_num_rows($result);
 
 if($found>0){
    while($row=mysqli_fetch_array($result)){
    echo "$row[harga]";
    }   
 }else{
    echo "<li>Maaf, Obat yang anda cari tidak ditemukan!<li>";
 }
?>