
<?php
 include('dbcon.php');
  include('lib/excel_reader2.php');
dbcon(); 

$data = new Spreadsheet_Excel_Reader($_FILES['xls']['tmp_name']);

$baris =$data->rowcount($sheet_index=0);

$ok=0;
$no=0;
for($i=2; $i<=$baris; $i++){

$kode_pel=$data->val($i,1);
$nama_pel=$data->val($i,2);
$alamat_pel=$data->val($i,3);
$kota_pel=$data->val($i,4);
$cp_pel=$data->val($i,5);
$telp_pel=$data->val($i,6);
$fax_pel=$data->val($i,7);
$email_pel=$data->val($i,8);
$status_kontak=$data->val($i,9);
$report_kontak=$data->val($i,10);
$id_user=$data->val($i,11);

/*		
$query=mysql_query("insert into tb_kontak_all (kode_kontak, nama_kontak, alamat_kontak, kota_kontak, cp_kontak, telepon_kontak,  fax_kontak, email_kontak, status_kontak, tanggal_kontak, pembuat) values ('$kode_pel', '$nama_pel','$alamat_pel','$kota_pel','$cp_pel','$telp_pel','$fax_pel','$email_pel', 'belum dihubungi', NOW() ,'admin')") or die (mysql_error());
	
*/	

$query=mysql_query("insert into tb_kontak_all (id_user, kode_kontak, nama_kontak, alamat_kontak, kota_kontak, cp_kontak, telepon_kontak,  fax_kontak, email_kontak, status_kontak, report_kontak, tanggal_kontak, tanggal_bagi, pembuat) values ('$id_user', '$kode_pel', '$nama_pel','$alamat_pel','$kota_pel','$cp_pel','$telp_pel','$fax_pel','$email_pel', '$status_kontak', '$report_kontak', NOW() , NOW() ,'admin')") or die (mysql_error());


}


if($query){
header("location:index.php?page=data_kontak");

}else{

header("location:index.php?page=data_kontak");
}
?>