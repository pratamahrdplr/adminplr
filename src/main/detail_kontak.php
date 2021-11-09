<div class="row">
<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
                  <h2>Detail Kontak</h2>
    </div>
		  			<div class="content-box-large box-with-header">
                  <br />
<?php
$kontak = mysql_query("select * from tb_kontak_all where id_kontak = '$_GET[id_kontak]' ")or die(mysql_error());
while($row = mysql_fetch_array($kontak)){

$quser = mysql_query("select * from tb_user where id_user = '$row[id_user]' ")or die(mysql_error());
$rowu = mysql_fetch_array($quser);
?>
<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="nama_pel" class="col-sm-2 control-label">Kode</label>
<div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['kode_kontak']; ?>" name="nama_pel" readonly>
</div>
</div>
<div class="form-group">
<label for="nama_pel" class="col-sm-2 control-label">Marketing</label>
<div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $rowu['nama_user']; ?>" name="nama_pel" readonly>
</div>
</div>
<div class="form-group">
<label for="nama_pel" class="col-sm-2 control-label">Nama Perusahaan</label>
<div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['nama_kontak']; ?>" name="nama_pel" readonly>
</div>
</div>
<div class="form-group">
<label for="alamat_pel" class="col-sm-2 control-label">Alamat Perusahaan</label>
<div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['alamat_kontak']; ?>" name="nama_pel" readonly>
</div>
</div>
<div class="form-group">
<label for="" class="col-sm-2 control-label">Kota Perusahaan</label>
<div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['kota_kontak']; ?>" name="nama_pel" readonly>
</div>
</div>
<div class="form-group">
<label for="" class="col-sm-2 control-label">Provinsi Perusahaan</label>
<div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['provinsi_kontak']; ?>" name="nama_pel" readonly>
</div>
</div>
<div class="form-group">
<label for="nama_pel" class="col-sm-2 control-label">PIC</label>
<div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['cp_kontak']; ?>" name="nama_pel" readonly>
</div>
                                    
								  </div>
                                   <div class="form-group">
								    <label for="telp_pel" class="col-sm-2 control-label">Telepon / Fax Perusahaan</label>
								    <div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['telepon_kontak']; ?>, <?php echo $row['telepon_kontak2']; ?>, <?php echo $row['hp_kontak']; ?> / <?php echo $row['fax_kontak']; ?>" name="nama_pel" readonly>

								    </div>
								  </div>
                                  
                                   <div class="form-group">
								    <label for="email_pel" class="col-sm-2 control-label">email</label>
								    <div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['email_kontak']; ?>" name="nama_pel" readonly>
								    </div>
								  </div>
                                  
                                   <div class="form-group">
								    <label for="fax_pel" class="col-sm-2 control-label">Status</label>
								    <div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['status_kontak']; ?>" name="nama_pel" readonly>                          </div>
								  </div>
                                  
                                   <div class="form-group">
								    <label for="purchasing_pel" class="col-sm-2 control-label">Report</label>
								    <div class="col-sm-10">
<input type="text" class="form-control" value="<?php echo $row['report_kontak']; ?>, <?php echo $row['ket_kontak']; ?>" readonly>
								    </div>
								  </div>
                                  
                                  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
<a href="?page=data_kontak" class="btn btn-primary" >Back</a>
<a href="?page=edit_kontak&id_kontak=<?php echo $row['id_kontak']; ?>" class="btn btn-danger" >Edit</a>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
<div class="col-sm-5">
	  					
			  				

                  </form>
                  <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
        <script>
            $("#kota").chained("#provinsi");
            $("#kecamatan").chained("#kota");
        </script>
			  				</div>
							<?php
}
							?>
			  			</div>
	  				</div>
</div>