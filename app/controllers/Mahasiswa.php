<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaByID($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        // var_dump($_POST);
        // JIka ada baris baru yang ditambahkan
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            // pindahkan ke halaman utama mahasiswa
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            // pindahkan ke halaman utama mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        // var_dump($_POST);
        // JIka ada baris baru yang dihapus
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            // pindahkan ke halaman utama mahasiswa
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            // pindahkan ke halaman utama mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}
