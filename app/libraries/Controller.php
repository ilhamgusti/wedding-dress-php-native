<?php
//Load the model and the view
class Controller
{
    public function model($model)
    {
        //Require model file
        require_once '../app/models/' . $model . '.php';
        //Instantiate model
        return new $model();
    }

    //Load the view (checks for the file)
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exists.");
        }
    }

    protected function checkIsAdmin()
    {
        //jika belum login, lempar ke halaman login
       if(!isset($_SESSION['data_id'])){
            header('location: ' . URLROOT . '/users/login');
       }

       // jika bukan admin dan sudah login lempar ke halaman detail booking
       if(!$_SESSION['isAdmin']){
            header('location: ' . URLROOT . '/bookings/detail');
        }
    }


    protected function storeFile($data, $fieldName = "fileToUpload", $targetDir=APPROOT."./../public/assets/surat/")
    {
        $linkUrls = "assets/surat/".basename($_FILES[$fieldName]["name"]);

        $targetFile = $targetDir . basename($_FILES[$fieldName]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$fieldName]["tmp_name"]);
            if ($check !== false) {
                // File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $data['fileError'] = "File bukan Gambar.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            $data['fileError'] = "Maaf, file sudah ada.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES[$fieldName]["size"] > 500000) {
            $data['fileError'] = "Maaf, file terlalu besar.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        ) {
            $data['fileError'] = "Maaf, hanya file JPG, JPEG, PNG yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $data['fileError'] = "Maaf, file tidak terupload.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $targetFile)) {
                $data['fileStatus'] = "File " . htmlspecialchars(basename($_FILES[$fieldName]["name"])) . " telah ter-upload.";
                $data['link_surat'] = $targetFile;
                
                return $linkUrls;
            } else {
                $data['fileError'] = "Maaf, ada error saat mengupload file.";
            }
        }
        return $uploadOk;
    }
}
