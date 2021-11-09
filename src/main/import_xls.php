<?php
include('dbcon.php');
include('lib/excel_reader2.php');
dbcon(); 

$data = new Spreadsheet_Excel_Reader($_FILES['xls']['tmp_name']);
$baris =$data->rowcount($sheet_index=0);

$ok=0;
$no=0;
for($i=2; $i<=$baris; $i++){

/*
//import user
$kode_user=$data->val($i,1);
$username_user=$data->val($i,2);
$password_user=$data->val($i,3);
$nama_user=$data->val($i,4);
$level_user=$data->val($i,5);
$hp_user=$data->val($i,6);
$kota=$data->val($i,7);
*/


//import kontak
$id_user=$data->val($i,1);
$kode_kontak=$data->val($i,2);
$nama_kontak=$data->val($i,3);
$alamat_kontak=$data->val($i,4);
$kota_kontak=$data->val($i,5);
$provinsi_kontak=$data->val($i,6);
$area=$data->val($i,7);
$cp_kontak=$data->val($i,8);
$telepon_kontak=$data->val($i,9);
$telepon_kontak2=$data->val($i,10);
$hp_kontak=$data->val($i,11);
$fax_kontak=$data->val($i,12);
$email_kontak=$data->val($i,13);
$npwp_kontak=$data->val($i,14);
$status_kontak=$data->val($i,15);
$report_kontak=$data->val($i,16);
$tanggal_kontak=$data->val($i,17);
$tanggal_bagi=$data->val($i,18);
$tanggal_telp=$data->val($i,19);
$tanggal_follow_up=$data->val($i,20);
$tanggal_tempo=$data->val($i,21);
$pembuat=$data->val($i,22);
$ket_kontak=$data->val($i,23);


/*
//import penawaran
$id_kontak=$data->val($i,1);
$id_user=$data->val($i,2);
$no_penawaran=$data->val($i,3);
$vol_penawaran=$data->val($i,4);
$harga_penawaran=$data->val($i,5);
$tanggal_penawaran=$data->val($i,6);
$ppn=$data->val($i,7);
$ppn_ppn=$data->val($i,8);
$pbbkb=$data->val($i,9);
$pph=$data->val($i,10);
$harga_dasar=$data->val($i,11);
$harga_dasar_ppn=$data->val($i,12);
$total_pajak=$data->val($i,13);
$pajak=$data->val($i,14);
$tempo_penawaran=$data->val($i,15);
$pembayaran=$data->val($i,16);
$status_penawaran=$data->val($i,17);
$ket_penawaran=$data->val($i,18);
$syarat_penawaran=$data->val($i,19);
*/

/*
//import po
$id_kontak=$data->val($i,1);
$id_user=$data->val($i,2);
$no_po=$data->val($i,3);
$no_invoice=$data->val($i,4);
$nama_kontak_po=$data->val($i,5);
$npwp=$data->val($i,6);
$penerima_barang=$data->val($i,7);
$no_telp_penerima=$data->val($i,8);
$penanggung_bayar=$data->val($i,9);
$no_penanggung_bayar=$data->val($i,10);
$harga_po=$data->val($i,11);
$vol_po=$data->val($i,12);
$fee_po=$data->val($i,13);
$id_oat=$data->val($i,14);
$tanggal_po=$data->val($i,15);
$tanggal_kirim=$data->val($i,16);
$pukul_kirim=$data->val($i,17);
$alamat_kirim=$data->val($i,18);
$pembayaran_po=$data->val($i,19);
$jatuh_tempo=$data->val($i,20);
$status_po=$data->val($i,21);
$status_kirim=$data->val($i,22);
$kelengkapan_po=$data->val($i,23);
$gt=$data->val($i,24);
$reg=$data->val($i,25);
$nahkoda=$data->val($i,26);
$ppn=$data->val($i,27);
$ppn_ppn=$data->val($i,28);
$pbbkb=$data->val($i,29);
$pph=$data->val($i,30);
$harga_dasar=$data->val($i,31);
$harga_dasar_ppn=$data->val($i,32);
$pajak=$data->val($i,33);
$keterangan=$data->val($i,34);
*/
	
//batas
	
/*
//insert user
$query=mysql_query("insert into tb_user (kode_user, username_user, password_user, nama_user, level_user, hp_user, kota) values ('$kode_user', '$username_user', '$password_user', '$nama_user', '$level_user', '$hp_user', '$kota')") or die (mysql_error());
*/


//insert kontak
$query=mysql_query("insert into tb_kontak_all (id_user, kode_kontak, nama_kontak, alamat_kontak, kota_kontak, provinsi_kontak, area, cp_kontak, telepon_kontak, telepon_kontak2, hp_kontak, fax_kontak, email_kontak, npwp_kontak, status_kontak, report_kontak, tanggal_kontak, tanggal_bagi, tanggal_telp, tanggal_follow_up, tanggal_tempo, pembuat, ket_kontak) values ('$id_user', '$kode_kontak', '$nama_kontak', '$alamat_kontak', '$kota_kontak', '$provinsi_kontak', '$area', '$cp_kontak', '$telepon_kontak', '$telepon_kontak2', '$hp_kontak', '$fax_kontak', '$email_kontak', '$npwp_kontak', '$status_kontak', '$report_kontak', '$tanggal_kontak', '$tanggal_bagi', '$tanggal_telp', '$tanggal_follow_up', '$tanggal_tempo', '$pembuat', '$ket_kontak')") or die (mysql_error());


/*
//insert penawaran
$query=mysql_query("insert into tb_penawaran (id_kontak, id_user, no_penawaran, vol_penawaran, harga_penawaran, tanggal_penawaran, ppn, ppn_ppn, pbbkb, pph, harga_dasar, harga_dasar_ppn, total_pajak, pajak, tempo_penawaran, pembayaran, status_penawaran, ket_penawaran, syarat_penawaran) values ('$id_kontak', '$id_user', '$no_penawaran', '$vol_penawaran', '$harga_penawaran', '$tanggal_penawaran', '$ppn', '$ppn_ppn', '$pbbkb', '$pph', '$harga_dasar', '$harga_dasar_ppn', '$total_pajak', '$pajak', '$tempo_penawaran', '$pembayaran', '$status_penawaran', '$ket_penawaran', '$syarat_penawaran')") or die (mysql_error());
*/

/*
//insert po
$query=mysql_query("insert into tb_po (id_kontak, id_user, no_po, no_invoice, nama_kontak_po, npwp, penerima_barang, no_telp_penerima, penanggung_bayar, no_penanggung_bayar, harga_po, vol_po, fee_po, id_oat, tanggal_po, tanggal_kirim, pukul_kirim, alamat_kirim, pembayaran_po, jatuh_tempo, status_po ,status_kirim, kelengkapan_po, gt, reg, nahkoda, ppn, ppn_ppn, pbbkb, pph, harga_dasar, harga_dasar_ppn, pajak, keterangan) values ('$id_kontak', '$id_user', '$no_po', '$no_invoice', '$nama_kontak_po', '$npwp', '$penerima_barang', '$no_telp_penerima', '$penanggung_bayar', '$no_penanggung_bayar', '$harga_po', '$vol_po', '$fee_po', '$id_oat', '$tanggal_po', '$tanggal_kirim', '$pukul_kirim', '$alamat_kirim', '$pembayaran_po', '$jatuh_tempo', '$status_po' ,'$status_kirim', '$kelengkapan_po', '$gt', '$reg', '$nahkoda', '$ppn', '$ppn_ppn', '$pbbkb', '$pph', '$harga_dasar', '$harga_dasar_ppn', '$pajak', '$keterangan')") or die (mysql_error());
*/

}

if($query)
{
	header("location:index.php?page=data_user");
}
else
{
	header("location:index.php?page=data_penawaran_pending");
}
?>