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
        <li>
          <a href="<?php echo site_url('siswa/tugas'); ?>">Tugas</a>
        </li>
        <li class="active">
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
    <h3><?php echo $kuis['namaheader']." - ".$kuis['mapel']; ?> <small><?php echo $jumlah." Soal"; ?></small></h3>
    <br><br>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
       <table class="table table-bordered" style="color:black; background: #d3fffb;" id="tMateri">
        <tbody>
          <?php echo form_open('siswa/calculate/') ?>
          <?php $i=1;foreach($soal as $list){ ?>
          <tr>
            <td><?php echo "No. ".$i++; ?></td>
            <td><?php echo $list['soal']; ?></td> 
          </tr>
          <tr>
            <td></td>
            <td>  
              <input type="radio" name="answ<?php echo $i-1; ?>"  value="A"> A. <?php echo $list['a']; ?><br>
              <input type="radio" name="answ<?php echo $i-1; ?>"  value="B"> B. <?php echo $list['b']; ?><br>
              <input type="radio" name="answ<?php echo $i-1; ?>"  value="C"> C. <?php echo $list['c']; ?><br>
              <input type="radio" name="answ<?php echo $i-1; ?>"  value="D"> D. <?php echo $list['d']; ?><br>
            </td>
          </tr>                                  
          <?php } ?>
          <tr>
            <td><input type="hidden" name="id_hnilai" value="<?php echo $this->uri->segment(3); ?>"></td>
            <td><input type="submit" value="Submit Jawaban" class="btn btn-primary"></td>
          </tr>
          <?php echo form_close(); ?>
        </tbody>
      </table> 
      <script type="text/javascript">
        var url="<?php echo site_url();?>";
        function deletes(id){
          swal({
            title: "Yakin dengan Jawaban anda?",
            text: "Anda Tidak bisa mengulangi kuis kembali!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Submit!",
            closeOnConfirm: false
          },
          function(){
            window.location = url+"siswa/calculate/"+id;
          });
        }
      </script>                             
    </div>

  </div>


</div>
</div>
<!-- /page content -->

