<?php
include('dbcon.php');
dbcon(); 
$jum = count($_POST["id_kon"]);
for ($x=0;$x<$jum;$x++){
$pel = $_POST["id_kon"][$x];

$query=mysql_query("update tb_kontak_all set id_user  = NULL , status_kontak = 'belum dihubungi', tanggal_bagi = NULL, tanggal_telp = NULL, tanggal_tempo = NULL, report_kontak = NULL where id_kontak = '$pel' ") or die (mysql_error());
}
if($query)
header("location:index.php?page=keluarkan_data");
?>