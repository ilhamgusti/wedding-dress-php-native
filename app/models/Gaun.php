<?php
class Gaun
{
    private $db;
    protected $tableName = 'dress';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get($tglPeminjaman="", $tglPengembalian="")
    {
        $whereCastQuery = "WHERE 
        (
        (tgl_peminjaman <= x and x <= tgl_pengembalian ) or
        (tgl_peminjaman <= y and y <= tgl_pengembalian) 
        )";
        $castQuery = "CASE WHEN tgl_pengembalian < NOW() THEN 9999
        WHEN tgl_peminjaman > NOW() THEN 8888
        ELSE 20
        END AS status";
        $this->db->query('SELECT * FROM ' . $this->tableName);
        $row = $this->db->get();
        return $row;
    }

    public function findById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tableName . ' WHERE id = :id');

        //Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }

    public function findByName($name)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM ' . $this->tableName . ' WHERE name = :name');

        $this->db->bind(':name', $name);
    }
}
