<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Guru</h2>
      </div>
    </div>
  </div>
</div><br>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="<?= base_url() ?>admin/guruAct/add2">
          <table class="table table-bordered" style="background: #d3fffb;" id="dt">
            <tbody>
              <tr class="warning">
                <td style="background: #d3fffb;">NIP</td>
                <td style="background: #d3fffb;"><input type="text" name="nip" value="" placeholder="NIP" class="form-control" required=""></td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Nama</td>
                <td style="background: #d3fffb;"><input type="text" name="nama" value="" placeholder="Nama Guru" class="form-control" required=""></td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Email</td>
                <td style="background: #d3fffb;"><input type="email" name="email" value="" placeholder="Email" class="form-control" required=""></td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Kontak</td>
                <td style="background: #d3fffb;"><input type="text" name="kontak" value="" placeholder="Kontak" class="form-control" required=""></td>
              </tr>
              <tr class="warning">
                <td style="background: #d3fffb;">Mata Pelajaran</td>
                <td style="background: #d3fffb;">
                  <select name="id_mapel" class="form-control">
                    <option disabled selected>Pilih Mata Pelajaran</option>
                    <?php foreach ($mapel as $pelajaran) : ?>
                      <option value="<?= $pelajaran->id ?>"><?= $pelajaran->nama ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value="Upload" class="btn btn-primary"></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>