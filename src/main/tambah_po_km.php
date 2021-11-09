<?php
 include('dbcon.php');
dbcon(); 
$tgl = $_POST['tanggal_kirim'];

$harga = $_POST['harga'];
$ppn = 0.1;
$pbbkb = 0.008585;
$pph = 0.003;

$tpajak = ($ppn+$pbbkb+$pph)+1 ;
$hppn = $harga/$tpajak*$ppn;
$hpbbkb = $harga/$tpajak*$pbbkb;
$hpph = $harga/$tpajak*$pph;
$harga_dasar = $harga-$hppn-$hpph-$hpbbkb;
$harga_dasar_ppn = $harga/1.1;
$hppn_ppn = $harga_dasar_ppn*0.1;


$query0=mysql_query("insert into tb_pelanggan (id_kontak, id_user, nama_pelanggan, alamat_pelanggan, kota_pelanggan, cp_pelanggan, telepon_pelanggan,  fax_pelanggan, email_pelanggan, npwp_pelanggan , tanggal_po , po_terakhir) values ('$_POST[id_pel]', '$_POST[id_user]', '$_POST[nama]','$_POST[alamat]','$_POST[kota]','$_POST[cp]','$_POST[telp]', '$_POST[fax]', '$_POST[email]', '$_POST[npwp_po]', NOW() , NOW() ) ") or die (mysql_error());


$query1=mysql_query("update tb_kontak_all set kode_kontak = 'PO $_POST[sales]', nama_kontak = '$_POST[nama]' , alamat_kontak = '$_POST[alamat]' , kota_kontak = '$_POST[kota]', cp_kontak = '$_POST[cp]' , telepon_kontak = '$_POST[telp]' , email_kontak = '$_POST[email]' , npwp_kontak = '$_POST[npwp_po]', status_kontak = 'telah dihubungi' , report_kontak = 'PO', ket_kontak = 'PO $_POST[sales]' where id_kontak = '$_POST[id_pel]'") or die (mysql_error());


$query=mysql_query("insert into tb_po (id_kontak, id_user , no_po, nama_kontak_po, npwp, penerima_barang, no_telp_penerima, penanggung_bayar , no_penanggung_bayar, harga_po, vol_po, fee_po, id_oat, tanggal_po, tanggal_kirim, pukul_kirim, alamat_kirim, pembayaran_po, jatuh_tempo, status_po, kelengkapan_po, gt, reg, nahkoda, status_kirim, ppn, ppn_ppn, pbbkb, pph, harga_dasar, harga_dasar_ppn, pajak, keterangan) values ('$_POST[id_pel]', '$_POST[id_user]', '$_POST[no_po]', '$_POST[nama_kontak_po]', '$_POST[npwp_po]', '$_POST[penerima_barang]', '$_POST[no_telp_penerima]',  '$_POST[penanggung_bayar]', '$_POST[no_penanggung_bayar]', '$_POST[harga]','$_POST[vol]','$_POST[fee]', '$_POST[oat]', NOW(), '$tgl' , '$_POST[pukul_kirim]', '$_POST[alamat_kirim]', '$_POST[pembayaran]', '$_POST[jatuh_tempo]', '$_POST[status]', '$_POST[kelengkapan]', '$_POST[gt]', '$_POST[reg]', '$_POST[nahkoda]', 'belum kirim', $hppn, $hppn_ppn, $hpbbkb, $hpph, $harga_dasar, $harga_dasar_ppn, '$_POST[pajak]', '$_POST[kelengkapan]')") or die (mysql_error());


if($query) {
echo"<script>alert('Order Masuk  ')</script>";
	echo"<meta http-equiv='refresh' content='0;url=./?page=data_pemesanan_pending'>";

}else {
echo"<script>alert('Gagal Order')</script>";
	echo"<meta http-equiv='refresh' content='0;url=./?page=data_pemesanan_pending'>";
}

?>