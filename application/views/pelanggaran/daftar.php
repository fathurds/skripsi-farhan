<!-- page content -->
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Daftar Siswa Yang Melanggar</h2>
        <a href="<?php echo site_url('pelanggaran/addPelanggaran'); ?>" title="Pelanggaran"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Pelanggaran</button></a>
        <form action="">
          <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-2">
              <!-- <h4>Show
                <select>
                  <option nama="" value="">10</option>
                  <option nama="" value="">25</option>
                  <option nama="" value="">50</option>
                  <option nama="" value="">100</option>
                </select>
                entries
              </h4> -->

            </div>
            <div class="col-sm-7"></div>
            <!-- <div class="col-sm-1">
              <h4>Search :</h4>
            </div> -->
            <div class="col-sm-3" style="display: flex; gap: 5px;">
              <input type="text" class="form-control" name="search">
              <button class="btn btn-primary">Search</button>
            </div>
              
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="section">
  <div class="container">
    <?php if($this->session->flashdata('msg')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?= $this->session->flashdata('msg') ?>
    </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIS</th>
              <th>Siswa</th>
              <th style="min-width: 100px;">Kelas</th>
              <th>Pelanggaran</th>
              <th>Alasan</th>
              <th style="min-width: 115px;">Tanggal</th>
              <th>Point</th>
              <th style="min-width: 115px;">Aksi</th>
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
                <td><?= @$detail_melanggar['nama_kelas'] ?></td>
                <td class="text-center"><?= @$detail_melanggar['kode_tatib'] ?></td>
                <td><?= @$detail_melanggar['alasan'] ?></td>
                <td><?= @$detail_melanggar['created_date'] ?></td>
                <td><?= @$detail_melanggar['poin'] ?></td>
                <td>
                  <a href="<?= base_url('pelanggaran/pelanggaranAct/edit/') . $detail_melanggar['id_pelanggaran']; ?>" title="Edit"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                  <a onclick="deletes(<?= $detail_melanggar['id_pelanggaran']; ?>)" title="Tugas"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                </td>
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

<script type="text/javascript">
  var url = "<?php echo base_url(); ?>";

  function deletes(id) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data again!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      },
      function() {
        window.location = url + "pelanggaran/pelanggaranAct/del/" + id;
      });
  }
</script>