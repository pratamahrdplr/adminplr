<div class="row">
    <div class="col-md-12 panel-warning">
        <div class="content-box-header panel-heading">
            <div class="panel-title ">Data User</div>
        </div>
        <div class="content-box-large box-with-header">
            <a href="?page=tambah_user" class="btn btn-success">Tambah User</a>
            <a href="?page=user_keluar" class="btn btn-danger">User keluar </a>
        </div>

    </div>

</div>






<div class="content-box-large">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>

            <tr>


                <th>Kode</th>
                <th>Nama</th>
                <th>Unit</th>
                <th>No. HP</th>
                <th>Level</th>
                <th data-orderable="false" class="center no-sort">Aktif</th>
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
                    $query = "SELECT * FROM tb_user WHERE kota IN ('surabaya', 'sidoarjo', 'gersik', 'lamongan', 'mojokerto', 'jombang', 'nganjuk', 'madiun', 'ngawi', 'ponorogo', 'pacitan', 'trenggalek', 'tulungagung', 'blitar') and level_user in ('marketing', 'broker')";
                    break;
                case '3':
                    $query = "SELECT * FROM tb_user WHERE  kota IN ('probolinggo', 'pasuruan', 'batu', 'malang', 'lumajang', 'jember', 'bondowoso', 'situbondo', 'banyuwangi') and level_user in ('marketing', 'broker')";
                    break;
                case '4':
                    $query = "SELECT * FROM tb_user WHERE  kota IN ('cilacap', 'banyumas', 'brebes', 'tegal', 'purbalingga', 'batang', 'banjarnegara', 'kebumen', 'wonosobo', 'purworejo', 'temanggung', 'magelang', 'kendal', 'yogyakarta', 'ungaran', 'salatiga', 'boyolali', 'klaten', 'surakarta', 'sukorejo', 'karanganyar', 'wonogiri', 'sragen', 'grobongan', 'demak', 'semarang') and level_user in ('marketing', 'broker')";
                    break;
                case '5':
                    $query = "SELECT * FROM tb_user WHERE  kota IN ('juwana', 'jepara', 'kudus', 'pati', 'rembang', 'blora') and level_user in ('marketing', 'broker')";
                    break;
                case '6':
                    $query = "SELECT * FROM tb_user WHERE  kota IN ('cirebon') and level_user in ('marketing', 'broker')";
                    break;
                default:
                    $query = "select * from tb_user";
                    break;
            }
            // iki akhire






            $device_query = mysql_query($query) or die(mysql_error());
            while ($row = mysql_fetch_array($device_query)) {
                $id = $row['id_user'];

                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $row['kode_user']; ?></td>
                        <td><?php echo $row['nama_user']; ?></td>
                        <td><?php echo $row['kota']; ?></td>
                        <td><?php echo $row['hp_user']; ?></td>

                        <td>
                            <?php echo $row['level_user']; ?>
                        </td>

                        <td class="a-center">
                            <?php if ($row['aktif'] == 1) { ?>
                                <?php echo 'Aktif'; ?>
                            <?php } else { ?>
                                <?php echo 'Tdk Aktif'; ?>
                            <?php } ?>
                        </td>

                        <td>
                            <?php echo "<a href='del_user.php?id_user= $row[id_user]' onClick=\"return confirm('Anda yakin ingin menghapusnya?')\" class='btn btn-default' >Hapus</a>" ?>
                            <a href="?page=edit_user&id_user=<?php echo $row['id_user']; ?>" class="btn btn-default">Edit</a>
                        </td>

                    </tr>

                <?php
                } ?>


        </tbody>

    </table>







</div>

</div>

</div>