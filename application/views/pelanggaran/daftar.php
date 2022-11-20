<!-- page content -->
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Daftar Siswa Yang Melanggar</h2>
        <a href="<?php echo site_url('pelanggaran/addPelanggaran'); ?>" title="Pelanggaran"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Pelanggaran</button></a>
        <div class="row">
          <div class="col-sm-2">
            <h4>Show
              <select>
                <option nama="" value="">10</option>
                <option nama="" value="">25</option>
                <option nama="" value="">50</option>
                <option nama="" value="">100</option>
              </select>
              entries
            </h4>

          </div>
          <div class="col-sm-7"></div>
          <div class="col-sm-1">
            <h4>Search :</h4>
          </div>
          <div class="col-sm-2">
            <input type="text" class="form-control">
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIS</th>
              <th>Siswa</th>
              <th>Kelas</th>
              <th>Pelanggaran</th>
              <th>Alasan</th>
              <th>Tanggal</th>
              <th>Point</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($siswa_melanggar as $detail_melanggar) {
              if (@$detail_melanggar['tingkat'] == 4) {
                $detail_melanggar['tingkat'] = 'XIII';
              } else if (@$detail_melanggar['tingkat'] == 3) {
                $detail_melanggar['tingkat'] = 'XII';
              } else if (@$detail_melanggar['tingkat'] == 2) {
                $detail_melanggar['tingkat'] = 'XI';
              } else {
                $detail_melanggar['tingkat'] = 'X';
              }
            ?>
              <tr>
                <td><?= @$no ?></td>
                <td><?= @$detail_melanggar['nis'] ?></td>
                <td><?= @$detail_melanggar['nama'] ?></td>
                <td><?= @$detail_melanggar['tingkat'] ?> - <?= @$detail_melanggar['nama_kelas'] ?></td>
                <td class="text-center"><?= @$detail_melanggar['kode_tatib'] ?></td>
                <td><?= @$detail_melanggar['alasan'] ?></td>
                <td><?= @$detail_melanggar['created_date'] ?></td>
                <td><?= @$detail_melanggar['poin'] ?></td>
              </tr>
            <?php
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>