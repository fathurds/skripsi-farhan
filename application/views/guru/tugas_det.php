        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detail Tugas</h3>
              </div>

            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                 <table class="table table-bordered" style="color:black;" id="tMateri">
                  <tbody>
                    <tr class="warning">
                      <td>Judul</td>
                      <td><?php echo $tugas['judul']; ?></td> 
                    </tr class="warning">
                    <tr class="warning">
                      <td>Soal</td>
                      <td><?php echo $tugas['deskripsi']; ?> </td> 
                    </tr>
                    <tr class="warning">
                      <td>File Soal</td>
                      <td><a href="<?php echo base_url('uploads/tugas/'.$tugas['link']); ?>" title="" target="_blank"><?php echo $tugas['link']; ?></a></td> 
                    </tr>
                    <tr class="warning">
                      <td>Waktu</td>
                      <td><?php echo "Mulai : ".$tugas['awal']."<br/>Akhir : ".$tugas['deadline']; ?></td> 
                    </tr>                      
                    </tbody>
                </table>            
              </div>
                 
            </div>

            
          </div>
        </div>
        <!-- /page content -->

