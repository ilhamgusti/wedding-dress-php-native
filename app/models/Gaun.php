<?php
class Gaun
{
    private $db;
    protected $tableName = 'dress';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUnavailableDress($tglPeminjaman="", $tglPengembalian="")
    {
        // var_dump($tglPeminjaman, $tglPengembalian);
        $query = "SELECT DISTINCT(dress.id), tgl_peminjaman, tgl_pengembalian 
                    FROM bookings LEFT JOIN booking_dress on bookings.id = booking_dress.booking_id 
                    INNER JOIN dress ON dress.id = booking_dress.dress_id 
                    WHERE (bookings.tgl_peminjaman <= '".$tglPeminjaman."'
                    AND bookings.tgl_pengembalian >= '".$tglPeminjaman."') 
                    OR (bookings.tgl_peminjaman <= '".$tglPengembalian."' 
                    AND bookings.tgl_pengembalian >= '".$tglPengembalian."')";

        $this->db->query($query);
        $row = $this->db->get();
        return $row;
    }
    public function get()
    {
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
