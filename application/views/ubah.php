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
                  <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-<?= $this->session->flashdata('msg')['alert'] ?> alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <?= $this->session->flashdata('msg')['message'] ?>
                    </div>
                  <?php endif; ?>
                  <table class="table table-bordered" style="background: #d3fffb;" id="dt">
                    <tbody>
                    <?php echo form_open('home/cPass/');?>
                    <input type="hidden" name="id_kelas" value="<?php echo $this->uri->segment(4); ?>">
                    <tr class="warning">
                      <td style="background: #d3fffb;">Password Sebelumnya</td>
                      <td style="background: #d3fffb;"><input type="password" name="old" value="" placeholder="Password Sebelumnya" class="form-control" required=""></td>
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