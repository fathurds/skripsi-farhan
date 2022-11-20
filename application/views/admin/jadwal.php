

          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Data Jadwal</h2>
                  <a href="<?php echo site_url('admin/jadwalAct/add/'.$this->uri->segment(3));?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Jadwal</button></a>
                  
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
                        <th>Nama</th>
                        <th>Hari / Jam</th>
                        <!-- <th>Kontak</th> -->
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;foreach($jadwal as $list){ ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $list['mapel']; ?></td>
                        <td><?php echo $list['nama']; ?></td>
                        <td><?php echo $list['hari'].' ; '.$list['jam']; ?></td>
                        <td>
                          <a href="<?php echo site_url('admin/JadwalAct/edit/').$list['id'];?>" title="Edit"><button class="btn btn-warning" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                          <a onclick="deletes(<?php echo $list['idj']; ?>)" title="Tugas"><button class="btn btn-danger" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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
                        window.location = url+"admin/jadwalAct/del/"+id;
                      });
                    }
                  </script>
                </div>
              </div>
            </div>
          </div>
