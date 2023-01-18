      

          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Data Siswa</h2>
                  <a href="<?php echo site_url('admin/siswaAct/add/'.$this->uri->segment(3));?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Siswa</button></a>
                  <a href="<?php echo site_url('admin/siswaAct/add3/'.$this->uri->segment(3));?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>&nbsp;Upload Excel</button></a>
                  <!-- <div class="row">
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


                  </div> -->
                </div>
              </div>
            </div>
          </div><br>
          <div class="section">
            <div class="container">
              <?php if($this->session->flashdata('msg')): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= $this->session->flashdata('msg') ?>
              </div>
              <?php endif; ?>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kontak</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;foreach($siswa as $list){ ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $list['nis']; ?></td>
                        <td><?php echo $list['nama']; ?></td>
                        <td><?php echo $list['email']; ?></td>
                        <td><?php echo $list['kontak']; ?></td>
                        <td>
                          <a href="<?php echo site_url('admin/SiswaAct/edit/').$list['id'];?>" title="Edit"><button class="btn btn-warning" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
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
                        title: "Are you sure?",
                        text: "You will not be able to recover this data again!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                      },
                      function(){
                        window.location = url+"admin/siswaAct/del/"+id;
                      });
                    }
                  </script> 
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="section">
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
          </div> -->