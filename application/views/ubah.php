<div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Ganti Password</h2>
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
                    <?php echo form_open('home/cPass/');?>
                    <input type="hidden" name="id_kelas" value="<?php echo $this->uri->segment(4); ?>">
                    <tr class="warning">
                      <td style="background: #d3fffb;">Password Sebelumnya</td>
                      <td style="background: #d3fffb;"><input type="text" name="old" value="" placeholder="Password Sebelumnya" class="form-control" required=""></td>
                    </tr>
                    <tr class="warning">
                      <td style="background: #d3fffb;">Password Baru</td>
                      <td style="background: #d3fffb;"><input type="password" name="new1" value="" placeholder="New" class="form-control" required=""></td>
                    </tr>
                    <tr class="warning">
                      <td style="background: #d3fffb;">Re-Enter Password Baru</td>
                      <td style="background: #d3fffb;"><input type="password" name="new2" value="" placeholder="Re-Enter" class="form-control" required=""></td>
                    </tr>                           
                    <tr>
                      <td></td>
                      <td><input type="submit" value="Ganti" class="btn btn-primary"></td>
                    </tr>                        
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>