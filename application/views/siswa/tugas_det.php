<body>
 <div class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span>E-Learning</span></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo site_url('siswa/'); ?>">Laporan Pembelajaran</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/mapel'); ?>">Mapel</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/materi'); ?>">Materi</a>
        </li>
        <li class="active">
          <a href="<?php echo site_url('siswa/tugas'); ?>">Tugas</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/kuis') ?>">Kuis</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/pelanggaran') ?>">Pelanggaran</a>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Siswa<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('siswa/changePass'); ?>"><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Change Pass</a></li>
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
      <h3>Detail Tugas <small><?php echo $mapel; ?></small></h3><br>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
       <table class="table table-bordered" style="color:black;" id="tMateri">
        <tbody>
          <tr class="warning">
            <td>Judul</td>
            <td><?php echo $tugas['judul']; ?></td> 
          </tr class="warning">
          <tr class="warning">
            <td>Soal</td>
            <td><?php echo $tugas['deskripsi']; ?> </td>
            <tr class="warning">
              <td>File Soal</td>
              <td><a href="<?php echo base_url('uploads/tugas/'.$tugas['link']); ?>" title="" target="_blank"><?php echo $tugas['link']; ?></a></td> 
            </tr>
            <tr class="warning">
              <td>Waktu</td>
              <td><?php echo "Mulai : ".$tugas['awal']."<br/>Akhir : ".$tugas['deadline']; ?></td> 
            </tr>
            <?php if(isset($jawaban)) echo form_open_multipart('siswa/tugasAct/edit/'.$jawaban['id']); else echo form_open_multipart('siswa/tugasAct/add'); ?>
            <input type="hidden" name="id_tugas" value="<?php echo $tugas['id']; ?>">
            <input type="hidden" name="id_siswa" value="<?php echo $_SESSION['id']; ?>">
            <tr>
              <td>Isi jawaban</td>
              <td><textarea name="deskripsi" class="form-control" rows="6" cols="30"><?php if(isset($jawaban)) echo $jawaban['deskripsi']; ?></textarea></td>
            </tr>
            <tr>
              <td>File jawaban</td>
              <td><input type="file" name="link" value="" placeholder=""> <u style="font-weight: 500; "><?php echo $jawaban['link']; ?></u></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" value="<?php if($tugas['status'] == 1) 
                echo "Kirim"; 
                else echo "Verboden"; ?>" class="btn btn-<?php if($tugas['status'] == 1) 
                echo "success"; 
                else echo "danger"; ?>"" <?php if($tugas['status'] == 0) 
                echo "disabled=''"; 
                ; ?>></td>
              </tr>                                      
            </tbody>
          </table>            
        </div>

      </div>


    </div>
  </div>
  <!-- /page content -->

