<?php
class Mahasiswa_model
{
    // private $mhs=[
    //     ["nama" =>"Muhammad","nim" =>"0079","email" =>"muhammad@gmail.com","jurusan" =>"SI",],
    //     ["nama" =>"Ferdynan","nim" =>"7979","email" =>"ferdynan@gmail.com","jurusan" =>"TI",],
    //     ["nama" =>"Ali","nim" =>"0079","email" =>"ali@gmail.com","jurusan" =>"MI",],
    //     ["nama" =>"Syahbana","nim" =>"7900","email" =>"syahbana@gmail.com","jurusan" =>"KA",],
    // ];
    private $db, $table = 'mahasiswa';
    // database handler
    public function __construct()
    {
        // data source name
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM mahasiswa');
        return $this->db->resultSet();
    }

    public function getMahasiswaByID($id)
    {
        // $this->dbh->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nim,:email,:jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
