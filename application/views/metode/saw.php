<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Perhitungan Ranking dengan Metode SAW</h2>
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
        if(count($kategori_pelanggaran)>0){
          $colspanKategori = count($kategori_pelanggaran);
        }
         ?>
        <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <th rowspan="3">No.</th>
              <th rowspan="3">Nama Kelas</th>
              <th rowspan="3">Tingkat</th>
              <th colspan="<?=$colspanKategori?>">Kategori Pelanggaran</th>
              <th rowspan="3">Total</th>
              <th rowspan="3">Ranking</th>
            </tr>
            <tr>
              <?php
              foreach ($kategori_pelanggaran as $k_pel => $v_pel) {
              ?>
              <th><?=$v_pel['kode_group_tatib']?></th>
              <?php
              }
               ?>
            </tr>
            <tr>
              <?php
              $c_ = 1;
              foreach ($kategori_pelanggaran as $k_pel => $v_pel) {
              ?>
              <th><?=$v_pel['nama_kriteria']?></th>
              <?php
                $c_++;
              }
               ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $nokelas=1;
            // var_dump($kelas);exit;
            foreach ($saw_ranking as $k_kelas => $v_kelas) {
            ?>
              <tr>
                <td><?=@$nokelas?></td>
                <td><?=@$k_kelas?></td>
                <td><?=@$tingkat[$k_kelas]?></td>
                <?php
                foreach ($kategori_pelanggaran as $k_pel_kode => $v_pel_kode) {
                ?>
                <td><?=@round($saw_data[$k_kelas][$v_pel_kode['kode_group_tatib']],2)?></td>
                <?php
                }
                 ?>
                 <td><?=@round($saw_total[$k_kelas],2)?></td>
                 <td><?=@$saw_ranking[$k_kelas]?></td>
              </tr>
            <?php
              $nokelas++;
            }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
