<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Data Usul</div>
		  			</div>

		  		</div>
		  	</div>
            
<div class="content-box-large">
    <form action=""method="post">
    <table id="example" class="table table-striped" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Kota</th>
    <th>Provinsi</th>
    <th>PIC</th>
    <th>Telp</th>
    <th>Email</th>
    <th>Sales</th>
    <th>Status</th>
	<th>Keterangan</th>
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
            $queryx = "SELECT * FROM tb_kontak_usul WHERE status_kontak = 'menunggu' and kota_kontak IN ('surabaya', 'mojokerto', 'madiun', 'kediri', 'tulungagung', 'tuban', 'trenggalek', 'sumenep', 'sidoarjo', 'sampang', 'ponorogo', 'pamekasan', 'pacitan', 'ngawi', 'nganjuk', 'magetan', 'lamongan', 'jombang', 'gresik', 'bojonegoro', 'blitar', 'bangkalan', 'lumajang')";
            break;
        case '3':
            $queryx = "SELECT * FROM tb_kontak_usul WHERE status_kontak = 'menunggu' and kota_kontak IN ('probolinggo', 'pasuruan', 'batu', 'malang', 'lumajang', 'jember', 'bondowoso', 'situbondo', 'banyuwangi')";
            break;
        case '4':
            $queryx = "SELECT * FROM tb_kontak_usul WHERE status_kontak = 'menunggu' and kota_kontak IN ('tegal', 'surakarta', 'solo', 'semarang', 'salatiga', 'ambarawa', 'pekalongan', 'magelang', 'wonosobo', 'wonogiri', 'temanggung', 'slawi', 'sukoharjo', 'sragen', 'ungaran', 'purworejo', 'purbalingga', 'pemalang', 'klaten', 'kendal', 'kebumen', 'karanganyar', 'purwodadi', 'grobogan', 'demak', 'cilacap', 'brebes', 'boyolali', 'batang', 'banyumas', 'banjarnegara', 'sleman', 'yogyakarta', 'bantul', 'kulonprogo', 'purwokerto', 'juwana', 'juwono', 'jepara', 'kudus', 'pati', 'rembang', 'blora')";
            break;
        case '5':
            $queryx = "SELECT * FROM tb_kontak_usul WHERE status_kontak = 'menunggu' and kota_kontak IN ('tegal', 'surakarta', 'solo', 'semarang', 'salatiga', 'ambarawa', 'pekalongan', 'magelang', 'wonosobo', 'wonogiri', 'temanggung', 'slawi', 'sukoharjo', 'sragen', 'ungaran', 'purworejo', 'purbalingga', 'pemalang', 'klaten', 'kendal', 'kebumen', 'karanganyar', 'purwodadi', 'grobogan', 'demak', 'cilacap', 'brebes', 'boyolali', 'batang', 'banyumas', 'banjarnegara', 'sleman', 'yogyakarta', 'bantul', 'kulonprogo', 'purwokerto', 'juwana', 'juwono', 'jepara', 'kudus', 'pati', 'rembang', 'blora')";
            break;
        case '6':
            $queryx = "SELECT * FROM tb_kontak_usul WHERE status_kontak = 'menunggu' and kota_kontak IN ('slawi',  'tasikmalaya', 'sukabumi', 'depok', 'cimahi', 'cirebon', 'bogor', 'bekasi', 'banjar', 'bandung', 'sumedang', 'subang', 'purwakarta', 'majalengka', 'kuningan', 'karawang', 'indramayu', 'garut', 'cianjur', 'ciamis', 'bandung barat','banten','tangerang')";
            break;
        default:
            $queryx = "select * from tb_kontak_usul WHERE status_kontak = 'menunggu'";
            break;
    }
    // iki akhire


    $q = mysql_query($queryx) or die (mysql_error());

   
while ($row = mysql_fetch_array($q)) {;


   
	
$user_query = mysql_query("SELECT * FROM tb_user WHERE id_user = $row[id_user]")or die(mysql_error());
          $row_user = mysql_fetch_array($user_query);
  

    ?>
    <tr>

    <td><?php echo $row['nama_kontak']; ?></td>
    <td><?php echo $row['alamat_kontak']; ?></td>
    <td><?php echo $row['kota_kontak']; ?></td>
    <td><?php echo $row['provinsi_kontak']; ?></td>
    <td><?php echo $row['cp_kontak']; ?></td>
    <td><?php echo $row['telepon_kontak']; ?></td>
    <td><?php echo $row['email_kontak']; ?></td>
    <td><?php echo $row_user['nama_user']; ?></td>
    <td><?php echo $row['status_kontak']; ?></td>  
    <td><?php echo $row['report_kontak']; ?></td>  
    <td>
    <a href="?page=filter&cari=<?php echo $row['nama_kontak']; ?>&id_kontak=<?php echo $row['id_kontak']; ?>" class="btn btn-primary btn-xs" >Filter</a>
    
    </td>		
    </tr>
    
    <?php 
    
    }?>  
    </tbody>
    </table>
     </form>
    
    </div>
    