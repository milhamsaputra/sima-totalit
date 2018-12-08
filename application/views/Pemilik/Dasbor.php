<!--<?php
  $no=1;
  $kd1=" ";
  $kd2=" ";
  $kd3=0;
  foreach ($data as $value) {
  if($value['sisa_kadaluarsa']<=0){
    if($no<=3){
      $kd1.= $value['nama_barang']." ,";
      $kd2="";
      $no++;
    }else if($no==4){
      $i=1;
      $kd2="<br>dan ".$i." barang lainnya";
      $i++;
      $no++;
    }else{
      $kd2="<br>dan ".$i." barang lainnya";
      $i++;
      $no++;
    }
    $kd3++;
  }
  }
    $kd1=rtrim($kd1,",");
    $kadaluarsa=$kd1.$kd2." telah kadaluarsa";
    $kadaluarsa2=$kd3." Barang";
?>-->
<?php
  $no2=1;
  $hb1=" ";
  $hb2=" ";
  $hb3=0;
  foreach ($data as $value2) {
  if($value2['jumlah_stok']<=0){
    if($no2<=3){
      $hb1.= $value2['nama_barang']." ,";
      $hb2="";
      $no2++;
    }else if($no2==4){
      $i=1;
      $hb2="<br>dan ".$i." barang lainnya";
      $i++;
      $no2++;
    }else{
      $hb2="<br>dan ".$i." barang lainnya";
      $i++;
      $no2++;
      }
  $hb3++;
    }
  }
    $hb1=rtrim($hb1,",");
    $habis="Persediaan ".$hb1.$hb2." Sudah habis";
    $habis2=$hb3." Barang";
?>
<?php
  $no3=1;
  $sd1=" ";
  $sd2=" ";
  $sd3=0;
  foreach ($data as $value3) {
   if(($value3['jumlah_stok']<=10)&&($value3['jumlah_stok']>=1)){
    if($no3<=3){
      $sd1.= $value3['nama_barang']." ,";
      $sd2="";
      $no3++;
    }else if($no3==4){
      $i=1;
      $sd2="<br>dan ".$i." barang lainnya";
      $i++;
      $no3++;
    }else{
      $sd2="<br>dan ".$i." barang lainnya";
      $i++;
      $no3++;
    }
    $sd3++;
  }
  }
    $sd1=rtrim($sd1,",");
    $minim="Stok ".$sd1.$sd2." berjumlah sedikit";
    $minim2=$sd3."Barang";
?>

	<style type="text/css">
#container, #sliders {
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
#container {
	height: 400px; 
}
		</style>
		<script type="text/javascript">
$(function () {
    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Data Barang 2015',
			x: -20
        },
        subtitle: {
            text: 'Data Barang Tiap Bulan',
			x: -20
        },
		xAxis: {
  			categories: [<?php
							foreach ($data_highchart as $row){
								echo "'". $row->nama_barang . "',";	
							}
						?>
						]
 		},
  		yAxis: {
   			title: {
    		text: 'Jumlah (Satuan)'
   			}
  		},
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
			
            data: [<?php
						foreach ($data_highchart as $row){
							echo  $row->jumlah_stok . ",";	
						}
					?>
					]
        }]
    });

    function showValues() {
        $('#R0-value').html(chart.options.chart.options3d.alpha);
        $('#R1-value').html(chart.options.chart.options3d.beta);
    }

    // Activate the sliders
    $('#R0').on('change', function () {
        chart.options.chart.options3d.alpha = this.value;
        showValues();
        chart.redraw(false);
    });
    $('#R1').on('change', function () {
        chart.options.chart.options3d.beta = this.value;
        showValues();
        chart.redraw(false);
    });

    showValues();
});
		</script>
<script src="<?php echo base_url() ?>js/highcharts.js"></script>
<script src="<?php echo base_url() ?>js/highcharts-3d.js"></script>
<script src="<?php echo base_url() ?>js/modules/exporting.js"></script>

    
   <div id="admin-kotak-utama">
    <div id="admin-konten">

    <h1>Dashboard</h1>
    <hr>
      
      <h2>Selamat Datang , <font class="fg-blue"><?php echo $_SESSION['nama_user'] ?></font></h2>
      <div class="grid">
      <div class="row">
      <h2>Menu</h2><br>
    <a href="<?php echo base_url()."Pemilik/User" ?>">
    <div class="tile bg-lightBlue">
    <div class="tile-content icon">
    <i class="icon-user"></i>
    </div>
    <div class="tile-status">
    <span class="name">User</span>
    </div>
    </div>
    </a>

    <a href="<?php echo base_url()."Pemilik/Laporan/LaporanTukarBarang" ?>">
    <div class="tile bg-Green">
    <div class="tile-content icon">
    <i class="icon-loop"></i>
    </div>
    <div class="tile-status">
    <span class="name">Riwayat penukaran stok</span>
    </div>
    </div>
    </a>

    <a href="<?php echo base_url()."Pemilik/Laporan/PenjualanHariIni" ?>">
    <div class="tile bg-Orange">
    <div class="tile-content icon">
    <i class="icon-cart-2"></i>
    </div>
    <div class="tile-status">
    <span class="name">Penjualan hari ini</span>
    </div>
    </div>
    </a>

    <a href="<?php echo base_url()."Pemilik/Pesan" ?>">
    <div class="tile bg-darkBlue">
    <div class="tile-content icon">
    <i class="icon-mail"></i>
    </div>
    <div class="tile-status">
    <span class="name">Pesan Chat</span>
    </div>
    </div>
    </a>

    </div>
    <div class="row">
      <br>
      <h2>Pemberitahuan Persediaan Stok Minim</h2><br>
      <table class="table">
        <tr class="fg-green"> 
          <!--<td>Stok Kadaluarsa</td>-->
          <td>Stok Habis</td>
          <td>Stok Sedikit</td>
        </tr>
        <tr class="fg-orange">
      <?php
      //echo "<td>$kadaluarsa2</td>";
      echo "<td>$habis2</td>";
      echo "<td>$minim2</td>";
      ?>
      </tr>
      </table>
      <a href="<?php echo base_url()."Pemilik/Notice" ?>" style="text-align:right;">Lihat Selengkapnya . . .</a>
    </div>
    </div>


    </div>
  </div>
  
  <br><br><br>
    <div id="container"></div>
<div id="sliders">
	<table>
		<tr><td>Alpha Angle</td><td><input id="R0" type="range" min="0" max="45" value="15"/> <span id="R0-value" class="value"></span></td></tr>
	    <tr><td>Beta Angle</td><td><input id="R1" type="range" min="0" max="45" value="15"/> <span id="R1-value" class="value"></span></td></tr>
	</table>
</div>

<script type="text/javascript">
$(function(){
      /* setTimeout(function(){
          $.Notify({style: {background: 'red', color: 'white'}, caption: 'Stok Kadaluarsa', content: "<?php echo $kadaluarsa ?>!"});
      }, 1000); */
      setTimeout(function(){
          $.Notify({style: {background: 'orange', color: 'white'}, caption: 'Stok Habis', content: "<?php echo $habis ?>!"});
      }, 2000);
      setTimeout(function(){
          $.Notify({style: {background: '#1ba1e2', color: 'white'}, caption: 'Stok Minim', content: "<?php echo $minim ?>!"});
      }, 3000);
      //setTimeout(function(){
      //    $.Notify({content: "Default style for notify"});
      //}, 4000);
  });
 </script>