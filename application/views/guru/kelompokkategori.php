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
      <h3>Kelompok Kategori <small>Data Kelas <?php echo $kelas['nama']; ?></small></h3>


      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kelompok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>1</td>
              <td>
                <span style='color:green;'>Kelompok Naik</span>                        
              </td>
              <td>
              <a href="<?php echo site_url('guru/viewKelompok/'.$this->uri->segment(3).'/1');?>" title="Siswa"><button class="btn btn-success" ><span class="glyphicon glyphicon-tower" aria-hidden="true"></span>&nbsp;Lihat Siswa</button></a>                                          
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>
                <span style='color:red;'>Kelompok Turun</span>                        
              </td>
              <td>
              <a href="<?php echo site_url('guru/viewKelompok/'.$this->uri->segment(3).'/2');?>" title="Siswa"><button class="btn btn-success" ><span class="glyphicon glyphicon-tower" aria-hidden="true"></span>&nbsp;Lihat Siswa</button></a>                                          
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>
                <span style='color:green;'>Kelompok Bagus Buruk Bagus</span>                        
              </td>
              <td>
              <a href="<?php echo site_url('guru/viewKelompok/'.$this->uri->segment(3).'/3');?>" title="Siswa"><button class="btn btn-success" ><span class="glyphicon glyphicon-tower" aria-hidden="true"></span>&nbsp;Lihat Siswa</button></a>                                          
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>
                <span style='color:red;'>Kelompok Buruk Bagus Buruk</span>                        
              </td>
              <td>
              <a href="<?php echo site_url('guru/viewKelompok/'.$this->uri->segment(3).'/4');?>" title="Siswa"><button class="btn btn-success" ><span class="glyphicon glyphicon-tower" aria-hidden="true"></span>&nbsp;Lihat Siswa</button></a>                                          
              </td>
            </tr>
            <tr>
              <td>5</td>
              <td>
                <span style='color:deepskyblue;'>Kelompok Stabil</span>                        
              </td>
              <td>
              <a href="<?php echo site_url('guru/viewKelompok/'.$this->uri->segment(3).'/5');?>" title="Siswa"><button class="btn btn-success" ><span class="glyphicon glyphicon-tower" aria-hidden="true"></span>&nbsp;Lihat Siswa</button></a>                                          
              </td>
            </tr>                                                                                
          </tbody>
        </table>            
      </div>

    </div>


  </div>
</div>
<!-- /page content -->

