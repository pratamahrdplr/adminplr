<?php
 include('dbcon.php');
dbcon(); 

	

$queryp = mysql_query("SELECT * FROM provinsi WHERE id_provinsi = '$_POST[provinsi]'");
$rowp = mysql_fetch_array($queryp);
$provinsi = $rowp['nama_provinsi'];

$queryk = mysql_query("SELECT * FROM kota WHERE id_kota = '$_POST[kota]'");
$rowk = mysql_fetch_array($queryk);
$kota = $rowk['nama_kota'];
	

$query=mysql_query("insert into tb_kontak_all (kode_kontak, nama_kontak, alamat_kontak, kota_kontak, provinsi_kontak, area, cp_kontak, telepon_kontak,  fax_kontak, email_kontak, status_kontak, tanggal_kontak, pembuat) values ('$_POST[kode_pel]', '$_POST[nama_pel]','$_POST[alamat_pel]','$kota','$provinsi','$_POST[area_pel]','$_POST[purchasing_pel]','$_POST[telp_pel]', '$_POST[fax_pel]','$_POST[email_pel]', 'belum dihubungi',NOW(), 'admin')") or die (mysql_error());

if($query){
header("location:index.php?page=tambah_kontak");

}

?>