<!-- page content -->
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Daftar Siswa Yang Melanggar</h2>
        <a href="<?php echo site_url('pelanggaran/addPelanggaran');?>" title="Pelanggaran"><button class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Pelanggaran</button></a>
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
              <th>Siswa</th>
              <th>Pelanggaran</th>
              <th>Point</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no=1;
                foreach ($siswa_melanggar as $detail_melanggar) {
            ?>
              <tr>
                <td><?=@$no?></td>
                <td><?=@$detail_melanggar['nama_siswa']?></td>
                <td><?=@$detail_melanggar['nama_pelanggaran']?></td>
                <td><?=@$detail_melanggar['poin']?></td>
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
