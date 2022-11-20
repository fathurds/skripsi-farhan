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
                <h3>Tugas Sekolah <small>Kelas <?php echo $kelas['nama']; ?></small></h3>
     

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                  <a href="<?php echo site_url('guru/tugasAct/add/'.$this->uri->segment(3));?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Tugas</button></a>              
                 <br><br>
                 <table class="table table-bordered" style="color:black; background: #d3fffb;" id="tMateri">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Judul</th>
                      <!-- <th>Deskripsi</th> -->
                      <!-- <th>Link Soal</th> -->
                      <th>Waktu</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;foreach($tugas as $list){ ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><a href="<?php echo site_url('guru/jawaban/'.$list['id']); ?>" title=""><?php echo $list['judul']; ?></a></td>
                      <!-- <td><?php echo $list['deskripsi']; ?></td> -->
                      <!-- <td><a href="<?php echo base_url('uploads/tugas/'.$list['link']);?>" target="_blank" title=""><?php echo $list['link']; ?></a></td> -->
                      <td><?php echo "<span style='color:green'>".$list['awal']."</span> / <span style='color:red;'>".$list['deadline']."</span>"; ?></td>
                      <td><?php if($list['status'] == 1) 
                      echo "<span class='glyphicon glyphicon glyphicon-eye-open btn btn-success' aria-hidden='true' readonly></span>"; 
                      else echo "<span class='glyphicon glyphicon glyphicon-eye-close btn btn-danger' aria-hidden='true' ></span>"; ?></td>
                      <td>
                <!--       <a href="<?php echo base_url('uploads/tugas/'.$list['link']);?>" onclick="deletes(" title=""><button class="btn btn-warning" ><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></button></a> -->
                      <a onclick="deletes(<?php echo $list['id']; ?>)" title=""><button class="btn btn-danger" ><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button></a>
                      </td>                      
                    </tr>
                    <?php } ?>
                  </tbody>
              <script type="text/javascript">
                  var url="<?php echo site_url();?>";
                  function deletes(id){
                  swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this data again!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                  },
                  function(){
                      window.location = url+"guru/tugasAct/del/"+id;
                  });
                  }
              </script>                     
                </table>            
              </div>
                 
            </div>

            
          </div>
        </div>
        <!-- /page content -->

