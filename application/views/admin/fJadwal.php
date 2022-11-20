       

          <div class="section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Form Jadwal</h2>
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
                      <?php echo form_open('admin/jadwalAct/add2');?>
                      <tr class="warning">
                        <td style="background: #d3fffb;">Hari</td>
                        <td style="background: #d3fffb;">
                          <select name="hari" class="form-control">
                           <option value="Senin">Senin</option>
                           <option value="Selasa">Selasa</option>
                           <option value="Rabu">Rabu</option>
                           <option value="Kamis">Kamis</option>
                           <option value="Jumat">Jumat</option>
                           <option value="Sabtu">Sabtu</option>
                         </select>                      
                       </td>
                     </tr>
                     <tr class="warning">
                       <td style="background: #d3fffb;">Jam</td>
                       <td style="background: #d3fffb;"><input type="text" name="jam" value="" placeholder="Jam" class="form-control" required=""></td>
                     </tr>                   
                     <tr class="warning">
                      <td style="background: #d3fffb;">Guru</td>
                      <td style="background: #d3fffb;">
                        <select name="id_guru" class="form-control">
                          <?php foreach ($guru as $hm) {  
                           ?>
                           <option value="<?php echo $hm['id']; ?>"><?php echo $hm['matapelajaran']." - ".$hm['nama']; ?></option>
                           <?php } ?>
                         </select>
                       </td>
                     </tr>
                     <input type="hidden" name="id_kelas" value="<?php echo $kelas['id']; ?>">
                     <tr class="warning">
                      <td style="background: #d3fffb;">Kelas</td>
                      <td style="background: #d3fffb;"><input type="text" value="<?php echo $kelas['nama']; ?>" placeholder="" class="form-control" required="" readonly=""></td>
                    </tr>                                           
                    <tr>
                      <td style="background: #d3fffb;"></td>
                      <td style="background: #d3fffb;"><input type="submit" value="Tambah" class="btn btn-primary"></td>
                    </tr>                        
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

