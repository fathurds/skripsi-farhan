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
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Mata Pelajaran</h2>
      </div>
    </div>
  </div>
</div><br>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
          <thead>
            <tr>
              <th>No.</th>
              <th>Mata Pelajaran</th>
              <th>Guru</th>
              <th>Nama Kuis</th>
              <th>Status</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;foreach($all as $list){ ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $list['mapel']; ?></td>
              <td><?php echo $list['nama']; ?></td>
              <td><?php echo $list['namaheader']; ?></td>
              <td><?php if($list['onsite']) echo "Aktif"; else echo "Tidak Aktif";?></td>
              <td><?php if($nilai[$i-2] == NULL) echo "<i style='color:red; font-style:normal;'>Belum Kuis</i>"; else echo $nilai[$i-2];?></td>
              <td>                 
                <a onclick="deletes(<?php echo $list['id']; ?>)" title="Mulai Kuis"><button class="btn btn-<?php if($nilai[$i-2] == NULL) echo "info"; else echo 'danger';?>" <?php if($nilai[$i-2] != NULL) echo "disabled=''";?>><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>&nbsp;Mulai Kuis</button></a>                      
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <script type="text/javascript">
          var url="<?php echo site_url();?>";
          function deletes(id){
            swal({
              title: "Mulai Kuis?",
              text: "Anda Hanya bisa mengikuti kuis satu kali!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ya, Mulai!",
              closeOnConfirm: false
            },
            function(){
              window.location = url+"siswa/cbt/"+id;
            });
          }
        </script>
      </div>
    </div>
  </div>
</div>