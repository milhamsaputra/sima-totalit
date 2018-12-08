<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=db_sima', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM tb_barang WHERE nama_barang LIKE (:keyword) and jumlah_stok not in ('0') ORDER BY kode_barang ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$country_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['nama_barang']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['nama_barang']).'\');$(\'#attjumlah_a\').val(\''.str_replace("'", "\'", $rs['jumlah_stok']).'\')">'.$country_name.'</li>';
}
?>