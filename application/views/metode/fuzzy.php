<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Tabel Fuzzy</h2>
      </div>
    </div>
  </div>
</div><br>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <table class="table table-bordered text-center" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <td>No</td>
              <td>Nilai</td>
              <td>Bobot</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($fuzzy as $val_fuzzy) { ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $val_fuzzy->nilai_min ?> s/d <?= $val_fuzzy->nilai_maks ?></td>
                <td><?= $val_fuzzy->bobot ?></td>
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