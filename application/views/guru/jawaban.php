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
 			<h3>Jawaban Tugas <small></small></h3>

 			<div class="clearfix"></div>
 			<div class="row">
 				<div class="col-md-12">
 					<table class="table table-bordered" style="color:black; background: #d3fffb;">
 						<thead>
 							<tr>
 								<th>No.</th>
 								<th>NIS</th>
 								<th>Nama Siswa</th>
 								<th>Jawaban</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $i=1;foreach($jawaban as $list){ ?>
 							<tr>
 								<td><?php echo $i++; ?></td>
 								<td><?php echo $list['nis']; ?></td>
 								<td><?php echo $list['namasiswa']; ?></td>
 								<td><?php echo $list['deskripsi']; ?></td>
 							</tr>
 							<?php } ?>
 						</tbody>
 					</table>            
 				</div>
 				
 			</div>

 			
 		</div>
 	</div>
 	<!-- /page content -->

