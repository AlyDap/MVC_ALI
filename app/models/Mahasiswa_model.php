<?php
class Mahasiswa_model
{
    // private $mhs=[
    //     ["nama" =>"Muhammad","nim" =>"0079","email" =>"muhammad@gmail.com","jurusan" =>"SI",],
    //     ["nama" =>"Ferdynan","nim" =>"7979","email" =>"ferdynan@gmail.com","jurusan" =>"TI",],
    //     ["nama" =>"Ali","nim" =>"0079","email" =>"ali@gmail.com","jurusan" =>"MI",],
    //     ["nama" =>"Syahbana","nim" =>"7900","email" =>"syahbana@gmail.com","jurusan" =>"KA",],
    // ];
    private $dbh, $stmt, $table = 'mahasiswa';
    // database handler
    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';
        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMahasiswaByID($id)
    {
        // $this->dbh->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->stmt = $this->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id= ' . $id);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
