   <div id="admin-kotak-utama">
    <div id="admin-konten">
       <?php
    foreach ($data as $row) {
        $id_user=$row['id_user'];
        $username=$row['username'];
        $akses=$row['akses'];
        $nama=$row['nama'];
        $statt=$row['status'];
    }
   ?>
<form method="POST" action="<?php echo base_url()."Pemilik/User/Set_Update/".$id_user?>">
    <h1>Edit User</h1>
    <hr>
    <div class="grid">
      <div class='row'>
        <div class="span2">
            Username
        </div>
        <div class="input-control text size4">
                    <input type="text" value="<?php echo $username ?>" name="User" placeholder="Username">       
                    <button class="btn-clear"></button>
        </div>
      </div>

      <div class='row'>
        <div class="span2">
            Hak Akses
        </div>
        <div class="input-control select size4">
                   <select name="Akses">
                       <option value="<?php echo $akses ?>"><?php echo $akses ?></option>
                       <option>Admin</option>
                       <option>Kasir</option>
                       <option>Gudang</option>
                       <option>Pemilik</option>
                   </select>
        </div>
      </div>


      <div class='row'>
        <div class="span2">
            Nama 
        </div>
        <div class="input-control text size4">
                    <input type="text" value="<?php echo $nama ?>" name="Nama" placeholder="Nama Pegawai">       
                    <button class="btn-clear"></button>
        </div>
      </div>

      <div class='row'>
        <div class="span2">
            Status 
        </div>
        <div class="input-control text Select size4">
          <select name="Stat">
            <option id="<?php echo $statt ?>"><?php echo $statt ?></option>
            <?php
              if($statt=="Nonaktif"){
                ?>
              <option id="Aktif">Aktif</option>
                <?php
              }elseif($statt=="Aktif"){
                ?>
              <option id="Nonaktif">Nonaktif</option>
                <?php
              }
            ?>
          </select>
        </div>
      </div>

    </div>
               <Button name="tambah" class="Success large place-left"><i class="icon-checkmark on-left"></i>Update</button>
    </form>
               <a href="<?php echo base_url()."Pemilik/User/index" ?>"><Button name="batal" class="warning large"><i class="icon-cancel on-left"></i>Kembali</button></a>
    </div>
</div>
