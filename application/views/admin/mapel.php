
          <!-- page content -->
          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Daftar Tata Tertib</h2>
                  <a href="<?php echo site_url('admin/sanksiAct/add');?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Tata Tertib</button></a>
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
                        <th>Daftar Tata tertib</th>
                        <th>Kode </th>
                        <th>Poin</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;foreach($tatib as $list){ ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $list['nama']; ?></td>
                        <td><?php echo $list['kode']; ?></td>
                        <td><?php echo $list['poin']; ?></td>
                        <td>
                          <a href="<?php echo site_url('admin/tatibAct/edit/').$list['id'];?>" title="Edit"><button class="btn btn-warning" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
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
                        window.location = url+"admin/tatibAct/del/"+id;
                      });
                    }
                  </script>
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
