<div class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span>Sistem Tata Tertib</span></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
      <ul class="nav navbar-nav navbar-right">
        <!-- <li>
          <a href="<?php echo site_url('siswa/'); ?>">Laporan Pembelajaran</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/mapel'); ?>">Mapel</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/materi'); ?>">Materi</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/tugas'); ?>">Tugas</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/kuis') ?>">Kuis</a>
        </li> -->
        <li class="active">
          <a href="<?php echo site_url('siswa/pelanggaran') ?>">Pelanggaran</a>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('username'); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('siswa/changePass'); ?>"><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Change Pass</a></li>
            <li><a href="<?php echo site_url('home/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Log Out</a></li>
          </ul>
        </li>      
      </ul>
    </div>
  </div>
</div>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 id="judul-tambah-pelanggaran">Pelanggaran</h2>
        <?php //print_r($siswa); ?>
      </div>
    </div>
  </div>
</div><br>
<!-- <div class="section"> -->
<div class="container">
  <!-- <div class="row">
    <div class="form-inline">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-2">NIS</label>
          <div class="col-md-10">
            <input class="form-control" type="text" id="cari-nis" name="nisCari"/>
          </div>
        </div>
        <button id="btn-cari-nis" type="button">Cari</button>
        <br>
        <div id="errorContent" class="help-block">

        </div>
      </div>
    </div>
  </div> -->
  <hr>
  <div class="row">
    <div class="col-md-12 col-table-form">
      <table class="table table-bordered" style="background: #d3fffb;" id="dt">
        <tbody>
          <?php //echo form_open('admin/guruAct/add2');?>
          <tr class="warning">
            <td style="background: #d3fffb;">NIS</td>
            <td style="background: #d3fffb;"><input id="nis" type="text" name="nis" value="<?php echo $siswa->nis; ?>" placeholder="NIS" class="form-control" required="" readonly="true"></td>
          </tr>
          <tr class="warning">
            <td style="background: #d3fffb;">Nama</td>
            <td style="background: #d3fffb;"><input id="nama" type="text" name="nama" value="<?php echo $siswa->nama; ?>" placeholder="Nama Siswa" class="form-control" required="" readonly="true"></td>
          </tr>
          <tr class="warning">
            <td style="background: #d3fffb;">Email</td>
            <td style="background: #d3fffb;"><input id="email" type="email" name="email" value="<?php echo $siswa->email; ?>" placeholder="Email" class="form-control" required="" readonly="true"></td>
          </tr>
          <tr class="warning">
            <td style="background: #d3fffb;">Kontak</td>
            <td style="background: #d3fffb;"><input id="kontak" type="text" name="kontak" value="<?php echo $siswa->kontak; ?>" placeholder="Kontak" class="form-control" required="" readonly="true"></td>
          </tr>
          <tr>
            <td style="background: #d3fffb;">Riwayat Pelanggaran</td>
            <td>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode</th>
                    <th>Pelanggaran</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if ($riwayat != NULL) {
                      $c = 1;
                      $total_poin = 0;
                      foreach ($riwayat as $value) {
                        $total_poin += $value->poin;
                  ?>
                        <tr>
                          <td><?php echo $c; ?></td>
                          <td><?php echo $value->created_date; ?></td>
                          <td><?php echo $value->kode_tatib; ?></td>
                          <td><?php echo $value->nama_pelanggaran; ?></td>
                          <td><?php echo $value->poin; ?></td>
                        </tr>
                  <?php
                        $c++;
                      }
                    }
                  ?>
                        <tr>
                          <td align="center" colspan="4"><b>Total</b></td>
                          <td><?php echo $total_poin; ?></td>
                        </tr>
                </tbody>
              </table>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
