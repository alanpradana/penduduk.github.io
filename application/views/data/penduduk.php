<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col ml-2 mt-3 mb-2">
        <h3>Penduduk</h3>
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
              <th scope="col">Nama lengkap</th>
              <th scope="col">Tanggal lahir</th>
              <th scope="col">Anak ke</th>
              <th scope="col">Jumlah Saudara</th>
              <th scope="col">Status</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Agama</th>
              <th scope="col">Pendidikan</th>
              <th scope="col">Pekerjaan</th>
              <th scope="col">Kode Pos</th>
              <th scope="col">RT</th>
              <th scope="col">RW</th>
              <th scope="col">Desa</th>
              <th scope="col">Kecamatan</th>
              <th scope="col">Kabupaten</th>
              <th scope="col">Provinsi</th>
              <th scope="col">Golongan Darah</th>
              <th scope="col">Nama Orang Tua</th>
              <th scope="col">Wali</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($penduduk as $row) : ?>
              <tr>
                <th scope="row"> <?= $no++; ?> </th>
                <td><?= $row['nama_lengkap']; ?></td>
                <td><?= $row['tanggal_lahir']; ?></td>
                <td><?= $row['anak_ke']; ?></td>
                <td><?= $row['jumlah_saudara']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
                <td><?= $row['agama']; ?></td>
                <td><?= $row['pendidikan']; ?></td>
                <td><?= $row['pekerjaan']; ?></td>
                <td><?= $row['kode_pos']; ?></td>
                <td><?= $row['RT']; ?></td>
                <td><?= $row['RW']; ?></td>
                <td><?= $row['desa']; ?></td>
                <td><?= $row['kecamatan']; ?></td>
                <td><?= $row['kabupaten']; ?></td>
                <td><?= $row['provinsi']; ?></td>
                <td><?= $row['golongan_darah']; ?></td>
                <td><?= $row['nama_orangtua']; ?></td>
                <td><?= $row['wali']; ?></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url("dataLab/tambahdatapenduduk")?>" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">tanggal lahir</label>
          <input type="text" name="jumlah_tanggungan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jabatan" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">anak ke</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">jumlah saudara</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">jenis kelamin</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">agama</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">pedidikan</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">pekerjaan</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">kode pos</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">RT</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">RW</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Desa</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Kecamatan</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Kabupaten</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Provinsi</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Golongan Darah</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Orang Tua</label>
          <input type="number" name="status" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Wali</label>
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