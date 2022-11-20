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
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Tugas</h2>
        <div class="row">
          <div class="col-sm-2">
            <h4>Show 
              <select>
                <option nama="" value="">10</option>
                <option nama="" value="">25</option>
                <option nama="" value="">50</option>
                <option nama="" value="">100</option>
              </select>
              entries
            </h4>

          </div>
          <div class="col-sm-7"></div>
          <div class="col-sm-1">
            <h4>Search :</h4>
          </div>
          <div class="col-sm-2">
            <input type="text" class="form-control">
          </div>

          
        </div>
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
              <th>Judul</th>
              <th>Status</th>
              <th>Terkirim</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;foreach($tugas as $list){ ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><a href="<?php echo site_url('siswa/tugas_det/'.$list['matapelajaran'].'/'.$list['idt']); ?>" title="" style=""><?php echo $list['matapelajaran']; ?></a></td>
              <td><?php echo $list['judul']; ?></td>
              <td><?php if($list['status'] == 1) 
                echo "<span class='glyphicon glyphicon glyphicon-eye-open btn btn-success' aria-hidden='true' readonly></span>"; 
                else echo "<span class='glyphicon glyphicon glyphicon-eye-close btn btn-danger' aria-hidden='true' ></span>"; ?></td>
                <td><?php if($list['terkirim']) 
                  echo "<span class='glyphicon glyphicon glyphicon-ok btn btn-success' aria-hidden='true' readonly></span>"; 
                  else echo "<span class='glyphicon glyphicon glyphicon-remove btn btn-danger' aria-hidden='true' ></span>"; ?></td>  
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            Showing 1 to 10
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="pagination navbar-right">
              <li>
                <a href="#">Prev</a>
              </li>
              <li>
                <a href="#">1</a>
              </li>
              <li>
                <a href="#">Next</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>