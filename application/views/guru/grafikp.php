<body>
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><span>E-Learning</span></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="<?php echo site_url('guru/'); ?>">Laporan Pembelajaran</a>
          </li>
          <li>
            <a href="<?php echo site_url('guru/kategori'); ?>">Kategori</a>
          </li>
          <li>
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
      <div class="row">
        <div class="x_title">
          <h2>Grafik Kuis <?php echo $siswa['nama']; ?></h2>
          <br>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-5">
          <div class="chart-container" id="chart1" style="height: 500px;">    
            <!-- jQuery -->
            <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>                
            <script src="<?php echo base_url('/assets/js/code/highcharts.js'); ?>"></script>
            <script src="<?php echo base_url('/assets/js/code/highcharts-3d.js') ?>"></script>
            <script src="<?php echo base_url('/assets/js/code/exporting.js') ?>"></script>
          </div>              

          <script>
            $(function () {
              Highcharts.chart('chart1', {
                title: {
                  text: 'Grafik Kuis',
                          x: -20 //center
                        },
                        subtitle: {
                          text: '<?php echo $siswa['nama']; ?>',
                          x: -20
                        },
                        xAxis: {
                          categories: <?php echo $axis; ?>
                        },
                        yAxis: {
                          title: {
                            text: 'Nilai'
                          },
                          plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                          }],
                          minPadding: 0,
                          maxPadding: 0,
                          min: 0,
                          minRange: 0.1,
                          max: 100
                        },

                        legend: {
                          layout: 'vertical',
                          align: 'right',
                          verticalAlign: 'middle',
                          borderWidth: 0
                        },
                        series: [{
                          name: 'Nilai Kuis',
                          data: <?php echo $grafik; ?>
                        }]
                      });
});</script>
</div>              
<div class="col-md-5 col-md-offset-1">
  <div class="chart-container" id="chart2" style="height: 500px">    
    <!-- jQuery -->
  </div>              

  <script>
    $(function () {
      Highcharts.chart('chart2', {
        title: {
          text: 'Grafik Tugas',
                          x: -20 //center
                        },
                        subtitle: {
                          text: '<?php echo $siswa['nama']; ?>',
                          x: -20
                        },
                        xAxis: {
                          categories: <?php echo $axis2; ?> 
                        },
                        yAxis: {
                          title: {
                            text: 'Nilai'
                          },
                          plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                          }],
                          min:0,
                          max:100
                        },

                        legend: {
                          layout: 'vertical',
                          align: 'right',
                          verticalAlign: 'middle',
                          borderWidth: 0
                        },
                        series: [{
                          name: 'Nilai Tugas',
                          data: <?php echo $grafik2; ?>
                        }]
                      });
});</script>
</div>
</div>
</div>
</div>
<!-- /page content -->

