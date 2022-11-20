<body>
 <div class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span>E-Learning</span></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active">
          <a href="<?php echo site_url('siswa/'); ?>">Laporan Pembelajaran</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/mapel'); ?>">Mapel</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/materi'); ?>">Materi</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/tugas'); ?>">Tugas</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/kuis') ?>">Kuis</a>
        </li>
        <li>
          <a href="<?php echo site_url('siswa/pelanggaran') ?>">Pelanggaran</a>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('username'); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('siswa/changePass'); ?>"><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Change Pass</a></li>
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
                <div class="col-md-12">
        <h2>Grafik Tugas dan Kuis <small>Semua Mata Pelajaran</small></h2>
        <br><br>
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
                          text: '<?php echo $datasiswa['nama']; ?>',
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
                          min: 0,
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
                          text: '<?php echo $datasiswa['nama']; ?>',
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
</div>
<!-- /page content -->

