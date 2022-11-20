<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Tabel Kriteria</h2>
      </div>
    </div>
  </div>
</div><br>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <td>No</td>
              <td>Kriteria</td>
              <td>Keterangan</td>
              <td>Bobot</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($kriteria_group as $val_kriteria) { ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= @$val_kriteria['kriteria'] ?></td>
                <td><?= @$val_kriteria['keterangan'] ?></td>
                <td><?= @$val_kriteria['bobot'] ?></td>
              </tr>
            <?php
              $no++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>