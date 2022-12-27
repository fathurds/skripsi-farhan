<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2><?= isset($saw) ? "Perhitungan Ranking dengan Metode SAW" : "Rating Poin" ?></h2>
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
              <th class="text-center" colspan="<?= $colspanKategori ?>">Kategori Pelanggaran</th>
              <th rowspan="3" style="vertical-align: middle;" class="text-center">Total</th>
            </tr>
            <tr>
              <?php foreach ($kategori_pelanggaran as $pelanggaran) : ?>
                <th class="text-center"><?= $pelanggaran->kriteria ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php $nokelas = 1;
            foreach ($kelas as $k_kelas => $v_kelas) :
            ?>
              <tr>
                <td><?= $nokelas; ?></td>
                <td><?= $k_kelas; ?></td>
                <?php foreach ($v_kelas as $key => $value) : ?>
                  <?php foreach((array)$value as $keyResult => $valueResult) : ?>
                    <?php if($keyResult != "total") : ?>
                      <td class="text-center"><?= isset($valueResult) ? $valueResult : "0" ?></td>
                    <?php  endif; ?>
                  <?php endforeach; ?>
                <?php endforeach; ?>
                <td><?= $total[$nokelas-1] ?> <?= isset($siswa) ? "siswa" : "poin" ?></td>
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