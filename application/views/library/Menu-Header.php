<!DOCTYPE HTML>
<html lang="en">
<head>
<title>SIM Aset | <?php echo $_SESSION['akses'];?></title>
<script src="<?php echo base_url() ?>js/metro-dropdown.js"></script>
<link rel="icon" href="<?php echo base_url()."img/logo_inventory.png" ?>">
</head>
<body style="padding:0;margin:0;" class="metro">
	<div class="admin-kotak-menu fixed bg-lightgreen">
		<div class="padding10">
		<br>
		<br>
			<img src="<?php echo base_url()."img/logoTotalIT.png" ?>" style="width:80%;" class="padding5"><br>
		<font class="subheader-secondary fg-white">SIM Aset</font><br>
		<font class="item-title fg-white text-right" style="line-height:2em;">Total IT</font>
		<br>
		</div>
    <?php
    $include = "Nav/".$user.".php";
    include $include;
    ?>
    </div>
<br>    