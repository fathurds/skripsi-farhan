        
          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Form Kelas</h2>
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
                    <?php echo form_open('admin/kelasAct/edit2');?>
                    <tr class="warning">
                      <td style="background: #d3fffb;">Kelas</td>
                      <td style="background: #d3fffb;"><input type="text" name="nama" value="<?php echo $edit['nama']; ?>" placeholder="Nama Kelas" class="form-control" required=""></td>
                    </tr>
                    <tr class="warning">
                      <td style="background: #d3fffb;">Tingkat</td>
                      <td style="background: #d3fffb;">
                        <select name="tingkat" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                        </select>
                      </td>
                    </tr>                     
                    <tr class="warning">
                      <td style="background: #d3fffb;">Deskripsi</td>
                      <td style="background: #d3fffb;"><input type="text" name="deskripsi" value="<?php echo $edit['deskripsi']; ?>" placeholder="Deksripsi" class="form-control" required=""></td>
                    </tr> 
                    <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
                     
                    <tr>
                      <td style="background: #d3fffb;"></td>
                      <td style="background: #d3fffb;"><input type="submit" value="Edit" class="btn btn-primary"></td>
                    </tr>                        
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

