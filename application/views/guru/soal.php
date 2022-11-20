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
      <h3>Data Soal Kuis <small> SD Labschool UPI</small></h3>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo site_url('guru/soalAct/add/'.$this->uri->segment(3));?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Soal</button></a>                          
          <br><br>
          <table class="table table-bordered" style="color:black;" id="dt">
            <thead>
              <tr>
                <th>No.</th>
                <th>Soal</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;foreach($soal as $list){ ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $list['soal']; ?></td>
                <td <?php if($list['jawaban'] == 'A') echo "class='success'";  ?>><?php echo $list['a']; ?></td>
                <td <?php if($list['jawaban'] == 'B') echo "class='success'";  ?>><?php echo $list['b']; ?></td>
                <td <?php if($list['jawaban'] == 'C') echo "class='success'";  ?>><?php echo $list['c']; ?></td>
                <td <?php if($list['jawaban'] == 'D') echo "class='success'";  ?>><?php echo $list['d']; ?></td>
                <td>     
                  <a href="<?php echo site_url('guru/soalAct/edit/'.$list['id']); ?>" title="Tugas"><button class="btn btn-warning" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>                                              
                  <a onclick="deletes(<?php echo $list['id']; ?>)" title="Tugas"><button class="btn btn-danger" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>                      
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <script type="text/javascript">
            var url="<?php echo site_url();?>";
            function deletes(id){
              swal({
                title: "Are You sure?",
                text: "System Will delete this row!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Delete it!",
                closeOnConfirm: false
              },
              function(){
                window.location = url+"guru/soalAct/del/"+id;
              });
            }
          </script>                                
        </div>
      </div>


    </div>
  </div>
  <!-- /page content -->

