

          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Form Excel Siswa</h2>
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
                    <?php echo form_open_multipart('admin/siswaAct/add4');?>
                    <input type="hidden" name="id_kelas" value="<?php echo $kelas['id']; ?>">
                    <tr class="warning">
                      <td style="background: #d3fffb;">Format File</td>
                      <td style="background: #d3fffb;"><a href="<?php echo base_url('uploads/excel/FORMAT_NEW_SISWA.xlsx'); ?>" target="_blank" title="Format">Format Excel</a></td>
                    </tr>                     
                    <tr class="warning">
                      <td style="background: #d3fffb;">Excel</td>
                      <td style="background: #d3fffb;">
                      <input type="file" name="excel" value="" placeholder="">
                      </td>
                    </tr>                                           
                    <tr>
                      <td style="background: #d3fffb;"></td>
                      <td style="background: #d3fffb;"><input type="submit" value="Upload" class="btn btn-primary"></td>
                    </tr>                        
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

