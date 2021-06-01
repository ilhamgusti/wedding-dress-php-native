<?php
require APPROOT . '/views/includes/dashboard/head.php';
?>
<?php
require APPROOT . '/views/includes/dashboard/header.php';
?>
<!-- ------ content is here -->
<div class="row">
    <div class="col-8 col-xl-10">
        <h1 class="u-h3">New Booking Dress</h1>
    </div>
</div>
<form action="<?php echo URLROOT; ?>/bookings/create" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="col-12 u-mb-large">
        <div class="c-card u-mb-premium" style="padding: 2rem;">

            <div class="col-12">
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="name">Nama</label>
                    <input class="c-input" name="name" type="text" id="name" placeholder="Masukkan Nama">
                </div>
            </div>
            <div class="col-12">
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="alamat">Alamat</label>
                    <textarea class="c-input" id="alamat" name="alamat"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="phoneNumber">Nomor HP</label>
                    <input class="c-input" type="text" id="phoneNumber" name="phoneNumber" placeholder="Masukkan nomor HP">
                </div>
            </div>
            <div class="col-12">
                <label class="c-field__label" for="firstName">Tgl. Peminjaman</label>
                <div class="c-field has-addon-left u-mb-small">
                    <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                    <label class="c-field__label u-hidden-visually" for="tgl_peminjaman">Tgl. Peminjaman</label>
                    <input class="c-input" data-toggle="datepicker" id="tgl_peminjaman" name="tgl_peminjaman" type="text" placeholder="Masukkan tanggal Peminjaman">
                </div>
            </div>
            <div class="col-12">
                <label class="c-field__label" for="tgl_pengembalian">Tgl. Pengembalian</label>
                <div class="c-field has-addon-left u-mb-small">
                    <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                    <label class="c-field__label u-hidden-visually" for="tgl_pengembalian">Tgl. Pengembalian</label>
                    <input class="c-input" data-toggle="datepicker" id="tgl_pengembalian" name="tgl_pengembalian" type="text" placeholder="masukkan tanggal pengembalian">
                </div>
            </div>
            <div class="col-12">
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="chooseDressButton">Dress</label>
                    <input class="c-input" type="hidden" id="chooseDressButton" placeholder="Jason">
                    <button type="button" class="c-btn c-btn--info"  data-toggle="modal" data-target="#chooseDress">
                        <i class="fa fa-plus u-mr-xsmall"></i>Choose Dress
                    </button>
                    <?php
                    require APPROOT . '/views/bookings/chooseDress.php';
                    ?>
                </div>
            </div>
            <div class="col-12">
                <div class="c-field u-mb-large">
                    <label class="c-field__label" for="fileSurat">Surat Kontrak</label>
                    <input class="c-input" type="file" id="fileSurat" placeholder="Jason" name="fileSurat">
                </div>
            </div>
            <div class="col-12 u-text-center">
                <div class="c-field u-mb-small">
                    <input class="c-input" type="hidden" id="fileSurat" placeholder="Jason">
                    <button type="submit" class="c-btn c-btn--info" href="#!">
                        <i class="fa fa-send-o u-mr-xsmall"></i>Submit
</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<!-- ------ content is here -->
<?php
require APPROOT . '/views/includes/dashboard/foot.php';
?>