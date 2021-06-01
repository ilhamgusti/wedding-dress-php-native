<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/styleAdd.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Dress</title>
</head>

<body>
    <header id="header">
        <!--header-start-->
        <span class="span-header">
            Halaman Admin
        </span>
        <a href="<?php echo URLROOT ?>/users/logout" class="ButtonLogout">Logout</a>
    </header>
    <!--header-end--><br>
    <form style="text-align:center;" action="<?php echo URLROOT; ?>/bookings/create" method="POST" enctype="multipart/form-data">
    <div class="form-input" style="text-align:left;">
        <div class="form-input-items">
            <span class="label">Nama</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input type="text" name="name" class="input-field" placeholder="Masukan Nama Anda">
        </div>

        <div class="form-input-items">
            <span class="label">Alamat</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input type="text" name="alamat" class="input-field" placeholder="Masukan Alamat Anda">
        </div>

        <div class="form-input-items">
            <span class="label">No HP</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input type="text" class="input-field" name="phoneNumber" placeholder="Masukan Nomor HP Anda">
        </div>

        <div class="form-input-items">
            <span class="label">Tanggal Peminjaman</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input type="text" readonly name="tgl_peminjaman" class="input-field" autocomplete="off" value="<?= date('Y-m-d')?>">
        </div>

        <div class="form-input-items">
            <span class="label">Tanggal Pengembalian</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input type="text" id="datepicker" name="tgl_pengembalian" class="input-field" autocomplete="off">
        </div>

        <div class="form-input-items">
            <span class="label">Dress</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <a href="#modal" role="button" id="blah" class="button button__link">+</a>
        </div>

        <div class="form-input-items">
            <span class="label">Surat Kontrak</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input type="file" name="fileSurat" class="Button"/>
        </div>

        <div class="form-input-items">
            <span class="label"></span>
        </div>
        <div class="form-input-items">
            <span class="label"></span>
        </div>
    </div>
    <input type="submit" class="Button" style="margin-bottom: 1rem;" name="submit">
    </form>

    <!-- Modal -->
    <div class="modal-wrapper" id="modal">
        <div class="modal-body card">
            <div class="modal-header">
                <h2 class="heading">Select Dress</h2>
                <a href="#!" role="button" class="close" aria-label="close this modal">
                    <svg viewBox="0 0 24 24">
                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                    </svg>
                </a>
            </div>
            <ol id="selectable">
                <li class="ui-state-default" style="background-image: url('/public/Gaun/1.jpg'); height: 250px; width: 130px;"></li>
                <li class="ui-state-default" style="background-image: url('/public/Gaun/2.jpg'); height: 250px; width: 130px;"></li>
                <li class="ui-state-default" style="background-image: url('/public/Gaun/3.jpg'); height: 250px; width: 130px;"></li>
            </ol>
            <button class="Button">Save</button>
        </div>
        <a href="#!" class="outside-trigger"></a>
    </div>
    <script>
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,

        });

        $("#selectable").selectable();
    </script>
</body>

</html>