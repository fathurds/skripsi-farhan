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
          <li class="active">
            <a href="<?php echo site_url('guru/kategori'); ?>">Kategori</a>
          </li>
          <li>
            <a href="<?php echo site_url('guru/jadwal'); ?>">Jadwal</a>
          </li>
          <li>
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
      <h3>Kategori Nilai<small></small></h3>
      <br><br>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered" style="color:black;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kategori</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td> 
              <td>Rendah</td> 
              <td>0 - <?php echo $mapel['kkm1']; ?></td> 
              <td><a href="<?php echo site_url('guru/setNilai/');?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Set Nilai</button></a>
                <a href="<?php echo site_url('guru/setMessage/');?>" title="Materi"><button class="btn btn-success" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;Set Email</button></a>  
              </td>
            </tr>
            <tr>
              <td>2</td> 
              <td>Sedang</td> 
              <td><?php echo $mapel['kkm1']." - ".$mapel['kkm2']; ?></td> 
              <td>
                <a href="<?php echo site_url('guru/setNilai/');?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Set Nilai</button></a> 
                <a href="<?php echo site_url('guru/setMessage/');?>" title="Materi"><button class="btn btn-success" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;Set Email</button></a>  
              </td>
            </tr>
            <tr>
              <td>3</td> 
              <td>Tinggi</td> 
              <td><?php echo $mapel['kkm2']; ?> - 100</td> 
              <td>
                <a href="<?php echo site_url('guru/setNilai/');?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Set Nilai</button></a>
                <a href="<?php echo site_url('guru/setMessage/');?>" title="Materi"><button class="btn btn-success" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;Set Email</button></a>                      
              </td>
            </tr>
          </tbody>
        </table>            
      </div>

    </div>


  </div>
</div>
<!-- /page content -->

