<div class="row">
  <div class="col-md-7">
    <div class="content-box-large">
      <div class="panel-heading">
        <div class="panel-title">Tambah Kontak</div>


      </div>
      <div class="panel-body">
        <?php
        // iki tambahan'e bro!
        $id_admin = $_SESSION['admin'];
        switch ($id_admin) {
          case '2':
            $queryx = 'SURABAYA';

            break;
          case '3':
            $queryx = 'PROBOLINGGO';

            break;
          case '4':
            $queryx = 'SEMARANG';

            break;
          case '5':
            $queryx = 'JUWANA';

            break;
          case '6':
            $queryx = 'CIREBON';

            break;
          default:
            $queryx = 'PLR';

            break;
        }
        // iki akhire

        ?>
        <form class="form-horizontal" role="form" action="insert_kontak.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="kode_pel" class="col-sm-2 control-label">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Kode" name="kode_pel" required>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_pel" class="col-sm-2 control-label">Nama Perusahaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama_pel" required>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat_pel" class="col-sm-2 control-label">Alamat Perusahaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Alamat Perusahaan" name="alamat_pel" required>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Provinsi Perusahaan</label>
            <div class="col-sm-10">
              <select id="provinsi" name="provinsi">
                <option value="">Pilih Provinsi</option>
                <?php
                $query = mysql_query("SELECT * FROM provinsi ORDER BY nama_provinsi");
                while ($row = mysql_fetch_array($query)) {
                ?>
                  <option value="<?php echo $row['id_provinsi']; ?>">
                    <?php echo $row['nama_provinsi']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>

          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Kota Perusahaan</label>
            <div class="col-sm-10">

              <select id="kota" name="kota">
                <option value="">Pilih Kota</option>
                <?php
                $query = mysql_query("SELECT * FROM kota INNER JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi ORDER BY nama_kota");
                while ($row = mysql_fetch_array($query)) {
                ?>
                  <option id="kota" class="<?php echo $row['id_provinsi']; ?>" value="<?php echo $row['id_kota']; ?>">
                    <?php echo $row['nama_kota']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="nama_pel" class="col-sm-2 control-label">Market Area</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="area_pel" value=<?php echo $queryx ?> readonly="readonly">
            </div>

          </div>
          <div class="form-group">
            <label for="telp_pel" class="col-sm-2 control-label">Telepon Perusahaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Telepon Perusahaan" name="telp_pel" required>
            </div>
          </div>

          <div class="form-group">
            <label for="email_pel" class="col-sm-2 control-label">Email Perusahaan</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" placeholder="Email Perusahaan" name="email_pel">
            </div>
          </div>

          <div class="form-group">
            <label for="fax_pel" class="col-sm-2 control-label">Fax Perusahaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Fax Perusahaan" name="fax_pel">
            </div>
          </div>

          <div class="form-group">
            <label for="purchasing_pel" class="col-sm-2 control-label">Purchasing Perusahaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Bagian Purchasing Perusahaan" name="purchasing_pel" required>
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="content-box-large">
      <div class="panel-heading">
        <div class="panel-title">Import Kontak</div>


      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="import_xls.php" method="post" enctype="multipart/form-data">

          <div class="form-group">

            <div class="col-sm-10">
              <input type="file" class="btn btn-default" id="exampleInputFile1" name="xls">
              <p class="help-block">
                masukkan file Format XLS(ms office Excel 2003)
              </p>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <a href="data/format_database.xls">Unduh Format Excel</a>

            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
        <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
        <script>
          $("#kota").chained("#provinsi");
          $("#kecamatan").chained("#kota");
        </script>
      </div>
    </div>
  </div>
</div>