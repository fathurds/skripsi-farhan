<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Rating Poin</h2>
      </div>
    </div>
  </div>
</div><br>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        $colspanKategori = 1;
        if (count($kategori_pelanggaran) > 0) {
          $colspanKategori = count($kategori_pelanggaran);
        }
        ?>
        <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <th rowspan="3" style="vertical-align: middle;" class="text-center">No.</th>
              <th rowspan="3" style="vertical-align: middle;" class="text-center">Nama Kelas</th>
              <th rowspan="3" style="vertical-align: middle;" class="text-center">Tingkat</th>
              <th class="text-center" colspan="<?= $colspanKategori ?>">Kategori Pelanggaran</th>
            </tr>
            <tr>
              <?php foreach ($kategori_pelanggaran as $pelanggaran) : ?>
                <th class="text-center"><?= $pelanggaran->kriteria ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php $nokelas = 1;
            foreach ($kelas as $v_kelas) :
            ?>
              <tr>
                <td><?= $nokelas; ?></td>
                <td><?= $v_kelas['nama']; ?></td>
                <td class="text-center"><?= $v_kelas['tingkat']; ?></td>
                <?php foreach ($kategori_pelanggaran as $pelanggaran) : ?>
                  <td class="text-center"><?= $v_kelas[$pelanggaran->kriteria] ?></td>
                <?php endforeach; ?>
              </tr>
            <?php
              $nokelas++;
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>