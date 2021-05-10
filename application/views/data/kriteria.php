<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col ml-2 mt-3 mb-2">
        <h3>Data Kriteria</h3>
        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn mt-2 mb-3 btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data Kriteria</a>
        <?= $this->session->flashdata('pesanDosen'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-bordered text-center">
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Status</th>
              <th scope="col">bobot nilai</th>
              <th scope="col">Jumlah Pengeluaran</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($kriteria as $row) : ?>
              <tr>
                <th scope="row"> <?= $no++; ?> </th>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?= $row['bobot_nilai']; ?></td>
                <td><?= $row['jumlah_pengeluaran']; ?></td>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- modal tambah data -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('dataLab/tambahdatakriteria') ?>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Bobot Nilai</label>
          <input type="text" name="bobot_nilai" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jabatan" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <select class="custom-select" name="status">
            <option selected>Open this select menu</option>
            <option value="simple">simple</option>
            <option value="kismin">kismin</option>
            <option value="sangat kismin">Sangat Kismin</option>
          </select>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Pengeluaran</label>
          <input type="text" name="jumlah_pengeluaran" class="form-control" id="exampleInputEmail1" placeholder="Masukan Foto">
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
<!-- akhir modal -->
<!--<input type="text" name="status" id="exampleInputEmail1" placeholder="Masukan No Hp