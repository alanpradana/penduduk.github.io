<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataLab extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('datalab_m');
    if (empty($this->session->userdata('email'))) {
      redirect('login');
    }
  }


   // view tampil data Peternak
   public function Datapeternak()
   {
     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
     $data['peternak'] = $this->datalab_m->Datapeternak()->result_array();
     $data['judul'] = 'Kriteria';
     $this->load->view('template/header', $data);
     $this->load->view('template/sidebar', $data);
     $this->load->view('data/peternak', $data);
     $this->load->view('template/footer');
   }
  

  //  proses tambah data
  public function tambahdataternak(){
    $nama = $this->input->post('nama');
    $tanggungan = $this->input->post('jumlah_tanggungan');
    $status = $this->input->post('status');
 
    $data = [
     'nama' => $nama,
     'jumlah_tanggungan' => $tanggungan,
     'status' => $status
   ]; 
   $this->db->insert('data_peternak',$data);
   redirect('dataLab/Datapeternak');
  }

   // view tampil data Penduduk
   public function penduduk()
   {
     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
     $data['penduduk'] = $this->datalab_m->Datapenduduk()->result_array();
     $data['judul'] = 'penduduk';
     $this->load->view('template/header', $data);
     $this->load->view('template/sidebar', $data);
     $this->load->view('data/penduduk', $data);
     $this->load->view('template/footer');
   }
  

  //  proses tambah data penduduk
  public function tambahdatapenduduk(){
    $namalengkap = $this->input->post('nama_lengkap');
    $tanggallahir = $this->input->post('tanggal_lahir');
    $anakke = $this->input->post('anak_ke');
    $jumlahsaudara = $this->input->post('jumlah_saudara');
    $status = $this->input->post('status');
    $jeniskelamin = $this->input->post('jenis_kelamin');
    $agama = $this->input->post('agama');
   
 
    $data = [
     'nama_lengkap' => $namalengkap,
     'tanggal_lahir' => $tanggallahir,
     'anak_ke' => $anakke,
     'jumlah_saudara' => $jumlahsaudara,
     'status' => $status,
     'jenis_kelamin' => $jeniskelamin,
     'agama' => $agama
   ]; 
   $this->db->insert('form_penduduk',$data);
   redirect('dataLab/Datapenduduk');
  }

   // view tampil data kriteria
   public function Datakriteria()
   {
 
     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
     $data['kriteria'] = $this->datalab_m->Datakriteria()->result_array();
     $data['judul'] = 'Kriteria';
     $this->load->view('template/header', $data);
     $this->load->view('template/sidebar', $data);
     $this->load->view('data/kriteria', $data);
     $this->load->view('template/footer');
   }

     //  proses tambah kriteria
    public function tambahdatakriteria(){
    $nama = $this->input->post('nama');
    $bobot_nilai = $this->input->post('bobot_nilai');
    $status = $this->input->post('status');
    $jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');
    
    $data = [
     'nama' => $nama,
     'status' => $status,
     'bobot_nilai' => $bobot_nilai,
     'jumlah_pengeluaran' => $jumlah_pengeluaran
    ]; 
 
   $this->db->insert('data_kriteria',$data);
   redirect('dataLab/Datakriteria');
  }

  // view tampil data dosen
  public function dosen()
  {

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['dosen'] = $this->datalab_m->dosen()->result_array();
    $data['judul'] = 'Data Dosen Lab';
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('data/dosen', $data);
    $this->load->view('template/footer');
  }

  // master tambah data dosen
  public function tambahDataDosen()
  {

    $nama = $this->input->post('nama');
    $jabatan = $this->input->post('jabatan');
    $no_hp = $this->input->post('no_hp');
    $gambar = $_FILES['gambar'];
    if ($gambar) {
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = '2048';
      $config['upload_path']    = './assets/gambar/';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $foto = $this->upload->data('file_name', TRUE);
      } else {
        echo "error";
      }
    }
    $data = [
      'nama' => $nama,
      'jabatan' => $jabatan,
      'no_hp' => $no_hp,
      'gambar' => $foto
    ];

    $this->datalab_m->tambahDataDosen($data);
    $this->session->set_flashdata('pesanDosen', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data Dosen</strong>Berhasil Ditambah..
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
    redirect('dataLab/dosen');
  }

  // aksi hapus data dosen
  public function hapus($id)
  {
    $where = ['id_dosen' => $id];
    $this->datalab_m->hapusDosen($where);
    redirect('dataLab/dosen');
  }

  // view edit data dosen
  public function editDataDosen($id)
  {
    $where = ['id_dosen' => $id];
    $data['edit'] = $this->datalab_m->editDataDosen($where)->result_array();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = 'Halaman Edit Data Dosen';
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('data/edit/dataDosen', $data);
    $this->load->view('template/footer');
  }

  public function aksiEditDataDosen()
  {
    $where = $this->input->post('nama');
    $data = [
      'jabatan' => $this->input->post('jabatan'),
      'number' => $this->input->post('number')
    ];

    $foto = $_FILES['file'];
    if ($foto) {
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = '2048';
      $config['upload_path']    = './assets/gambar/dosen/';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $foto = $this->upload->data('file_name', TRUE);
      } else {
        echo "error";
      }
    }
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update('data_dosen');
    redirect('dataLab/dosen');
  }

  // view data pegawai
  public function pegawai()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['dosen'] = $this->datalab_m->pegawai()->result_array();
    $data['judul'] = 'Data Pegawai';
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('data/pegawai', $data);
    $this->load->view('template/footer');
  }

  // tambah pegawai
  function tambahDataPegawai()
  {
    $gambar = $_FILES['gambar'];
    if ($gambar) {
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = '2048';
      $config['upload_path']    = './assets/gambar/pegawai';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $foto = $this->upload->data('file_name', TRUE);
      } else {
        echo "error";
      }
    }

    $data = [
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'no_hp' => $this->input->post('no_hp'),
      'gambar' => $foto
    ];

    $this->datalab_m->tambahDataPegawai($data);
    redirect('dataLab/pegawai');
  }

  // Hapus data pegawai
  function hapusPegawai($id)
  {
    $where = [
      'id_pegawai' => $id
    ];
    $this->datalab_m->hapusPegawai($where);
    redirect('dataLab/pegawai');
  }

  // edit data pegawai
  function editPegawai()
  {
    $where = [
      'email' => $this->input->post('email')
    ];
    $gambarPegawai = $this->db->get_where('data_pegawai', $where)->row_array();
    $gambar = $_FILES['gambar']['name'];
    if ($gambar) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['upload_path'] = './assets/gambar/pegawai/';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $gambarLama = $gambarPegawai['gambar'];
        if ($gambarLama != 'default.jpg') {
          unlink(FCPATH . '/assets/gambar/pegawai/' . $gambarLama);
        }
        $foto = $this->upload->data('file_name', TRUE);
        $this->db->set('gambar', $foto);
      } else {
        echo "erorr";
      }
    }
    $data = [
      'nama' => $this->input->post('nama'),
      'no_hp' =>  $this->input->post('no_hp')
    ];
    $this->datalab_m->editDataPegawai($where, $data);
    redirect('dataLab/pegawai');
  }



  // view admin
  function admin()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['dosen'] = $this->datalab_m->admin()->result_array();
    $data['judul'] = 'Data Pegawai';
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('data/admin', $data);
    $this->load->view('template/footer');
  }


  // tambahDataAdmin
  public function tambahDataAdmin()
  {
    $gambar = $_FILES['gambar'];
    if ($gambar) {
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = '2048';
      $config['upload_path']    = './assets/gambar/admin/';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $foto = $this->upload->data('file_name', TRUE);
      } else {
        echo "error";
      }
    }
    $data = [
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'role_id' => 1,
      'active' => 1,
      'gambar' => $foto,
      'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT)
    ];
    $this->datalab_m->tambahDataAdmin($data);
    redirect('dashboard');
  }

  // Hapus Data Admin
  function habusDataAdmin($id)
  {
    $where = [
      'id' => $id
    ];
    $this->datalab_m->hapusAdmin($where);
    $this->session->set_flashdata('berhasilHapus', 'Data Berhasil Di Hapus');
    redirect('dataLab/admin');
  }

  // editDataAdmin
  public function editDataAdmin()
  {

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $gambar = $_FILES['file']['name'];
    if ($gambar) {
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = '2048';
      $config['upload_path']    = './assets/gambar/admin/';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('file')) {
        // Cek Image Lama(Kalok Ada Di hapus)
        $imageLama = $data['user']['gambar'];
        if ($imageLama != 'default.jpg') {
          unlink(FCPATH . '/assets/gambar/admin/' . $imageLama);
        }
        $foto = $this->upload->data('file_name', TRUE);
        $this->db->set('gambar', $foto);
      } else {
        echo "error";
      }
    }
    $nama = $this->input->post('nama');
    $where = [
      'email' => $this->input->post('email')
    ];
    $this->db->set('nama', $nama);
    $this->db->where($where);
    $this->db->update('user');
    redirect('dashboard');
  }


  function mahasiswaMagang()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['dosen'] = $this->datalab_m->magang()->result_array();
    $data['judul'] = 'Data Pegawai';
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('data/mahasiswaMagang', $data);
    $this->load->view('template/footer');
  }
  // tamabh data
  public function tambahData()
  {
  }
}
