<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col ml-2 mt-3 mb-2">
        <h3>Data Peternak</h3>
        <a href="#" data-toggle="modal" data-target="#exampleModalpeter" class="btn mt-2 mb-3 btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data Peternak</a>
        <!-- <?= $this->session->flashdata('pesanDosen'); ?> -->
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-bordered text-center">
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Jumlah Tanggunagn</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($peternak as $row) : ?>
              <tr>
                <th scope="row"> <?= $no++; ?> </th>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jumlah_tanggungan']; ?></td>
                <td><?= $row['status']; ?></td>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- modal tambah data -->
<!-- Modal -->
<div class="modal fade" id="exampleModalpeter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Peternak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url("dataLab/tambahdataternak")?>" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Jumlah tanggungan</label>
          <input type="text" name="jumlah_tanggungan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jabatan" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        <form>
      </div>
    </div>
  </div>
</div>
<!-- akhir modal -->