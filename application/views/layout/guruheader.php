<body>
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><span>Sistem Tata tertib</span></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="<?php echo site_url('guru/'); ?>">Beranda</a>
          </li>
          <li>
            <a href="<?php echo site_url('guru/pelanggaran'); ?>">Pelanggaran</a>
          </li>
          <li>
            <a href="<?php echo site_url('guru/kelompok'); ?>">Rekap</a>
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
  </body>