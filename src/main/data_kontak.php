<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Data Kontak All</div>
  <div class="panel-options">
<a href="#" class="" data-toggle="modal" data-target="#filter"data-rel="collapse"><i class="glyphicon glyphicon-import"></i> Import Excel</a>
						</div>						

		  			</div>
		  			<div class="content-box-large box-with-header">
<a href="?page=data_kontak" class="btn btn-warning">Semua</a>
<a href="?page=data_kontak_telah" class="btn btn-success">Telah dihubungi</a>
<a href="?page=data_kontak_belum" class="btn btn-success">Belum dihubungi</a>
<a href="?page=data_kontak_telpon_ulang" class="btn btn-success">Telepon Ulang</a>
<a href="?page=data_kontak_sisa" class="btn btn-success">Data Sisa</a>
					</div>
		  		</div>
		  	</div>
            
<div class="content-box-large">
<form action="del_kontak.php"method="post">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th class="headings"></th>
    <th>Nama</th>
    <th>Kontak</th>
    <th>Status</th>
    <th>Ket</th>
    <th>Bidang Usaha</th>
        <th>Sales</th>
        <th>Expired</th>
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
            $query = "SELECT id_kontak,id_user,nama_kontak,kota_kontak,telepon_kontak,email_kontak,status_kontak,report_kontak,tanggal_tempo,bidangusaha FROM tb_kontak_all WHERE kota_kontak IN ('surabaya', 'mojokerto', 'madiun', 'kediri', 'tulungagung', 'tuban', 'trenggalek', 'sumenep', 'sidoarjo', 'sampang', 'ponorogo', 'pamekasan', 'pacitan', 'ngawi', 'nganjuk', 'magetan', 'lamongan', 'jombang', 'gresik', 'bojonegoro', 'blitar', 'bangkalan', 'lumajang')";
            break;
        case '3':
            $query = "SELECT id_kontak,id_user,nama_kontak,kota_kontak,telepon_kontak,email_kontak,status_kontak,report_kontak,tanggal_tempo FROM tb_kontak_all WHERE kota_kontak IN ('probolinggo', 'pasuruan', 'batu', 'malang', 'lumajang', 'jember', 'bondowoso', 'situbondo', 'banyuwangi')";
            break;
        case '4':
            $query = "SELECT id_kontak,id_user,nama_kontak,kota_kontak,telepon_kontak,email_kontak,status_kontak,report_kontak,tanggal_tempo FROM tb_kontak_all WHERE kota_kontak IN ('surakarta', 'solo', 'semarang', 'salatiga', 'ambarawa', 'pekalongan', 'magelang', 'wonosobo', 'wonogiri', 'temanggung', 'slawi', 'sukoharjo', 'sragen', 'ungaran', 'purworejo', 'purbalingga', 'pemalang', 'klaten', 'kendal', 'kebumen', 'karanganyar', 'purwodadi', 'grobogan', 'demak', 'cilacap', 'boyolali', 'batang', 'banyumas', 'banjarnegara', 'sleman', 'yogyakarta', 'bantul', 'kulonprogo', 'purwokerto', 'juwana', 'juwono', 'jepara', 'kudus', 'pati', 'rembang', 'blora')";
            break;
        case '5':
            $query = "SELECT id_kontak,id_user,nama_kontak,kota_kontak,telepon_kontak,email_kontak,status_kontak,report_kontak,tanggal_tempo FROM tb_kontak_all WHERE kota_kontak IN ('surakarta', 'solo', 'semarang', 'salatiga', 'ambarawa', 'pekalongan', 'magelang', 'wonosobo', 'wonogiri', 'temanggung', 'slawi', 'sukoharjo', 'sragen', 'ungaran', 'purworejo', 'purbalingga', 'pemalang', 'klaten', 'kendal', 'kebumen', 'karanganyar', 'purwodadi', 'grobogan', 'demak', 'cilacap', 'boyolali', 'batang', 'banyumas', 'banjarnegara', 'sleman', 'yogyakarta', 'bantul', 'kulonprogo', 'purwokerto', 'juwana', 'juwono', 'jepara', 'kudus', 'pati', 'rembang', 'blora')";
            break;
        case '6':
            $query = "SELECT id_kontak,id_user,nama_kontak,kota_kontak,telepon_kontak,email_kontak,status_kontak,report_kontak,tanggal_tempo FROM tb_kontak_all WHERE kota_kontak IN ('majalengka','tegal','brebes','kuningan','karawang','indramayu','garut','cianjur','ciamis','bandung barat','purwakarta','subang','tasikmalaya','sukabumi','depok','cimahi','cirebon','bogor','bekasi','banjar','sumedang','bandung','banten','tangerang')";
            break;
        default:
            $query = "select id_kontak,id_user,nama_kontak,kota_kontak,telepon_kontak,email_kontak,status_kontak,report_kontak,tanggal_tempo,bidangusaha from tb_kontak_all";
            break;
    }
    // iki akhire
	
   $kontak_query = mysql_query($query)or die(mysql_error());
	
    while($row = mysql_fetch_array($kontak_query)){
	$user_query = mysql_query("select id_user,nama_user from tb_user where id_user = '$row[id_user]' ")or die(mysql_error());
                $row_user = mysql_fetch_array($user_query);
    ?>
    <tr>
    <td class="a-center ">
     <input type="checkbox"  class="checkbox" name="id_kon[]" value="<?php echo $row['id_kontak']; ?>">
    </td>
    <td><a href="?page=detail_kontak&id_kontak=<?php echo $row['id_kontak']; ?>"><?php echo $row['nama_kontak']; ?></a><br />
    <?php echo $row['kota_kontak']; ?> (<?php echo $row['email_kontak']; ?>)
    </td>

       <td><?php echo $row['telepon_kontak']; ?></td>
           
    <td>
	<?php 
    if($row['status_kontak']=='telah dihubungi')
    {
    echo '<div class="label label-success"><i class="icon-check"></i><strong>'.$row['status_kontak'].'</strong></div>';
    }
    else if($row['status_kontak']=='belum dihubungi')
    {
    echo '<div class="label label-danger"><i class="icon-ok"></i><strong>'.$row['status_kontak'].'</strong></div>';
    }
    else
    {
    echo '<div class="success"><i class="icon-remove-sign"></i><strong>'.$row['status_kontak'].'</strong></div>';
    };
    
    ?>
    </td>
    <td><?php echo $row['report_kontak']; ?></td> 

    <td><?php echo $row['bidangusaha']; ?></td>

        <td><?php echo $row_user['nama_user']; ?>
        <?php echo "<br/><small>(" . $row_user['kota'] . ")</small>";  ?>
        </td>
        <td><?php echo $row['tanggal_tempo']; ?></td>
    <td>
    <a href="?page=edit_kontak&id_kontak=<?php echo $row['id_kontak']; ?>" class="btn btn-primary btn-sm" >Edit</a>
    </td>		

    </tr>
    
    <?php 
    
    }?>  
    </tbody>
    </table>
  <?php  echo"  <input name='submit' type='submit' onClick=\"return confirm('Anda yakin ingin menghapusnya?')\" class='btn btn-danger' value='Hapus'/> "
  ?>
    </form>
    </div>
    <form class="form" action="simpan_kontak.php" enctype="multipart/form-data" method="post">                                          

<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel">Filter Tanggal</h4>
</div>
<div class="modal-body">
<div class="form-group">
<label for="dtp_input1" class="control-label">Tanggal Awal :</label>
<div class="input-group date form_date1 col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
<input class="form-control" size="16" type="text" value="" name="tanggal_mulai" readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
</div>
</div>


<div class="form-group">
<label for="dtp_input2" class="control-label">Tanggal Akhir :</label>
<div class="input-group date form_date2 col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
<input class="form-control" size="16" type="text" value="" name="tanggal_akhir" readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
</div>
</div>



</div>
<div class="modal-footer">
<input name="submit" value="Back up" class="btn btn-success"type="submit" />

<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

</div>

</div>
</div>
</form>   
