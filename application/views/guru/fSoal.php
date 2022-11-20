<body>
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><span>E-Learning</span></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="<?php echo site_url('guru/'); ?>">Laporan Pembelajaran</a>
          </li>
          <li>
            <a href="<?php echo site_url('guru/kategori'); ?>">Kategori</a>
          </li>
          <li class="active">
            <a href="<?php echo site_url('guru/jadwal'); ?>">Jadwal</a>
          </li>
          <li>
            <a href="<?php echo site_url('guru/kelompok'); ?>">Laporan Kelompok</a>
          </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Guru<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('guru/changePass'); ?>"><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Change Pass</a></li>
              <li><a href="<?php echo site_url('home/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- page content -->
  <div class="section">
    <div class="container">
      <h3>Form Soal</h3>


      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered" style="color:black; background: #d3fffb;" id="tMateri">
          <tbody>
            <?php if($this->uri->segment(3) == 'add') echo form_open('guru/soalAct/add2'); else echo form_open('guru/soalAct/edit2/'.$val['id']);?>
            <input type="hidden" name="id_hnilai" value="<?php if($this->uri->segment(3) == 'add') echo $this->uri->segment(4); else echo $val['id_hnilai'] ?>">
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">Soal</td>
              <td style="color:black; background: #d3fffb;">
                <textarea name="soal" class="form-control" required="" placeholder="soal"><?php if(isset($val)) echo $val['soal']; ?></textarea>
              </td>
            </tr>
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">A</td>
              <td style="color:black; background: #d3fffb;">
                <textarea name="a" class="form-control" required="" placeholder="Jawaban A"><?php if(isset($val)) echo $val['a']; ?></textarea>                   
              </td>
            </tr>
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">B</td>
              <td style="color:black; background: #d3fffb;">
                <textarea name="b" class="form-control" required="" placeholder="Jawaban B"><?php if(isset($val)) echo $val['b']; ?></textarea>                   
              </td>
            </tr>
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">C</td>
              <td style="color:black; background: #d3fffb;">
                <textarea name="c" class="form-control" required="" placeholder="Jawaban C"><?php if(isset($val)) echo $val['c']; ?></textarea>                   
              </td>
            </tr>
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">D</td>
              <td style="color:black; background: #d3fffb;">
                <textarea name="d" class="form-control" required="" placeholder="Jawaban D"><?php if(isset($val)) echo $val['d']; ?></textarea>                   
              </td>
            </tr>
            <tr class="warning">
            <td style="color:black; background: #d3fffb;">Jawaban</td>
              <td style="color:black; background: #d3fffb;">

                <select name="jawaban" class="form-control" required="">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </td>
            </tr>                                                                                
          </tr>   
          <td style="color:black; background: #d3fffb;"></td>
          <td style="color:black; background: #d3fffb;"><input type="submit" value="Submit" class="btn btn-primary"></td>
        </tr>                        
      </tbody>
    </table>            
  </div>

</div>


</div>
</div>
<!-- /page content -->

