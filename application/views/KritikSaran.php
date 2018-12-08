    <form method="POST" action="<?php echo base_url()."Pesan/kirim_pesan" ?>">
     <div id="boxkonten">
       <br>
        <font class="judul2">Kritik dan Saran</font><hr>
      <br>
   <div class="<?php echo $this->session->flashdata('Color')." ".$this->session->flashdata('Pad') ?> fg-white alert-flashdata text-center"><?php echo $this->session->flashdata('Pesan') ?></div><br>
          <div id="konten4">
    
    <div class="accordion">
          <div class="accordion-frame">
             <span class="heading bg-cyan fg-white" href="#">Kontak</span>
          </div>
    </div>
    <br>
    
    
    <div id="maps-here" style="width:340px;height:200px;"><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d1550.49103071714!2d106.79918527214691!3d-6.262903499869297!2m2!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x1256430cc1d07319!2sTotal+Solusi+Teknologi%2C+PT!5e1!3m2!1sid!2s!4v1442456520513" width="460" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
	<br>
    <br>
  	<br>
    <br>
    <br>
	<p style="line-height:+2;">
    Alamat : Perkantoran Dutamas Fatmawati Blok D2/05, Jl. Fatmawati Raya 12150 <br>
    Telp/Fax : 62 21 7230812 / 62 21 7230824 <br>    
    Facebook : Facebook.com
    </p>    
    </div>

          <div id="konten3">
          
          <div class="accordion">
          <div class="accordion-frame">
             <span class="heading bg-cyan fg-white" href="#">Pesan</span>
          </div>
          </div>

          <fieldset>
          <div id="konten4">
                                        <label>Nama depan*</label>
                                        <div class="input-control text" data-role="input-control">
                                            <input type="text" placeholder="Nama depan" name="depan">
                                            <button class="btn-clear"></button>
                                        </div>
                                        <label>Nama belakang</label>
                                        <div class="input-control text" data-role="input-control" >
                                            <input type="text" placeholder="Nama belakang" name="belakang">
                                            <button class="btn-clear"></button>
                                        </div>
                                        <label>E-mail*</label>
                                        <div class="input-control text" data-role="input-control">
                                            <input type="text" placeholder="E-mail" name="email">
                                            <button class="btn-clear"></button>
                                        </div>    
       <!-- </div>
          <div id="konten3">-->
          <label>Pesan*</label>
    <div class="input-control textarea">
        <textarea cols="80" rows="6" name="pesan"></textarea>
    </div>

    <button class="bg-hover-orange success padding10" style="width:100%;">Kirim Pesan</button>
        </div>
        </div>
        </fieldset>
  
    </div>
    </form>
   <!-- <script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		function initialize() {
		  var mapProp = {
    		center:new google.maps.LatLng(-6.2628863,106.762322), zoom:5, mapTypeId:google.maps.MapTypeId.ROADMAP
  		};
		  var map=new google.maps.Map(document.getElementById("maps-here"),mapProp);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>	-->
 