<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 id="judul-tambah-pelanggaran"><?= isset($edit) ? "Ubah" : "Tambah" ?> Pelanggaran</h2>
      </div>
    </div>
  </div>
</div><br>
<div class="section">
  <?php if(!isset($edit)) : ?>
  <div class="container">
    <div class="row">
      <div class="form-inline">
        <div class="col-md-6">
          <form id="cari_nis">
            <div class="form-group">
              <label class="control-label col-md-2">NIS</label>
              <div class="col-md-10">
                <input class="form-control" type="text" id="cari-nis" name="nisCari" />
              </div>
            </div>
            <button id="btn-cari-nis" type="submit">Cari</button>
            <br>
            <div id="errorContent" class="help-block">
          </form>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-table-form">
        <form action="<?= base_url() ?>pelanggaran/<?= isset($edit) ? "pelanggaranAct/edit2" : "simpanPelanggaran" ?>" method="POST">
        <?php if(isset($edit)) : ?>
          <input type="hidden" name="id_pelanggaran" value="<?= $pelanggaranPeserta->id_pelanggaran ?>">
        <?php endif; ?>  
        <table class="table table-bordered" style="background: #d3fffb;" id="dt">
            <tbody>
              <tr class="warning">
                <td style="background: #d3fffb;">NIS</td>
                <td style="background: #d3fffb;">
                  <input id="nis" type="text" name="nis" value="<?= @$pelanggaranPeserta->nis ?>" placeholder="NIS" class="form-control" required="" readonly="true">
                </td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Nama</td>
                <td style="background: #d3fffb;"><input id="nama" type="text" name="nama" value="<?= @$pelanggaranPeserta->nama ?>" placeholder="Nama Siswa" class="form-control" required="" readonly="true"></td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Email</td>
                <td style="background: #d3fffb;"><input id="email" type="email" name="email" value="<?= @$pelanggaranPeserta->email ?>" placeholder="Email" class="form-control" required="" readonly="true"></td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Kontak</td>
                <td style="background: #d3fffb;"><input id="kontak" type="text" name="kontak" value="<?= @$pelanggaranPeserta->kontak ?>" placeholder="Kontak" class="form-control" required="" readonly="true"></td>
              </tr>
              <tr>
                <td style="background: #d3fffb;">Riwayat Pelanggaran</td>
                <td>
                  <input id="riwayatPelanggaran" type="hidden" name="riwayatPelanggaran" value="Tidak ada pelanggaran" class="form-control" readonly>
                  <table class="table table-hover" id="tableRiwayat">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th style="min-width: 100px;">Tanggal</th>
                        <th>Kode</th>
                        <th>Pelanggaran</th>
                        <th>Poin</th>
                      </tr>
                    </thead>
                    <tbody id="tbl_riwayat_pelanggaran">
                      <?php
                      if(isset($edit)) :
                        $no_r = 1;
                        foreach($riwayat as $riwayat_value) : ?>
                          <tr>
                            <td><?= $no_r ?></td>
                            <td><?= $riwayat_value->created_date ?></td>
                            <td><?= $riwayat_value->kode_tatib ?></td>
                            <td><?= $riwayat_value->nama_pelanggaran ?></td>
                            <td><?= $riwayat_value->poin ?></td>
                          </tr>
                          <?php
                          $no_r++;
                        endforeach; ?>
                          <tr>
                            <td align="center" colspan="4">Total</td>
                            <td><?= $poin ?></td>
                          </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Sanksi</td>
                <td style="background: #d3fffb;">
                  <textarea type="text" name="rekomendasi" class="form-control" id="rekomendasi" placeholder="Tidak ada sanksi" readonly><?= $rekomendasi->sanksi ?></textarea>
                </td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Tindak Lanjut</td>
                <td style="background: #d3fffb;">
                  <textarea type="text" name="tindaklanjut" class="form-control" id="tindaklanjut" placeholder="Tidak ada tindak lanjut" readonly><?= $rekomendasi->tindak_lanjut ?></textarea>
                </td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Pelanggaran yang dilakukan</td>
                <td style="background: #d3fffb;">
                  <select id="pilih-pelanggaran" class="form-control" name="pelanggaran" required>
                    <option value="" disabled selected>Pilih</option>
                    <?php foreach ($listTatib as $val_tatib) : ?>
                      <option value='<?= $val_tatib->kode ?>' <?= isset($edit) && $pelanggaranPeserta->kode_tatib == $val_tatib->kode ? "selected" : "" ?> ><?= $val_tatib->kode ?> - <?= $val_tatib->nama ?></option>;
                    <?php endforeach; ?>
                  </select>
                  <div id="errorContentPilihPelanggaran" class="help-block">
                </td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Alasan</td>
                <td style="background: #d3fffb;">
                  <textarea id="alasan" name="alasan" class="form-control"><?= @$pelanggaranPeserta->alasan ?></textarea>
                </td>
              </tr>
              <tr>
                <td></td>
                <td><input id="btn-tambah-pelanggaran" type="submit" value="<?= isset($edit) ? "Simpan" : "Tambah" ?> Pelanggaran" class="btn btn-primary"></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
<script>
  $(function() {
    var poin;
    <?php if(!isset($edit)) : ?>
      $('.col-table-form').hide();
    <?php endif; ?>

    $('#cari_nis').submit(function(e) {
      e.preventDefault();
      var nis = $('#cari-nis').val();
      if (nis != '') {
        $.ajax({
          data: {
            nis: nis
          },
          url: "<?= base_url('/pelanggaran/getSiswa') ?>",
          beforeSend: function() {
            $('#errorContent').empty();
          },
          success: function(res) {
            $('.col-table-form').hide();
            if (JSON.parse(res).siswa) { // Jika ada data siswa
              $('.col-table-form').show();
              $('#riwayatPelanggaran').attr('type', 'hidden');
              $('#tableRiwayat').css('display', 'block');
              var res_getsiswa = JSON.parse(res);
              var res = res_getsiswa.siswa;
              var res_riwayat = res_getsiswa.riwayat;
              if (res.nama) {
                $('#nama').val(res.nama);
              }
              if (res.nis) {
                $('#nis').val(res.nis);
              }
              if (res.email) {
                $('#email').val(res.email);
              }
              if (res.kontak) {
                $('#kontak').val(res.kontak);
              }
              var riwayat_siswa = '';
              var no_r = 1;
              $('#tbl_riwayat_pelanggaran').empty();
              if (res_riwayat.length > 0) {
                var point = 0;
                $.each(res_riwayat, function(key, val) {
                  var dateTemp = val.created_date.split('-');
                  riwayat_siswa += '<tr>';
                  riwayat_siswa += '<td>' + no_r + '</td>';
                  riwayat_siswa += '<td>' + `${dateTemp[2]}-${dateTemp[1]}-${dateTemp[0]}` + '</td>';
                  riwayat_siswa += '<td>' + val.kode_tatib + '</td>';
                  riwayat_siswa += '<td>' + val.nama_pelanggaran + '</td>';
                  riwayat_siswa += '<td>' + val.poin + '</td>';
                  riwayat_siswa += '</tr>';
                  no_r++;
                  point += parseInt(val.poin);
                });
                riwayat_siswa += '<tr>';
                riwayat_siswa += '<td align="center" colspan="4">Total</td>';
                riwayat_siswa += '<td>' + point + '</td>';
                riwayat_siswa += '</tr>';
                $.ajax({
                  url: '<?php echo site_url('pelanggaran/getRekomendasi'); ?>',
                  data: {
                    poin: point
                  },
                  type: 'GET',
                  success: function(data) {
                    var res = JSON.parse(data);
                    $('#rekomendasi').val(res.rekomendasi[0].sanksi);
                    $('#tindaklanjut').val(res.rekomendasi[0].tindak_lanjut);
                  }
                });
              } else {
                $('#riwayatPelanggaran').attr('type', 'text');
                $('#tableRiwayat').css('display', 'none');
                $('#rekomendasi').val('');
                $('#tindaklanjut').val('');
              }
              $('#tbl_riwayat_pelanggaran').html(riwayat_siswa);
            } else {
              $('#errorContent').html('<p class="text-danger">NIS Tidak Ditemukan</p>');
            }
          },
          error: function(res) {
            $('#errorContent').html('<p class="text-danger">NIS Tidak Ditemukan</p>');
          }
        })
      }
    });

    // $('#btn-tambah-pelanggaran').on('click', function() {
    //   $('#errorContent').empty();
    //   $('#errorContentPilihPelanggaran').empty();
    //   var langgar = $('#pilih-pelanggaran option:selected').val();
    //   if ($('#nis').val() == '') {
    //     $('#errorContent').html('<p class="text-danger">NIS Belum Dipilih</p>');
    //     $('html, body').animate({
    //       scrollTop: $("#judul-tambah-pelanggaran").offset().top
    //     }, 500);
    //   } else if (langgar == '') {
    //     $('#errorContentPilihPelanggaran').html('<p class="text-danger">Pelanggaran Harus Dipilih</p>');
    //   } else {
    //     console.log(langgar);
    //     $.ajax({
    //       method: 'POST',
    //       data: {
    //         nis: $('#nis').val(),
    //         pelanggaran: langgar,
    //         alasan: $('#alasan').val()
    //       },
    //       url: "<?php echo base_url('/pelanggaran/simpanPelanggaran') ?>",
    //       success: function(res) {
    //         window.location.replace("<?php echo base_url('/admin/pelanggaran'); ?>");
    //       },
    //       error: function(res) {
    //         console.log(res);
    //       }
    //     });
    //   }
    // });
  });
</script>