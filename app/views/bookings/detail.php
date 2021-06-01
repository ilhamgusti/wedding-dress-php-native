<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/styleCustomer.css">
    <title>Dress</title>
</head>

<body>
    <header id="header">
        <!--header-start-->
        <span class="span-header">
            Halaman Customer
        </span>
        <a href="<?php echo URLROOT ?>/users/logout" class="ButtonLogout">Logout</a>
    </header>
    <!--header-end--><br>
    <div class="form-input">
        <div class="form-input-items">
            <span class="label">Nama</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input readonly type="text" class="input-field" placeholder="Masukan Nama Anda" value="<?= $data->name ?>">
        </div>

        <div class="form-input-items">
            <span class="label">Alamat</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input readonly type="text" class="input-field" placeholder="Masukan Alamat Anda" value="<?= $data->alamat ?>">
        </div>

        <div class="form-input-items">
            <span class="label">No HP</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input readonly type="text" class="input-field" placeholder="Masukan Nomor HP Anda" value="<?= $data->phoneNumber ?>">
        </div>

        <div class="form-input-items">
            <span class="label">Surat Kontrak</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <a class="Button" href="<?php echo URLROOT ?>/<?= $data->link_surat ?>">Download</a>
        </div>

        <div class="form-input-items">
            <span class="label">Tanggal Pengembalian</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">
            <input readonly type="text"  class="input-field" autocomplete="off" value="<?= dateConverter($data->tgl_pengembalian)?>">
        </div>

        <div class="form-input-items">
            <span class="label">Dress</span>
        </div>
        <div class="form-input-items">
            <span class="label"> : </span>
        </div>
        <div class="form-input-items">

        </div>
    </div>
    <!-- <div class="form-group">
        <label for="contohupload1">Pilih file yang ingin diupload</label>
        <input type="file" class="form-control-file" id="contohupload1">
    </div>
    <br/>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="contohupload2">
        <label class="custom-file-label" for="contohupload2">Choose file</label>
    </div> -->
</body>

</html>