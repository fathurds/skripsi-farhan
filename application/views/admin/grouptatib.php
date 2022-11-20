<!-- page content -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Daftar Kriteria Tata Tertib</h2>
                <?php
                if ($this->session->has_userdata('notif')) {
                ?>
                    <div class="bg-warning" style="padding: 10px;">
                        <span><?php echo $this->session->flashdata('notif'); ?></span>
                    </div>
                <?php
                }
                ?>
                <a href="<?php echo site_url('admin/grouptatibAct/add'); ?>" title="Materi"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah Kriteria Tata Tertib</button></a>
                <div class="row">
                    <div class="col-sm-2">
                        <h4>Show
                            <select>
                                <option nama="" value="">10</option>
                                <option nama="" value="">25</option>
                                <option nama="" value="">50</option>
                                <option nama="" value="">100</option>
                            </select>
                            entries
                        </h4>

                    </div>
                    <div class="col-sm-7"></div>
                    <div class="col-sm-1">
                        <h4>Search :</h4>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control">
                    </div>


                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" style="color:black; background: #d3fffb;" id="dt">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kriteria </th>
                            <th>Kriteria Tata tertib</th>
                            <th>Poin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($tatib as $list) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $list->kriteria; ?></td>
                                <td><?= $list->keterangan; ?></td>
                                <td><?= $list->bobot; ?></td>
                                <td>
                                    <a href="<?= site_url('admin/grouptatibAct/edit/') . $list->kriteria; ?>" title="Edit"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                                    <a onclick="deletes('<?= $list->kriteria; ?>')" title="Tugas"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script type="text/javascript">
                    var url = "<?php echo site_url(); ?>";

                    function deletes(id) {
                        swal({
                                title: "Are you sure delete " + id + "?",
                                text: "You will not be able to recover this data again!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, delete it!",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location = url + "admin/grouptatibAct/del/" + id;
                            });
                    }
                </script>
            </div>
        </div>
    </div>
</div>