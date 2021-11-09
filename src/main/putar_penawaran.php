 <meta http-equiv="refresh" content="90"; URL="<?php echo basename($PHP_SELF); ?>">

 <div class="row">
    <div class="col-md-12 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title ">Rotasi Penawaran</div>

        </div>
        <div class="content-box-large box-with-header">
            <a href="?page=data_penawaran_pending" class="btn btn-success">Pending</a>
            <a href="?page=data_penawaran_kirim" class="btn btn-success">Terkirim</a>
            <a href="?page=data_penawaran_gagal" class="btn btn-success">Gagal</a>
            <a href="?page=putar_penawaran" class="btn btn-warning">Putar Penawaran</a>
            <a href="?page=data_penawaran" class="btn btn-success">Semua</a>
        </div>
    </div>
</div>


<div class="content-box-large">

	<div class="row">
	 <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
				
						<?php
				$tanggal_input_awal = $_POST["tanggal_input_awal"];
				$tanggal_input_sampai = $_POST["tanggal_input_sampai"];
				?> 
				</div>
				<div class="clearfix"></div>
			</div>
				
			<div class="x_content">
				<form class="form" action="?page=putar_penawaran" enctype="multipart/form-data" method="post">
					Filter Tanggal:<input id="tanggal_input_awal" class="date-picker" required="required" type="text" name="tanggal_input_awal">
					Sampai:<input id="tanggal_input_sampai" class="date-picker" required="required" type="text" name="tanggal_input_sampai">
					<input name="input" type="submit" value="Filter Tanggal Tempo Penawaran"  class="btn btn-default"/>
				</form>
			</div>

		</div>
	</div>
	
	<form action= "putar.php" method="post">
	<div class="row">
		<div class= "col-md-12 col-sm-12 col-xs-12">
			<!-- <table id= "datatable-responsive" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%"> -->
				<table id= "example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
						<th class="headings"></th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Kota</th>
						<th>Tanggal Penawaran</th>
						 <th>Jatuh Tempo Penawaran</th>
						<th>Harga</th>
						<th>Sales</th>
						<th>Status</th>
                                                <th>Status PO</th>
						</tr>
					</thead>

					<tbody>
					<!-----------------------------------Content------------------------------------>
					<?php

						if ($admin_area == 'all') {
						    $q = mysql_query("select bc.id_kontak, bc.nama_kontak, bc.alamat_kontak, bc.kota_kontak, bc.status_kontak, a.harga_penawaran, a.tempo_penawaran, bc.nama_user, a.status_penawaran , a.tanggal_penawaran , a. ket_penawaran from tb_penawaran a LEFT JOIN (SELECT b.id_kontak, b.nama_kontak, b.alamat_kontak, b.kota_kontak, b.status_kontak, c.nama_user FROM tb_kontak_all b INNER JOIN tb_user c ON b.id_user = c.id_user) bc ON a.id_kontak = bc.id_kontak WHERE bc.status_kontak <> 'belum dihubungi' GROUP BY bc.id_kontak") or die(mysql_error());
						} else {
						    switch ($admin_area) {
						        case 'surabaya':
						            $area = " AND bc.kota_kontak IN ('surabaya', 'mojokerto', 'madiun', 'kediri', 'tulungagung', 'tuban', 'trenggalek', 'sumenep', 'sidoarjo', 'sampang', 'ponorogo', 'pamekasan', 'pacitan', 'ngawi', 'nganjuk', 'magetan', 'lamongan', 'jombang', 'gresik', 'bojonegoro', 'blitar', 'bangkalan', 'lumajang')";
						        break;
						        case 'probolinggo':
						            $area = " AND bc.kota_kontak IN ('probolinggo', 'pasuruan', 'batu', 'malang', 'lumajang', 'jember', 'bondowoso', 'situbondo', 'banyuwangi')";
						        break;
						        case 'semarang':
						            $area = " AND bc.kota_kontak IN ('tegal', 'surakarta', 'solo', 'semarang', 'salatiga', 'pekalongan', 'magelang', 'wonosobo', 'wonogiri', 'temanggung', 'slawi', 'sukoharjo', 'sragen', 'ungaran', 'purworejo', 'purbalingga', 'pemalang', 'klaten', 'kendal', 'kebumen', 'karanganyar', 'purwodadi', 'grobogan', 'demak', 'cilacap', 'brebes', 'boyolali', 'batang', 'banyumas', 'banjarnegara', 'sleman', 'yogyakarta', 'bantul', 'kulonprogo', 'purwokerto')";
						        break;
						        case 'juwana' or 'juwono':
						            $area = " AND bc.kota_kontak IN ('juwono','juwana' 'jepara', 'kudus', 'pati', 'rembang', 'blora')";
						        break;
						        case 'cirebon':
						            $area = " AND bc.kota_kontak IN ('slawi', 'tegal', 'tasikmalaya', 'sukabumi', 'depok', 'cimahi', 'cirebon', 'bogor', 'bekasi', 'banjar', 'bandung', 'sumedang', 'subang', 'purwakarta', 'majalengka', 'kuningan', 'karawang', 'indramayu', 'garut', 'cianjur', 'ciamis', 'bandung barat')";
						        break;
						        default:
						            $area = "";
						        break;
						    }
$q = mysql_query("select bc.id_kontak, bc.nama_kontak, bc.kode_kontak, bc.alamat_kontak, bc.kota_kontak, bc.status_kontak, a.harga_penawaran, a.tempo_penawaran, bc.nama_user, a.status_penawaran , a.tanggal_penawaran , a. ket_penawaran from tb_penawaran a LEFT JOIN (SELECT b.id_kontak, b.nama_kontak, b.kode_kontak, b.alamat_kontak, b.kota_kontak, b.status_kontak, c.nama_user FROM tb_kontak_all b INNER JOIN tb_user c ON b.id_user = c.id_user) bc ON a.id_kontak = bc.id_kontak " . $area . " GROUP BY bc.id_kontak") or die(mysql_error());
						}
						while ($row = mysql_fetch_array($q)) {
						?>
				
						 <tr>
									<td class="a-center">
										<input type="checkbox" class="flat" name="id_kon[]" value="<?php echo $row['id_kontak']; ?>">
									</td>
									<td><?php echo $row['nama_kontak']; ?></td>
									<td><?php echo $row['alamat_kontak']; ?></td>
									<td><?php echo $row['kota_kontak']; ?></td>
									 <td><?php
										    $dt = new DateTime($row['tanggal_penawaran'], new DateTimeZone('Asia/Jakarta'));
										    echo $dt->format('d M Y');
										?></td>
									 <td><?php
									    $date_now = new DateTime();
									    $date2 = new DateTime($row['tempo_penawaran'], new DateTimeZone('Asia/Jakarta'));
									    if ($date_now > $date2) echo "<span class='label label-danger'>" . $date2->format('d M Y') . "</span>";
									    else echo "<span class='label label-success'>" . $date2->format('d M Y') . "</span>";
									?></td>
									<td><?php echo $row['harga_penawaran']; ?></td>
									<td><?php echo $row['nama_user']; ?></td>
									<td><?php echo $row['status_penawaran']; ?></td>  
							                 <td><?php echo $row['ket_penawaran']; ?>, <?php echo $row['kode_kontak']; ?></td>
</tr>
						<?php
						}
						?>  
						</tbody>
				</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			Pilih Marketing
			<select name="id_user" class="form-control">   
				<?php
$admin_query = mysql_query("select * from tb_admin where id_admin = '$_SESSION[admin]'")or die(mysql_error());
$row_admin = mysql_fetch_array($admin_query);
$useru = $row_admin['area'];
if($useru == 'surabaya')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('surabaya','SURABAYA') and level_user = 'marketing' order by nama_user";
            
}
elseif($useru == 'SURABAYA')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('surabaya','SURABAYA') and level_user = 'marketing' order by nama_user";
            
}
elseif($useru == 'probolinggo')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('probolinggo','PROBOLINGGO') and level_user = 'marketing' order by nama_user";
            
}
elseif($useru == 'PROBOLINGGO')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('probolinggo','PROBOLINGGO') and level_user = 'marketing' order by nama_user";
            
}
elseif($useru == 'semarang')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('semarang','SEMARANG') and level_user = 'marketing' order by nama_user";
             
}
elseif($useru == 'SEMARANG')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('semarang','SEMARANG') and level_user = 'marketing' order by nama_user";
            
}
elseif($useru == 'juwana')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('juwana','JUWANA') and level_user = 'marketing' order by nama_user";
             
}
elseif($useru == 'JUWANA')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('juwana','JUWANA') and level_user = 'marketing' order by nama_user";
            
}
elseif($useru == 'cirebon')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('cirebon','CIREBON') and level_user = 'marketing' order by nama_user";
            
}
elseif($useru == 'CIREBON')
{
	$queryu = "SELECT * FROM tb_user WHERE kota in ('cirebon','CIREBON') and level_user = 'marketing' order by nama_user";
            
}
elseif($useru == 'all')
{
	$queryu = "SELECT * FROM tb_user";
            
}		
	

				$user_ = mysql_query($queryu) or die(mysql_error());
				while ($row_ = mysql_fetch_array($user_)) {
				?>
	 		<option value="<?php echo $row_['id_user']; ?>"><?php echo $row_['nama_user']; ?></option>
				<?php
					}
				?>
				</select>
		</div>
		<div class="col-md-12">
			<div class="clearfix">
			<input name='submit' type='submit' class='btn btn-danger btn-sm col-md-4' value='Pindah'/>
 		</div>
	</div>

	</form>

</div>
					 <script type="text/javascript">
						$(document).ready(function() {
							$('#tanggal_input_awal').daterangepicker({
								singleDatePicker: true,
								calender_style: "picker_4"
				
							}, 
			 
				
				function(start, end, label) {
								console.log(start.toISOString(), end.toISOString(), label);
							});
				
						});
					</script>
						<script type="text/javascript">
						$(document).ready(function() {
							$('#tanggal_input_sampai').daterangepicker({
								singleDatePicker: true,
								calender_style: "picker_4"
				
							}, 
			 
				
				function(start, end, label) {
								console.log(start.toISOString(), end.toISOString(), label);
							});
				
						});
					</script>
				</div>
			</div>
		</div>