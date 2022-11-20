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
      <div class="col-md-12">

        <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <td rowspan="2">No</td>
              <td colspan="2">Rentang Nilai</td>
              <td rowspan="2">Bobot</td>
            </tr>
            <tr>
              <td>Nilai Min</td>
              <td>Nilai Maks</td>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach($fuzzy as $val_fuzzy){?>
            <tr>
              <td><?=$no?></td>
              <td><?=$val_fuzzy['nilai_min']?></td>
              <td><?=$val_fuzzy['nilai_maks']?></td>
              <td><?=$val_fuzzy['bobot']?></td>
            </tr>
            <?php
                $no++;
              }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
