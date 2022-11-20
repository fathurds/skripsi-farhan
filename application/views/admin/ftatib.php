<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2><?= isset($edit) ? "Edit" : "Form" ?> Tata Tertib</h2>
      </div>
    </div>
  </div>
</div><br>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="<?= base_url() ?>admin/tatibAct/<?= isset($edit) ? "edit2" : "add2" ?>">
          <?php if (isset($edit)) :  ?>
            <input type="hidden" name="id_tatib" value="<?= $edit->id ?>">
          <?php endif; ?>
          <table class="table table-bordered" style="background: #d3fffb;" id="dt">
            <tbody>
              <tr class="warning">
                <td style="background: #d3fffb;">Kelompok Tata Tertib</td>
                <td style="background: #d3fffb;">
                  <select name="id_kriteria" class="form-control">
                    <option disabled selected value="">Pilih Kelompok Tata Tertib</option>
                    <?php
                    foreach ($group_tatib as $value) {
                    ?>
                      <option value="<?= $value->kriteria ?>" <?= isset($edit) && $value->kriteria == $edit->id_kriteria ? "selected" : "" ?>>
                        <?= $value->kriteria; ?> - <?= $value->keterangan; ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Kode</td>
                <td style="background: #d3fffb;">
                  <input type="text" name="kode" value="<?= isset($edit) ? $edit->kode : "" ?>" class="form-control" required="" autocomplete="off">
                </td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Tata Tertib</td>
                <td style="background: #d3fffb;">
                  <input type="text" name="nama" value="<?= isset($edit) ? $edit->nama : "" ?>" class="form-control" required="" autocomplete="off">
                </td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Poin</td>
                <td style="background: #d3fffb;">
                  <input type="number" name="poin" value="<?= isset($edit) ? $edit->poin : "" ?>" class="form-control" required="" autocomplete="off">
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="submit" value="<?= isset($edit) ? "Update" : "Tambah" ?>" class="btn btn-primary">
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>