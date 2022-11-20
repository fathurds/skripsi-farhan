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
        <li>
          <a href="<?php echo site_url('siswa/kuis') ?>">Kuis</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/pelanggaran') ?>">Pelanggaran</a>
        </li>
        <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Siswa<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('siswa/changePass'); ?>"><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Change Pass</a></li>
            <li><a href="<?php echo site_url('home/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Log Out</a></li>
          </ul>
        </li>      
      </ul>
    </div>
  </div>
</div>