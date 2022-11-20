<body>
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><span>E-Learning</span></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="<?php echo site_url('guru/'); ?>">Laporan Pembelajaran</a>
          </li>
          <li>
            <a href="<?php echo site_url('guru/kategori'); ?>">Kategori</a>
          </li>
          <li>
            <a href="<?php echo site_url('guru/jadwal'); ?>">Jadwal</a>
          </li>
          <li class="active">
            <a href="<?php echo site_url('guru/kelompok'); ?>">Laporan Kelompok</a>
          </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Guru<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('guru/changePass'); ?>"><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Change Pass</a></li>
              <li><a href="<?php echo site_url('home/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- page content -->
  <div class="section">
    <div class="container">
      <h3>Kelompok <?php if($cat==1) echo "Grafik Naik"; else if($cat==2) echo "Grafik Turun"; else if($cat==3) echo "Grafik Naik Turun"; else if($cat==4) echo "Grafik Turun Naik Turun"; else echo "Grafik Stabil"; ?> <small>Data Kelas <?php echo $kelas['nama']; ?></small></h3>


      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo site_url('guru/excelKelompok/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>" title="Export"><button class="btn btn-primary" ><span class=" glyphicon glyphicon-upload" aria-hidden="true"></span>&nbsp;Export to Excel</button></a>                 
          <br><br>
          <table class="table table-bordered" style="color:black;" id="dt">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>Kelompok</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;foreach($view as $list){ 
                if($cat == 5 && $list['kategori'] != 1 && $list['kategori'] != 2 && $list['kategori'] != 3 && $list['kategori'] != 4 && $list['kategori'] != 0){
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $list['nama']; ?></td>
                    <td>
                      <?php 
                      if($list['kategori'] == 5){
                        echo "<span style='color:green;'>Grafik Stabil Tinggi</span>";
                      }else if($list['kategori'] == 7){
                        echo "<span style='color:red;'>Grafik Stabil Rendah</span>";
                      }else if($list['kategori'] == 6){
                        echo "<span style='color:deepskyblue;'>Grafik Stabil Sedang</span>";
                      }

                      ?>

                    </td>
                    <td>
                      <a href="<?php echo site_url('guru/grafikp/'.$list['id']);?>" title="Grafik"><button class="btn btn-success" ><span class=" glyphicon glyphicon-line-chart" aria-hidden="true"></span>&nbsp;Lihat Grafik</button></a>
                      <a href="<?php echo site_url('guru/personal/'.$list['id']);?>" title="Grafik"><button class="btn btn-warning" ><span class="  glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;Kirim Pesan</button></a>                                                                
                    </td>
                  </tr>
                  <?php                        

                }else{
                 if($list['kategori'] == $cat){
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $list['nama']; ?></td>
                    <td>
                      <?php 
                      if($list['kategori'] == 0){
                        echo "<span style='color:blue;'>Belum ter-identifikasi</span>";
                      }else if($list['kategori'] == 1){
                        echo "<span style='color:green;'>Grafik Naik</span>";
                      }else if($list['kategori'] == 2){
                        echo "<span style='color:red;'>Grafik Turun</span>";
                      }else if($list['kategori'] == 3){
                        echo "<span style='color:green;'>Grafik Bagus Buruk Bagus</span>";
                      }else if($list['kategori'] == 4){
                        echo "<span style='color:red;'>Grafik Buruk Bagus Buruk</span>";
                      }else if($list['kategori'] == 5){
                        echo "<span style='color:green;'>Grafik Stabil Tinggi</span>";
                      }

                      ?>

                    </td>
                    <td>
                      <a href="<?php echo site_url('guru/grafikp/'.$list['id']);?>" title="Grafik"><button class="btn btn-success" ><span class=" glyphicon glyphicon-line-chart" aria-hidden="true"></span>&nbsp;Lihat Grafik</button></a>
                      <a href="<?php echo site_url('guru/personal/'.$list['id']);?>" title="Grafik"><button class="btn btn-warning" ><span class="  glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;Kirim Pesan</button></a>                                                                
                    </td>
                  </tr>
                  <?php }}
                } ?>
              </tbody>
            </table>            
          </div>

        </div>


      </div>
    </div>
    <!-- /page content -->

