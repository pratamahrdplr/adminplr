<?php
 include('dbcon.php');
 dbcon(); 

$query=mysql_query("update tb_kontak_all set nama_kontak = '$_POST[nama_pel]' , alamat_kontak = '$_POST[alamat_pel]' , kota_kontak = '$_POST[kota_pel]', provinsi_kontak = '$_POST[provinsi_pel]', cp_kontak = '$_POST[cp_pel]', telepon_kontak = '$_POST[telp_pel]', telepon_kontak2 = '$_POST[telp_pel2]', hp_kontak = '$_POST[hp_pel]', fax_kontak = '$_POST[fax_pel]', email_kontak = '$_POST[email_pel]', status_kontak = '$_POST[status_pel]' , report_kontak = '$_POST[report_pel]', ket_kontak = '$_POST[ket_pel]' where id_kontak = '$_POST[id_kon]'") or die (mysql_error());

if($query)
header("location:index.php?page=data_kontak");
?>
