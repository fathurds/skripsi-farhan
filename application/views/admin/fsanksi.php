      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2><?= isset($edit) ? "Edit" : "Tambah" ?> Sanksi</h2>
            </div>
          </div>
        </div>
      </div><br>
      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form method="POST" action="<?= base_url() ?>admin/sanksiAct/<?= isset($edit) ? "edit2" : "add2" ?>">
                <?php if (isset($edit)) : ?>
                  <input type="hidden" name="id_sanksi" value="<?= $edit->id ?>">
                <?php endif; ?>
                <table class="table table-bordered" style="background: #d3fffb;" id="dt">
                  <tbody>
                    <tr class="warning">
                      <td style="background: #d3fffb;">Tindak Lanjut</td>
                      <td style="background: #d3fffb;">
                        <textarea name="tindak_lanjut" id="tindak_lanjut" class="form-control" required=""><?= isset($edit) ? $edit->tindak_lanjut : "" ?></textarea>
                      </td>
                    </tr>
                    <tr>
                    <tr class="warning">
                      <td style="background: #d3fffb;">Sanksi</td>
                      <td style="background: #d3fffb;">
                        <textarea name="sanksi" id="sanksi" class="form-control" required=""><?= isset($edit) ? $edit->sanksi : "" ?></textarea>
                      </td>
                    </tr>
                    <?php if (!isset($edit)) : ?>
                      <tr class="warning">
                        <td style="background: #d3fffb;">Poin Minimal</td>
                        <td style="background: #d3fffb;"><input type="number" name="poin_min" value="" class="form-control" autocomplete="off"></td>
                      </tr>
                      <tr class="warning">
                        <td style="background: #d3fffb;">Poin Maksimal</td>
                        <td style="background: #d3fffb;"><input type="number" name="poin_maks" value="" class="form-control" autocomplete="off"></td>
                      </tr>
                    <?php endif; ?>
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