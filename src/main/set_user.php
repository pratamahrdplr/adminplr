<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Pilih Marketing</div>
                      						
		  			</div>

                    
		  		</div>
                
		  	</div>


<div class="content-box-large">
<form class="" method="post">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>Nama Marketing</th>
<th>Kontak dari Admin</th>
<th>Kontak Mandiri</th>
<th>Total</th>
<th>Belum dihubungi</th>
<th>Telah dihubungi</th>
<th>Tidak Terhubung</th>
<th>Telepon Ulang</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
<?php
// iki tambahan'e bro!
    $id_admin = $_SESSION['admin'];
    switch ($id_admin) {
        case '2':
            $queryu = "SELECT * FROM tb_user WHERE kota = 'surabaya' AND level_user IN ('marketing', 'broker')";
            break;
        case '3':
            $queryu = "SELECT * FROM tb_user WHERE kota = 'probolinggo' AND level_user IN ('marketing', 'broker')";
            break;
        case '4':
            $queryu = "SELECT * FROM tb_user WHERE kota = 'semarang' AND level_user IN ('marketing', 'broker')";
            break;
        case '5':
            $queryu = "SELECT * FROM tb_user WHERE kota = 'juwana' AND level_user IN ('marketing', 'broker')";
            break;
        case '6':
            $queryu = "SELECT * FROM tb_user WHERE kota = 'cirebon' AND level_user IN ('marketing', 'broker')";
            break;
        default:
            $queryu = "select * from tb_user";
            break;
    }
    // iki akhire
	
$user_query = mysql_query($queryu)or die(mysql_error());
while($row_user = mysql_fetch_array($user_query)){

$pelanggan_query = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' ")or die(mysql_error());
$count_pel = mysql_num_rows($pelanggan_query);

$kontak_query = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]'  and pembuat = 'admin'  ")or die(mysql_error());
$row = mysql_fetch_array($kontak_query);
$count_kon = mysql_num_rows($kontak_query);

$kontak_query_m = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and pembuat <> 'admin' ")or die(mysql_error());
$count_kon_m = mysql_num_rows($kontak_query_m);

$kontak_query_b = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='belum dihubungi' ")or die(mysql_error());
$count_kon_b = mysql_num_rows($kontak_query_b);

$kontak_query_th = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='telah dihubungi' ")or die(mysql_error());
$count_kon_th = mysql_num_rows($kontak_query_th);

$kontak_query_tl = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='telepon ulang'  ")or die(mysql_error());
$count_kon_tl = mysql_num_rows($kontak_query_tl);


$kontak_query_td = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='tidak terhubung'  ")or die(mysql_error());
$count_kon_td = mysql_num_rows($kontak_query_td);
?>
<tr>
<td><?php echo $row_user['nama_user']; ?></td>
<td><?php echo $count_kon ; ?></td>
<td><?php echo $count_kon_m ; ?></td>
<td><?php echo $count_pel ; ?></td>
<td><?php echo $count_kon_b ; ?></td>
<td><?php echo $count_kon_th ; ?></td>
<td><?php echo $count_kon_td ; ?></td>
<td><?php echo $count_kon_tl ; ?></td>

<td>
            <a href="?page=set_kontak&id_user=<?php echo $row_user['id_user']; ?>" class="btn btn-default" >Set Kontak</a>

</td>		
</tr>

<?php 

}?>  
</tbody>
</table>
</form>

</div>
