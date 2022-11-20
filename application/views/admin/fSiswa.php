      

          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Form Siswa</h2>
                </div>
              </div>
            </div>
          </div><br>
          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered" style="background: #d3fffb;" id="dt">
                    <tbody>
                    <?php echo form_open('admin/siswaAct/add2');?>
                    <tr class="warning">
                      <td style="background: #d3fffb;">NIS</td>
                      <td style="background: #d3fffb;"><input type="text" name="nis" value="" placeholder="NIS" class="form-control" required=""></td>
                    </tr> 
                    <tr class="warning">
                      <td style="background: #d3fffb;">Nama</td>
                      <td style="background: #d3fffb;"><input type="text" name="nama" value="" placeholder="Nama Siswa" class="form-control" required=""></td>
                    </tr>
                    <tr class="warning">
                      <td style="background: #d3fffb;">Email</td>
                      <td style="background: #d3fffb;"><input type="email" name="email" value="" placeholder="Email" class="form-control" required=""></td>
                    </tr>                   
                    <tr class="warning">
                      <td style="background: #d3fffb;">Kontak</td>
                      <td style="background: #d3fffb;"><input type="text" name="kontak" value="" placeholder="Kontak" class="form-control" required=""></td>
                    </tr>
                    <input type="hidden" name="id_kelas" value="<?php echo $kelas['id']; ?>">
                    <tr class="warning">
                      <td style="background: #d3fffb;">Kelas</td>
                      <td style="background: #d3fffb;"><input type="text" value="<?php echo $kelas['nama']; ?>" placeholder="" class="form-control" required="" readonly=""></td>
                    </tr>                                           
                    <tr>
                      <td></td>
                      <td><input type="submit" value="Upload" class="btn btn-primary"></td>
                    </tr>                        
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

