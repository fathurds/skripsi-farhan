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
      <h3>Upload Tugas</h3>


      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered" style="color:black; background: #d3fffb;" id="tMateri">
          <tbody>
            <?php echo form_open_multipart('guru/tugasAct/add2');?>
            <input type="hidden" name="id_kelas" value="<?php echo $this->uri->segment(4); ?>">
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">Judul Tugas</td>
              <td style="color:black; background: #d3fffb;"><input type="text" name="judul" value="" placeholder="Nama Materi" class="form-control" required=""></td>
            </tr>
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">Waktu</td>
              <td style="color:black; background: #d3fffb;">Mulai: <input type="datetime-local" name="awal" value="" placeholder="" class="form-control" required="">&nbsp;&nbsp;Akhir:<input type="datetime-local" name="deadline" value="" placeholder="" class="form-control" required=""></td>
            </tr>

            <tr class="warning">
            <td style="color:black; background: #d3fffb;">Deskripsi</td>
              <td style="color:black; background: #d3fffb;"><textarea name="deskripsi" class="form-control" rows="7"></textarea></td>
            </tr>                    
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">File Tugas</td>
              <td style="color:black; background: #d3fffb;"><input type="file" name="link" value="" placeholder=""> <u style="font-weight: 500; "></u></td>
            </tr>        
            <tr>
            <td style="color:black; background: #d3fffb;"></td>
              <td style="color:black; background: #d3fffb;"><input type="submit" value="Upload" class="btn btn-primary"></td>
            </tr>                        
          </tbody>
        </table>            
      </div>

    </div>


  </div>
</div>
<!-- /page content -->

