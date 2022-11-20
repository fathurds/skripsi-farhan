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
        <h3>Set Nilai </h3>
    <br><br>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered" style="color:black; background: #d3fffb;" id="tMateri">
          <tbody>
            <?php echo form_open('guru/set');?>
            <input type="hidden" name="id" value="<?php echo $mapel['id']; ?>">
            <tr class="warning">
              <td style="color:black; background: #d3fffb;">Nama Mata Pelajaran</td>
              <td style="color:black; background: #d3fffb;"><input type="text" name="nama" value="<?php echo $mapel['nama']; ?>" placeholder="Nama Mata Pelajran" class="form-control" required="" readonly></td>
            </tr>
            <tr class="warning">
              <td style="color:black; background: #d3fffb;">Batas KKM 1</td>
              <td style="color:black; background: #d3fffb;"><input type="number" name="kkm1" value="<?php echo $mapel['kkm1']; ?>" placeholder=""></td>
            </tr>                    
            <tr class="warning">
              <td style="color:black; background: #d3fffb;">Batas KKM 2</td>
              <td style="color:black; background: #d3fffb;"><input type="number" name="kkm2" value="<?php echo $mapel['kkm2']; ?>" placeholder=""></td>
            </tr>          
            <tr>
              <td style="color:black; background: #d3fffb;"></td>
              <td style="color:black; background: #d3fffb;"><input type="submit" value="Submit" class="btn btn-primary"></td>
            </tr>                        
          </tbody>
        </table>            
      </div>

    </div>


  </div>
</div>
<!-- /page content -->

