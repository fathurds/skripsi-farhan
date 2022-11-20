<?php
/* @var $this PemesananController */

$this->breadcrumbs=array(
	'Pengiriman',
);
?>
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Pengiriman</h3>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Pesanan
		</div>
		<div>
			<br>
			<a href="<?=Yii::app()->createUrl("gudang/ruteTerdekat")?>" class="btn btn-info">Lihat Prioritas Pengiriman berdasarkan jarak terdekat</a>
			<?php
			$this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table-pesanan',
				'dataProvider'=>$providerPesanan,
				'ajaxUpdate'=>true,
				'columns'=>array(
					'no_order',
					array(
						'header'=>'Pelanggan',
						'value'=>'$data->idPelanggan->nama'
					),
					'tgl_pesan',
					'tgl_kirim',
					array(
						'header' => 'Status Verifikasi',
						'value' => function($data){
								if($data->is_verifikasi == 0){

									return "<span class='label label-default label-white middle'>Belum Verifikasi</span>";
									}else{
									return "<span class='label label-success label-white middle'>Telah Diverifikasi</span>";
									}
							},
						'type'=>'html'
					),
					array(
						'header'=>'Aksi',
						'class' => 'ButtonColumn',
						'template' => '<div class="btn-group">{ubah}{dikirim}</div>',
						'evaluateID'=>true,
						'htmlOptions' => ['class'=>'col-sm-2'],
						'buttons'=>array(
							'ubah'=>array(
								'label' => 'Siap Kirim',
								'visible'=>'$data->is_verifikasi == "1"',
								// 'url' => 'Yii::app()->createUrl("gudang/pengiriman/kirim",array("id"=>$data->id_pesanan))',
								'options' => array(
									'id'=> 'btnKirim',
									'class' => 'btn btn-xs btn-info gridKirim',
									'data-toggle'=>"modal",
									'data-target'=>"#myModal",
									'data-id'=>'$data->id_pesanan',
									// 'data-href'=>getData?$data->id_pesanan'
								)
							),
							'dikirim'=>array(
								'label' => 'Telah Dikirim',
								'visible'=>'$data->is_verifikasi == "2"',
								// 'url'=>'#',
								'options' => array(
									'id'=> 'telahKirim',
									'disabled'=>true,
									'class' => 'btn btn-xs btn-success',
								)
							)
						)
					// 	'value' => '
					// 		CHtml::link("Detail",
					// 			array(
					// 				"pemesanan/detail",
					// 				"id"=>"$data->id_pesanan"
					// 			),
					// 			array(
					// 				// "onclick"=>"js:removecartitem(".
					// 				// 								$data["id"].",".
					// 				// 								$data["id_part"].");",
					// 				"class" => "btn btn-info btn-xs",
					// 			)
					// 		);',
					// 	'type' => 'raw',
					)
				),
			));
			?>
		</div>
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Pengiriman
		</div>
		<div>
			<?php
				$this->widget('HarapanBaruGrid',array(
					'id' => 'list_kiriman',
					'dataProvider' => $providerKiriman,
					'columns' => array(
						'no_pengiriman',
						'idPesanan.no_order',
						'idKendaraan.no_polisi',
						'tujuan',
					)
				));
			 ?>
		</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Proses Pesanan</h4>
      </div>
      <div class="modal-body">
        <!-- <div id="prosesPengiriman"></div> -->
				<!-- <form class="form form-horizontal" id="form-proses-kirim">
					<div class="form-group">
						<label class="control-label col-sm-2">No Pengiriman</label>
						<div class="col-sm-4">
							<input type="text" id="field_no_pengiriman" readonly/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">No Order</label>
						<div class="col-sm-4">
							<input type="text" id="field_no_order" readonly/>
						</div>
					</div>
					<div class="form-group" style="display:none">
						<label class="control-label col-sm-2">Pilih</label>
						<div class="col-sm-4">
							<select class="form-control">
								<option>--Pilih--</option>
								<option>1</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Tanggal Kirim</label>
						<div class="col-sm-4">
							<input type="text" class="form-control tgl_form" name="tgl_kirim"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Tujuan</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="tujuan_kirim"/>
						</div>
					</div>
				</form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <!-- <button type="submit" class="btn btn-primary" id="submitKirim">Kirim</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
Yii::app()->clientScript->registerScript('pengirimanPopup', '
		$(document).ready(function(){
			$(".tgl_form").datepicker({
	    	orientation:"bottom",
	    	autoclose:true,
	    	format:"yyyy-mm-dd"
	    });
			$("body").on(\'click\',".gridKirim",function(){
				console.log("hello");
					var dataId = $(this).attr("data-id");
					console.log(dataId);
					var dataURL = "/gudang/pengiriman/getFormPengiriman?id="+dataId;
			    $(\'.modal-body\').load(dataURL,function(){
			        $(\'#myModal\').modal({show:true});
			    });
			});
			$(\'#e\').click(function(){
				var val = $(this).data("id");
				$.ajax({
					type: \'GET\',
					dataType: \'JSON\',
					data: {
							id: val,
					},
					url: window.location.origin + \'/gudang/pengiriman/getDataPesanan\',
					beforeSend: function(){
					},
					success:  function(response){
						// html_pop.html(response);
						if(response.status == true){
							var no_order = response.pesanan.no_order;
							var no_kirim = response.pengiriman.no_pengiriman;
						}
						$(\'#field_no_pengiriman\').attr("value",no_kirim);
						$(\'#field_no_order\').attr("value",no_order);
					}
				});
	    });

			// $(\'#submitKirim\').click(function(){
			// 	var dataform = $(\'#form-proses-kirim\').serialize();
			// 	console.log(dataform);
			// });
		});
');
 ?>
