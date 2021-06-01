<?php
class Bookings extends Controller
{
    public function __construct()
    {
        $this->bookingModel = $this->model('Booking');
        $this->dressModel = $this->model('Gaun');
    }

    public function index()
    {
        $this->checkIsAdmin();

        $data = $this->bookingModel->get();
        $this->view('bookings/index2', $data);
    }
    public function detail($id = null)
    {
        if (!$_SESSION['isAdmin']) {
            //jika bukan admin, id detail menggunakan data_id session booking customer
            $id = $_SESSION['data_id'];
        }

        $data = $this->bookingModel->findById($id);
        // var_dump($data);
        // die();
        $this->view('bookings/detail2', $data);
    }

    public function create()
    {
        $this->checkIsAdmin();
        $allDress = $this->dressModel->get();
        $data = [
            'tgl_peminjaman' => '',
            'tgl_pengembalian' => '',
            'name' => '',
            'alamat' => '',
            'phoneNumber' => '',
            'link_surat' => '',
            'dressIds' => [],
            'dresses' => $allDress,
            'phoneNumberError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


     
            
            $data = [
                'phoneNumber' => trim($_POST['phoneNumber']),
                'tgl_peminjaman' => date('Y-m-d',strtotime($_POST['tgl_peminjaman'])),
                'tgl_pengembalian' => date("Y-m-d H:i:s",strtotime($_POST['tgl_pengembalian'])),
                'name' => trim($_POST['name']),
                'alamat' => trim($_POST['alamat']),
                'phoneNumber' => trim($_POST['phoneNumber']),
                'link_surat' => '',
                'dressIds' => $_POST['dressIds'],
                'phoneNumberError' => '',
                'fileError' => '',
                'fileStatus' => '',
            ];

            var_dump($data);
            
            
            die();
  
            
            $validationRegex = [
                'phoneNumberValidation' => "/^[0-9]*$/",
            ];
            
            $this->validate($data, $validationRegex);
            
            // Make sure that errors are empty
            if (empty($errorData['phoneNumberError'])) {

                $filePathLink = $this->storeFile($data,"fileSurat");
                $data['link_surat'] = $filePathLink;
                //buat booking berdasarkan data
                if ($this->bookingModel->create($data)) {
                    //Redirect ke Booking list page
                    header('location: ' . URLROOT . '/bookings/index');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('bookings/add2', $data);
    }

    private function validate($data, $validationRegex = [])
    {
        //Validate phoneNumber only numbers
        if (empty($data['phoneNumber'])) {
            $data['phoneNumberError'] = 'Tolong masukan No.Telp';
        } elseif (!preg_match($validationRegex['phoneNumberValidation'], $data['phoneNumber'])) {
            $data['phoneNumberError'] = 'Nomor Telp hanya boleh berisi angka.';
        }
    }

}
