<?php
require APPROOT . '/views/includes/dashboard/head.php';
?>
<?php
require APPROOT . '/views/includes/dashboard/header.php';
?>
<!-- ------ content is here -->
<div class="row">
    <div class="col-8 col-xl-10">
        <h1 class="u-h3">Booking Dress Detail</h1>
    </div>
</div>
<div class="row">
    <div class="col-12 u-mb-large">
        <div class="c-card u-mb-premium" style="padding: 2rem;">

            <div class="col-12">
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="name">Nama</label>
                    <input readonly class="c-input"  type="text" id="name" value="<?= $data->name ?>" placeholder="Masukkan Nama">
                </div>
            </div>
            <div class="col-12">
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="alamat">Alamat</label>
                    <textarea readonly class="c-input" id="alamat"><?= $data->alamat ?> </textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="phoneNumber">Nomor HP</label>
                    <input value="<?= $data->phoneNumber ?>" readonly  class="c-input" type="text" id="phoneNumber" name="phoneNumber" placeholder="Masukkan nomor HP">
                </div>
            </div>
            <div class="col-12">
                <label class="c-field__label" for="firstName">Tgl. Peminjaman</label>
                <div class="c-field has-addon-left u-mb-small">
                    <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                    <label class="c-field__label u-hidden-visually" for="tgl_peminjaman">Tgl. Peminjaman</label>
                    <input class="c-input" value="<?= $data->tgl_peminjaman ?>"   data-toggle="datepicker" id="tgl_peminjaman" name="tgl_peminjaman" type="text" placeholder="Masukkan tanggal Peminjaman">
                </div>
            </div>
            <div class="col-12">
                <label class="c-field__label" for="tgl_pengembalian">Tgl. Pengembalian</label>
                <div class="c-field has-addon-left u-mb-small">
                    <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                    <label class="c-field__label u-hidden-visually" for="tgl_pengembalian">Tgl. Pengembalian</label>
                    <input class="c-input" value="<?= $data->tgl_pengembalian ?>" data-toggle="datepicker" id="tgl_pengembalian" name="tgl_pengembalian" type="text" placeholder="masukkan tanggal pengembalian">
                </div>
            </div>
            <div class="col-12">
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="chooseDressButton">Dress</label>
                    <input class="c-input" type="hidden" id="chooseDressButton" placeholder="Jason">
                    <?php foreach ($data->dresses as $i => $dressValue) { ?>
                        <img style="width:10%;" src="<?php echo URLROOT ?>/public/<?= $dressValue->imageUrl ?>" alt="Pricing Icon">
                    <?php }?>
                </div>
            </div>
            <div class="col-12">
                <div class="c-field u-mb-large">
                    <label class="c-field__label" for="fileSurat">Surat Kontrak</label>
                    <a href="<?php echo URLROOT ?>/<?= $data->link_surat ?>" download="surat-<?= $data->phoneNumber?>.jpg" class="c-btn c-btn--info">
                        <i class="fa fa-download u-mr-xsmall"></i>Download
                    </a>
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