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
          <li class="active">
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
      <h3>Upload Materi </h3>
      <br><br>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered" style="color:black;" id="tMateri">
          <tbody>
            <?php echo form_open_multipart('guru/materiAct/add2');?>
            <input type="hidden" name="id_kelas" value="<?php echo $this->uri->segment(4); ?>">
            <tr class="warning">
              <td>Nama Materi</td>
              <td><input type="text" name="nama" value="" placeholder="Nama Materi" class="form-control" required=""></td>
            </tr>
            <tr class="warning">
              <td>Deskripsi</td>
              <td><textarea name="deskripsi" class="form-control" rows="7"></textarea></td>
            </tr>                    
            <tr class="warning">
              <td>File Materi</td>
              <td><input type="file" name="link" value="" placeholder=""> <u style="font-weight: 500; "></u></td>
            </tr>        
            <tr>
              <td></td>
              <td><input type="submit" value="Upload" class="btn btn-primary"></td>
            </tr>                        
          </tbody>
        </table>            
      </div>

    </div>


  </div>
</div>
<!-- /page content -->

