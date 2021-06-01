<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->bookingModel = $this->model('Booking');
        $this->adminModel = $this->model('InMemoryUserAdmin');
    }

    public function login()
    {
        if(isLoggedIn()){
            header('location: ' . URLROOT . '/bookings/index');
        }
        $data = [
            'title' => 'Login page',
            'phoneNumber' => '',
            'password' => '',
            'phoneNumberError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'phoneNumber' => trim($_POST['phoneNumber']),
                'password' => trim($_POST['password']),
                'phoneNumberError' => '',
                'passwordError' => '',
            ];

      
            $this->validate($data);

            //Check if all errors are empty
            if (empty($data['phoneNumberError']) && empty($data['passwordError'])) {
                $isAdmin = $this->adminModel->check($data);

                if($isAdmin){
                    $this->createUserSession($isAdmin);
                }else{
                    $loggedInUser = $this->bookingModel->findByPhoneNumberAndPassword($data);
                    if($loggedInUser){
                        $this->createUserSession((array) $loggedInUser);
                    }
                    else{
                        $data['passwordError'] = 'Password atau nomor telpon salah. Coba lagi.';
                        $this->view('login', $data);
                    }
                }
            }
        } else {
            $data = [
                'phoneNumber' => '',
                'password' => '',
                'phoneNumberError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('login', $data);
    }

    public function createUserSession($data)
    {
        $_SESSION['data_id'] = $data['id'];
        $_SESSION['phoneNumber'] = $data['phoneNumber'];
        $_SESSION['isAdmin'] = $data['isAdmin'];
        if ($data['isAdmin']) {
            header('location:' . URLROOT . '/bookings/index');
        } else {
            header('location:' . URLROOT . '/bookings/detail');
        }
    }

    public function logout()
    {
        unset($_SESSION['data_id']);
        unset($_SESSION['phoneNumber']);
        unset($_SESSION['isAdmin']);
        header('location:' . URLROOT . '/users/login');
    }

    private function validate($data)
    {
            //Validate phoneNumber
            if (empty($data['phoneNumber'])) {
                $data['phoneNumberError'] = 'Mohon masukkan nomor telepon.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'mohon masukkan password.';
            }
       
    }
}
