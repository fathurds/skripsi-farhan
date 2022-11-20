<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?= isset($edit) ? "Edit" : "Tambah" ?> Kriteria Tata Tertib</h2>
            </div>
        </div>
    </div>
</div><br>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="<?= base_url() ?>admin/grouptatibAct/<?= isset($edit) ? "edit2" : "add2" ?>">
                    <?php if (isset($edit)) : ?>
                        <input type="hidden" name="kriteria2" value="<?= $edit->kriteria ?>">
                    <?php endif; ?>
                    <table class="table table-bordered" style="background: #d3fffb;" id="dt">
                        <tbody>
                            <tr class="warning">
                                <td style="background: #d3fffb;">Kriteria</td>
                                <td style="background: #d3fffb;"><input type="text" name="kriteria" value="<?= isset($edit) ? $edit->kriteria : ""; ?>" class="form-control" required="" <?= isset($edit) ? "disabled" : "" ?>></td>
                            </tr>
                            <tr class="warning">
                                <td style="background: #d3fffb;">Keterangan</td>
                                <td style="background: #d3fffb;"><input type="text" name="keterangan" value="<?= isset($edit) ? $edit->keterangan : ""; ?>" class="form-control" required=""></td>
                            </tr>
                            <tr class="warning">
                                <td style="background: #d3fffb;">Bobot</td>
                                <td style="background: #d3fffb;"><input type="number" name="bobot" value="<?= isset($edit) ? $edit->bobot : ""; ?>" class="form-control" required=""></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="<?= isset($edit) ? "Update" : "Tambah" ?>" class="btn btn-primary"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>