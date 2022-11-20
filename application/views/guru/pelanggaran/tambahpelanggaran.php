

          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 id="judul-tambah-pelanggaran">Tambah Pelanggaran</h2>
                </div>
              </div>
            </div>
          </div><br>
          <div class="section">
            <div class="container">
              <div class="row">
                <div class="form-inline">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-2">NIS</label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" id="cari-nis" name="nisCari"/>
                      </div>
                    </div>
                    <button id="btn-cari-nis" type="button">Cari</button>
                    <br>
                    <div id="errorContent" class="help-block">

                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12 col-table-form">
                  <table class="table table-bordered" style="background: #d3fffb;" id="dt">
                    <tbody>
                      <?php //echo form_open('admin/guruAct/add2');?>
                      <tr class="warning">
                        <td style="background: #d3fffb;">NIS</td>
                        <td style="background: #d3fffb;"><input id="nis" type="text" name="nis" value="" placeholder="NIS" class="form-control" required="" readonly="true"></td>
                      </tr>
                      <tr class="warning">
                        <td style="background: #d3fffb;">Nama</td>
                        <td style="background: #d3fffb;"><input id="nama" type="text" name="nama" value="" placeholder="Nama Siswa" class="form-control" required="" readonly="true"></td>
                      </tr>
                      <tr class="warning">
                        <td style="background: #d3fffb;">Email</td>
                        <td style="background: #d3fffb;"><input id="email" type="email" name="email" value="" placeholder="Email" class="form-control" required="" readonly="true"></td>
                      </tr>
                      <tr class="warning">
                        <td style="background: #d3fffb;">Kontak</td>
                        <td style="background: #d3fffb;"><input id="kontak" type="text" name="kontak" value="" placeholder="Kontak" class="form-control" required="" readonly="true"></td>
                      </tr>
                      <tr>
                        <td style="background: #d3fffb;">Riwayat Pelanggaran</td>
                        <td>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kode</th>
                                <th>Nama</th>
                              </tr>
                            </thead>
                            <tbody id="tbl_riwayat_pelanggaran">
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr class="warning">
                        <td style="background: #d3fffb;">Pelanggaran yang dilakukan</td>
                        <td style="background: #d3fffb;">
                          <select id="pilih-pelanggaran" class="form-control" name="pelanggaran" required>
                            <option value="">Pilih</option>
                            <?php
                              foreach ($listTatib as $val_tatib) {
                                echo "<option value='".$val_tatib->kode."'>".$val_tatib->kode."-".$val_tatib->nama."</option>";
                              }
                             ?>
                          </select>
                          <div id="errorContentPilihPelanggaran" class="help-block">
                        </td>
                      </tr>
                      <tr class="warning">
                        <td style="background: #d3fffb;">Alasan</td>
                        <td style="background: #d3fffb;">
                          <textarea id="alasan" name="alasan" class="form-control"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input id="btn-tambah-pelanggaran" type="submit" value="Tambah Pelanggaran" class="btn btn-primary"></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <script>
              $(function(){
                $('.col-table-form').hide();
                $('#btn-cari-nis').on('click',function(){
                  var nis = $('#cari-nis').val();
                  if(nis != ''){
                    $.ajax({
                      data:{nis:nis},
                      url:"<?php echo base_url('index.php/pelanggaran/getSiswa') ?>",
                      beforeSend:function(){
                        $('#errorContent').empty();
                      },
                      success: function(res){
                        $('.col-table-form').show();
                        var res_getsiswa = JSON.parse(res);
                        var res = res_getsiswa.siswa;
                        var res_riwayat = res_getsiswa.riwayat;
                        if(res.nama){
                          $('#nama').val(res.nama);
                        }
                        if(res.nis){
                          $('#nis').val(res.nis);
                        }
                        if(res.email){
                          $('#email').val(res.email);
                        }
                        if(res.kontak){
                          $('#kontak').val(res.kontak);
                        }
                        var riwayat_siswa = '';
                        var no_r = 1;
                        $('#tbl_riwayat_pelanggaran').empty();
                        if(res_riwayat.length >0){
                          $.each(res_riwayat,function(key,val){
                            riwayat_siswa += '<tr>';
                            riwayat_siswa += '<td>'+no_r+'</td>';
                            riwayat_siswa += '<td>'+val.created_date+'</td>';
                            riwayat_siswa += '<td>'+val.kode_tatib+'</td>';
                            riwayat_siswa += '<td>'+val.nama_pelanggaran+'</td>';
                            riwayat_siswa += '</tr>';
                            no_r++;
                          });
                        }
                        $('#tbl_riwayat_pelanggaran').html(riwayat_siswa);
                      },
                      error:function(res){
                        $('#errorContent').html('<p class="text-danger">NIS Tidak Ditemukan</p>');
                      }
                    })
                  }
                });

                $('#btn-tambah-pelanggaran').on('click',function(){
                  $('#errorContent').empty();
                  $('#errorContentPilihPelanggaran').empty();
                  var langgar = $('#pilih-pelanggaran option:selected').val();
                  if($('#nis').val() == ''){
                    $('#errorContent').html('<p class="text-danger">NIS Belum Dipilih</p>');
                    $('html, body').animate({
                        scrollTop: $("#judul-tambah-pelanggaran").offset().top
                    }, 500);
                  }else if(langgar == ''){
                    $('#errorContentPilihPelanggaran').html('<p class="text-danger">Pelanggaran Harus Dipilih</p>');
                  }else{
                    console.log(langgar);
                    $.ajax({
                      method:'POST',
                      data:{
                            nis:$('#nis').val(),
                            pelanggaran:langgar,
                            alasan:$('#alasan').val()
                          },
                      url:"<?php echo base_url('index.php/pelanggaran/simpanPelanggaran') ?>",
                      success:function(res){
                        window.location.replace("<?php  echo base_url('index.php/admin/pelanggaran'); ?>");
                      },
                      error:function(res){
                        console.log(res);
                      }
                    });
                  }
                });

              });
            </script>
