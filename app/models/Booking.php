<?php
class Booking
{
    private $db;
    protected $tableName = 'bookings';
    protected $pivotTableName = "booking_dress";
    protected $relationManyTableName = "dress";

    public function __construct()
    {
        $this->db = new Database;
    }


    public function get()
    {
        //  99999. Booking Selesai, 
        // 8888. Booking Baru. 
        // under 50. (countday) Hari dikembalikan.
        $castQuery = 'CASE WHEN tgl_pengembalian < NOW() THEN 9999
        WHEN tgl_peminjaman > NOW() THEN 8888
        ELSE DATEDIFF(tgl_pengembalian, NOW())
        END AS status';

        $query = "SELECT *, ".$castQuery." FROM ".$this->tableName ." ORDER BY status ASC";

        $this->db->query($query);
        $row = $this->db->get();
        return $row;
    }

    public function findById($id, $withRelation = true)
    {

        //Booking With Gaun List Data
        $this->db->query('SELECT * FROM ' . $this->tableName . ' WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if($withRelation){
            // Gaun List
            $dressQuery = "SELECT gn.name, gn.id, gn.imageUrl
            FROM dress gn JOIN
                booking_dress bg
                ON gn.id = bg.dress_id JOIN 
                bookings bk
                ON bk.id = bg.booking_id
            WHERE bk.id = :bookingId";

            $this->db->query($dressQuery);
            $this->db->bind(':bookingId',$id);
            $dressRow = $this->db->get();
            $row->dresses = $dressRow;
        }

        return $row;
    }

    public function findByPhoneNumberAndPassword($data)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM ' . $this->tableName . ' WHERE phoneNumber = :phoneNumber AND password = :password');

        $this->db->bind(':phoneNumber', $data['phoneNumber']);
        $this->db->bind(':password', $data['password']);

        $row = $this->db->single();

        return $row;
    }

    public function create($data)
    {
        
       
        $this->db->query('INSERT INTO ' . $this->tableName . ' (phoneNumber, name, tgl_peminjaman, tgl_pengembalian, alamat,link_surat,password) VALUES(:phoneNumber, :name, :tgl_peminjaman, :tgl_pengembalian, :alamat,:link_surat,:password)');

        //Bind values
        $this->db->bind(':phoneNumber', $data['phoneNumber']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':tgl_peminjaman', $data['tgl_peminjaman']);
        $this->db->bind(':tgl_pengembalian', $data['tgl_pengembalian']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':link_surat', $data['link_surat']);

        $this->db->bind(':password', $this->generate_password());

        if ($this->db->execute()) {
            $id = $this->db->lastInsertId();

            $this->createRelationMany($id, $data['dressIds']);
            return true;
        } else {
            return false;
        }
    }

    private function generate_password($length = 7)
    {
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          
            $str = '';
            $max = strlen($chars) - 1;
          
            for ($i=0; $i < $length; $i++)
              $str .= $chars[random_int(0, $max)];
          
            return $str;
    
    }
    
    private function createRelationMany($id, $manyRelationId = [])
    {
        foreach ($manyRelationId as $value) {
            $this->db->query('INSERT INTO ' . $this->pivotTableName . ' (booking_id, dress_id) VALUES(:bookingId, :dressId)');
            $this->db->bind(':bookingId', $id);
            $this->db->bind(':dressId', $value);
            $this->db->execute();
        }

    }
}
