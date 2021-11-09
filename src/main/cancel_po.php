<?php
 include('dbcon.php');
dbcon(); 


$query=mysql_query("update tb_po set status_po = 'cancel' where id_po = '$_GET[id_po]'") or die (mysql_error());

if($query) {

	echo"<meta http-equiv='refresh' content='0;url=./?page=data_pemesanan_setuju'>";

}

?>