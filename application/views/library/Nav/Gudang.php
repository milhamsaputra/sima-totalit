<script src="http://localhost/SIMA/js/metro-calendar.js"></script>
<script src="http://localhost/SIMA/js/metro-datepicker.js"></script>
       <nav class="sidebar light">
        <ul>
            <li class="title bg-cyan fg-white">
                Gudang 
            </li>
            <li>
                <a href="#" class="dropdown-toggle bg-hover-lightgreen fg-hover-white"><i class="icon-clipboard-2 fg-green"></i>Manajemen Stok Barang</a>
                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url()."Gudang/Barang"?>">Data Produk Barang</a></li>
                    <li><a href="<?php echo base_url()."Gudang/Barang/Tambah"?>">Tambah Barang Baru</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle bg-hover-lightgreen fg-hover-white"><i class="icon-bus fg-green"></i>Manajemen Supplier</a>
                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url()."Gudang/Supplier"?>">Kelola Data Supplier</a></li>
                    <li><a href="<?php echo base_url()."Gudang/Supplier/Tambah"?>">Tambah Supplier</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle bg-hover-lightgreen fg-hover-white"><i class="icon-loop fg-green"></i>Transaksi</a>
                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url()."Gudang/Barang/PilihBarang"?>">Penukaran Barang</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle bg-hover-lightgreen fg-hover-white"><i class="icon-pie fg-green"></i>Laporan</a>
                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url()."Gudang/Laporan/LaporanTukarBarang"?>">Riwayat Penukaran Stok</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle bg-hover-lightgreen fg-hover-white"><i class="icon-broadcast fg-green"></i>Pemberitahuan</a>
                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url()."Gudang/Pesan" ?>">Pesan</a></li>
                    <li><a href="<?php echo base_url()."Gudang/Notice" ?>">Stok Persediaan</a></li>
                    <li><a href="<?php echo base_url()."Gudang/Logs" ?>">Logs</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <?php 
        if($_SESSION['akses']=="Gudang"){
    
        }else{
            $this->mymodel->switch_user($_SESSION['akses']);
        }
    ?>