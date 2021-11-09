<?php
	 
$tanggal_input_awal = $_POST["tanggal_input_awal"];
$tanggal_input_sampai = $_POST["tanggal_input_sampai"];

    ?>
<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Data Order tidak setujui</div>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
<a href="?page=data_pemesanan_pending" class="btn btn-success">Order Baru</a>
<a href="?page=data_pemesanan_setuju" class="btn btn-success">Order di Setujui </a>
<a href="?page=data_pemesanan_gagal" class="btn btn-warning">Order di tolak </a>
<a href="?page=data_pemesanan" class="btn btn-success">Data Order Semua</a>
					</div>
                    
                    <p class="text-muted font-13 m-b-30">
                        
 <?php
$mkrt = $_POST["id_user"];
$tanggal_input_awal = $_POST["tanggal_input_awal"];
$tanggal_input_sampai = $_POST["tanggal_input_sampai"];
    ?>
<form class="form" action="?page=data_pemesanan_gagal" enctype="multipart/form-data" method="post">

Pilih Nama Marketing
<select name="id_user" required="required" class="select2_single">
<?php
$ca_user = mysql_query("select * from tb_user where kota = '" . $admin_area . "'")or die(mysql_error());
                while($cari_user = mysql_fetch_array($ca_user)){
				
				
				?>
                <option value="<?php echo $cari_user['id_user']; ?>"><?php echo $cari_user['nama_user']; ?></option>
                <?php
				}
				?>
                
                </select>
                
<input name="filter_tanggal" type="submit" value="Filter"  class="btn btn-success"/>
</form>
                       
                         </p>
		  		</div>
		  	</div>


<div class="content-box-large">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>

<thead>
    <tr>
    <th>Nama Perusahaan</th>
    <th>Alamat</th>
    <th>Kota</th>
    <th>Purchasing</th>
    <th>Sales</th>
    <th>Tanggal PO</th>
    <th>Keterangan</th>
    <th>Status</th>
    <th>Aksi</th>

</thead>

<tbody>
<!-----------------------------------Content------------------------------------>
<?php
	$po_query = mysql_query("select * from tb_po where id_user = '$mkrt' and status_po = 'cancel'")or die(mysql_error());
    while($rowp = mysql_fetch_array($po_query)){
	
	$pelanggan_query = mysql_query("select * from tb_kontak_all where id_kontak = '$rowp[id_kontak]'")or die(mysql_error());
    $row = mysql_fetch_array($pelanggan_query);
	
	$user_query = mysql_query("select * from tb_user where id_user = '$row[id_user]' ")or die(mysql_error());
    $row_user = mysql_fetch_array($user_query);
    ?>
                  
<tr>
    <td><?php echo $row['nama_kontak']; ?></td>
    <td><?php echo $row['alamat_kontak']; ?></td>
    <td><?php echo $row['kota_kontak']; ?></td>
    <td><?php echo $row['cp_kontak']; ?></td>
    <td><?php echo $row_user['nama_user']; ?></td>
    <td><?php echo $rowp['tanggal_po']; ?></td>
    
    <td>Rp.<?php echo $rowp['harga_po']; ?>, <?php echo $rowp['pembayaran_po']; ?>, <?php echo $rowp['pajak']; ?>, <?php echo $rowp['vol_po']; ?> KL, <?php echo $rowp['kelengkapan_po']; ?>, <?php echo $rowp['keterangan']; ?></td>
    <td><?php echo $rowp['status_po']; ?></td>
    <td>
<a href="print_po.php?id_po=<?php echo $rowp['id_po']; ?>" class="btn btn-success btn-xs">Print</a>
<a href="?page=edit_po&id_po=<?php echo $rowp['id_po']; ?>" class="btn btn-default btn-xs">Edit</a>
<a href="cancel_po.php?id_po=<?php echo $rowp['id_po']; ?>" class="btn btn-danger btn-xs">Cancel</a>
   </td>		
    </tr>
    <?php 
    }?> 


                


</tbody>
                        </table>

  </div>