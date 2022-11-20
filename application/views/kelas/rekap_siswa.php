<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Rekap Jumlah Siswa yang Melakukan Pelanggaran</h2>
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
              <th rowspan="2">No.</th>
              <th rowspan="2">Nama Kelas</th>
              <th rowspan="2">Tingkat</th>
              <th colspan="<?=$colspanKategori?>">Kategori Pelanggaran (Jumlah Siswa)</th>
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
          </thead>
          <tbody>
            <?php
            $nokelas=1;
            // var_dump($kelas);exit;
            foreach ($kelas as $k_kelas => $v_kelas) {
            ?>
              <tr>
                <td><?=@$nokelas?></td>
                <td><?=@$v_kelas['nama']?></td>
                <td><?=@$v_kelas['tingkat']?></td>
                <?php
                foreach ($kategori_pelanggaran as $k_pel_kode => $v_pel_kode) {
                ?>
                <td><?=@$pelanggaran_group_siswa[$v_kelas['nama']][$v_pel_kode['kode_group_tatib']]?></td>
                <?php
                }
                 ?>
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
