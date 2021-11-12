   <div class="row">
       <div class="col-md-12 panel-warning">
           <div class="content-box-header panel-heading">
               <div class="panel-title ">Pindah Kontak</div>
               <div class="panel-options">
                   <a href="#" class="" data-toggle="modal" data-target="#filter" data-rel="collapse"><i class="glyphicon glyphicon-calendar"></i>Filter Tanggal</a>
               </div>
           </div>

       </div>

   </div>
   <div class="content-box-large">
       <?php
        $mkrt = $_POST["id_user"];
        $tanggal_input_awal = $_POST["tanggal_input_awal"];
        $tanggal_input_sampai = $_POST["tanggal_input_sampai"];
        ?>
       <form class="form" action="?page=pindah_kontak" enctype="multipart/form-data" method="post">

           Pilih Nama Marketing
           <select name="id_user" required="required" class="select2_single">
               <?php
                $ca_user = mysql_query("select * from tb_user where kota = '" . $admin_area . "' AND level_user IN ('marketing', 'broker')") or die(mysql_error());
                while ($cari_user = mysql_fetch_array($ca_user)) {
                ?>
                   <option value="<?php echo $cari_user['id_user']; ?>"><?php echo $cari_user['nama_user']; ?></option>
               <?php
                }
                ?>

           </select>

           <input name="filter_tanggal" type="submit" value="Filter" class="btn btn-success" />
       </form>
       <form class="form" method="post" action="insert_set_pindah.php">
           <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                   <tr>
                       <th><span> - </span>
                           <div>
                               <input type="checkbox" id="check_all" data-to-table="tasks"><label></label>
                           </div>
                       </th>
                       <th>Tanggal Bagi</th>
                       <th>Kode</th>
                       <th>Nama Perusahaan</th>

                       <th>Kota</th>
                       <th>Provinsi</th>
                       <th>Status</th>
                       <th>Sales</th>
                       <th>Report</th>
                       <th>Expired</th>
                   </tr>
               </thead>
               <tbody>
                   <!-----------------------------------Content------------------------------------>
                   <?php



                    if (($tanggal_input_awal == '') and ($tanggal_input_sampai == '')) {
                        $kontak_query = mysql_query("SELECT * , DATE_FORMAT(tanggal_bagi,'%d/%m/%Y') AS TANGGAL FROM tb_kontak_all WHERE id_user = ' $mkrt '") or die(mysql_error());
                    } else {
                        $kontak_query = mysql_query("SELECT *, DATE_FORMAT(tanggal_bagi,'%d/%m/%Y') AS TANGGAL FROM tb_kontak_all WHERE DATE_FORMAT(tanggal_bagi,'%d/%m/%Y') BETWEEN '$tanggal_input_awal' AND '$tanggal_input_sampai'") or die(mysql_error());
                    }




                    while ($row = mysql_fetch_array($kontak_query)) {
                        $admin_query = mysql_query("select * from tb_admin where id_admin = '$_SESSION[admin]'") or die(mysql_error());
                        $row_admin = mysql_fetch_array($admin_query);
                        $useru = $row_admin['area'];
                        if ($useru == 'surabaya') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('surabaya','SURABAYA')";
                        } elseif ($useru == 'SURABAYA') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('surabaya','SURABAYA')";
                        } elseif ($useru == 'probolinggo') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('probolinggo','PROBOLINGGO')";
                        } elseif ($useru == 'PROBOLINGGO') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('probolinggo','PROBOLINGGO')";
                        } elseif ($useru == 'semarang') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('semarang','SEMARANG')";
                        } elseif ($useru == 'SEMARANG') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('semarang','SEMARANG')";
                        } elseif ($useru == 'juwana') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('juwana','JUWANA')";
                        } elseif ($useru == 'JUWANA') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('juwana','JUWANA')";
                        } elseif ($useru == 'cirebon') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('cirebon','CIREBON')";
                        } elseif ($useru == 'CIREBON') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user] and kota in ('cirebon','CIREBON')";
                        } elseif ($useru == 'all') {
                            $queryu = "SELECT * FROM tb_user WHERE id_user = $row[id_user]";
                        }

                        $user_query = mysql_query($queryu) or die(mysql_error());
                        $row_user = mysql_fetch_array($user_query);
                    ?>
                       <tr>
                           <td class="a-center ">
                               <input type="checkbox" class="flat" name="id_kon[]" value="<?php echo $row['id_kontak']; ?>">
                           </td>
                           <td><?php echo $row['TANGGAL']; ?></td>
                           <td><?php echo $row['kode_kontak']; ?></td>
                           <td><?php echo $row['nama_kontak']; ?> <br /><?php echo $row['alamat_kontak']; ?></td>

                           <td><?php echo $row['kota_kontak']; ?></td>
                           <td><?php echo $row['provinsi_kontak']; ?></td>

                           <td><?php
                                if ($row['status_kontak'] == 'telah dihubungi') {
                                    echo '<div class="label label-success"><i class="icon-check"></i><strong>' . $row['status_kontak'] . '</strong></div>';
                                } else if ($row['status_kontak'] == 'belum dihubungi') {
                                    echo '<div class="label label-danger"><i class="icon-ok"></i><strong>' . $row['status_kontak'] . '</strong></div>';
                                } else {
                                    echo '<div class="success"><i class="icon-remove-sign"></i><strong>' . $row['status_kontak'] . '</strong></div>';
                                };

                                ?>
                           </td>
                           <td><?php echo $row_user['nama_user']; ?></td>
                           <td><?php echo $row['report_kontak']; ?> || <?php echo $row['ket_kontak']; ?></td>
                           <td><?php echo $row['tanggal_tempo']; ?></td>
                       </tr>

                   <?php

                    } ?>
               </tbody>
           </table>
           Pindah ke Marketing
           <select name="user" required="required" class="form-control">
               <?php
                $cb_user = mysql_query("select * from tb_user where kota = '" . $admin_area . "' AND level_user IN ('marketing', 'broker')") or die(mysql_error());
                while ($cr_user = mysql_fetch_array($cb_user)) {


                ?>
                   <option value="<?php echo $cr_user['id_user']; ?>"><?php echo $cr_user['nama_user']; ?></option>

               <?php
                }
                ?>

           </select>
           <input name="id_user" type="hidden" value="<?php echo $cr_user['id_user']; ?>" />

           <?php echo "  <input name='submit' type='submit' class='btn btn-danger btn-xm' value='Pindah'/> "
            ?>


       </form>
   </div>

   <form class="form" action="?page=pindah_kontak" enctype="multipart/form-data" method="post">

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
                               <input class="form-control" size="16" type="text" value="" name="tanggal_input_awal" readonly>
                               <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                           </div>
                       </div>


                       <div class="form-group">
                           <label for="dtp_input2" class="control-label">Tanggal Akhir :</label>
                           <div class="input-group date form_date2 col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                               <input class="form-control" size="16" type="text" value="" name="tanggal_input_sampai" readonly>
                               <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                           </div>
                       </div>



                   </div>e
                   <div class="modal-footer">
                       <input name="submit" value="Filter" class="btn btn-success" type="submit" />

                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>

               </div>

           </div>
       </div>

       <script type="text/javascript">
           alert('Messagesd');
           $('#example').dataTable({
               "columnDefs": [{
                   "targets": [0],
                   "orderable": false,
               }]
           });

           $('body').on('change', '#check_all', function() {
               alert('Messagesd');

               var stud_row, checked;
               stud_row = $('#example').find('tbody tr');
               checked = $(this).prop('checked');
               $.each(stud_row, function() {
                   var checkbox = $($(this).find('td').eq(0)).find('input').prop('checked', checked);
               });
           });
       </script>