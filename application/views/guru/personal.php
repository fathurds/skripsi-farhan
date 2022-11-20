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
      <h3>Kirim Pesan <?php echo $siswa['nama']; ?></h3>


      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered" style="color:black; background: #d3fffb;" id="tMateri">
          <tbody>
            <?php echo form_open('guru/sendPersonal');?>
            <tr class="success">
            <td style="color:black; background: #d3fffb;">To</td>
              <td style="color:black; background: #d3fffb;"><?php echo $siswa['nama']." (".$siswa['email'].")"; ?></td>
            </tr>
            <input type="hidden" name="email" value="<?php echo $siswa['email']; ?>">
            <tr class="success">
            <td style="color:black; background: #d3fffb;">Isi Pesan</td>
              <td style="color:black; background: #d3fffb;"><textarea name="mess" class="form-control" rows="6"></textarea></td>
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

