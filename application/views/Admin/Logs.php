   <div id="admin-kotak-utama">
    <div id="admin-konten">
    <h1>Riwayat Aktifitas</h1>
    <hr>
    <table class="table bordered">
        <tr>
            <td>No</td>
            <td>Username</td>
            <td>Nama</td>
            <td>Aktifitas</td>
            <td>Tanggal</td>
            <td>Waktu</td>
        </tr>
        <?php
            $no=1;
            foreach ($data1 as $value) {
            ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $value['username'] ?></td>
            <td><?php echo $value['nama'] ?></td>
            <td><?php echo $value['aktifitas'] ?></td>
            <td><?php echo $value['tanggal'] ?></td>
            <td><?php echo $value['waktu'] ?></td>
        </tr>
            <?php
            $no++;
            }
        ?>
    </table>
    <!--<font class="subheader"> Total Pendapatan Hari Ini : <?php echo number_format($total_pendapatan, "0", ",",".") ?></font>-->
    </div>
</div>
