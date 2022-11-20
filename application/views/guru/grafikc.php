
  <!-- page content -->
  <div class="section">
    <div class="container">
          <h2>Grafik Kuis Siswa berdasarkan Kelas</h2>
          
        <div class="col-md-6">
          <h2>Grafik Siswa Berdasarkan Individu</h2>
          <table class="table table-bordered" id="dt" style="color:black; background: #d3fffb;">
            <thead>
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;foreach($daftar as $list){ ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $list['nis']; ?></td>
                <td><?php echo $list['nama']; ?></td>
                <td><a href="<?php echo site_url('guru/grafikp/'.$list['id']);?>" title="Materi"><button class="btn btn-primary" ><span class="glyphicon glyphicon-line-chart" aria-hidden="true"></span>&nbsp;Lihat Grafik</button></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <div class="chart-container" id="chart1" style="height: 500px">    
            <!-- jQuery -->
            <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>                
            <script src="<?php echo base_url('/assets/js/code/highcharts.js'); ?>"></script>
            <script src="<?php echo base_url('/assets/js/code/highcharts-3d.js') ?>"></script>
            <script src="<?php echo base_url('/assets/js/code/exporting.js') ?>"></script>
          </div>              

          <script>
            $(function () {
              Highcharts.chart('chart1', {
                chart: {
                  type: 'column',
                  options3d: {
                    enabled: true,
                    alpha: 5,
                    beta: 10,
                    depth: 70
                  }
                },
                title: {
                  text: 'Grafik Kategori Siswa Kelas',
                          x: -20 //center
                        },
                        subtitle: {
                          text: '',
                          x: -20
                        },
                        xAxis: {
                          categories: ['Rendah','Sedang','Tinggi']
                        },
                        yAxis: {
                          title: {
                            text: 'Jumlah Siswa'
                          },
                          plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                          }]
                        },

                        legend: {
                          layout: 'vertical',
                          align: 'right',
                          verticalAlign: 'middle',
                          borderWidth: 0
                        },
                        series: <?php echo $series; ?>
                      });
});</script>
</div>
</div>
</div>
<!-- /page content -->

