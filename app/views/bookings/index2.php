<?php
require APPROOT . '/views/includes/dashboard/head.php';
?>
<?php
require APPROOT . '/views/includes/dashboard/header.php';
?>
<!-- ------ content is here -->

<!-- table content -->
<div class="row ">
    <div class="col-12 u-mb-large">
        <div class="c-table-responsive@desktop">
            <table class="c-table c-table--highlight u-mb-small" id="datatable">
                <caption class="c-table__title">
                    <div class="d-flex justify-content-between">
                        <div>Bookings <small><?= count($data)?> total data</small></div>
                        <a class="c-btn c-btn--info" href="<?php echo URLROOT ?>/bookings/create">
                            <i class="fa fa-plus u-mr-xsmall"></i>Add New
                        </a>
                    </div>
                    
                </caption>
                <thead class="c-table__head c-table__head--slim">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">No.</th>
                        <th class="c-table__cell c-table__cell--head">Tgl. Pinjam</th>
                        <th class="c-table__cell c-table__cell--head">Tgl. Pengembalian</th>
                        <th class="c-table__cell c-table__cell--head">Status</th>
                        <th class="c-table__cell c-table__cell--head">Nama</th>
                        <th class="c-table__cell c-table__cell--head">Alamat</th>
                        <th class="c-table__cell c-table__cell--head">No Hp</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Password</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Surat</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 0;
                    foreach ($data as $value) {
                        $i++
                    ?>
                        <tr class="c-table__row c-table__row--<?= statusChecker($value->status)?>">
                            <td class="c-table__cell"><?= $i ?></td>
                            <td class="c-table__cell"><?= date('Y-m-d', strtotime($value->tgl_peminjaman)) ?></td>
                            <td class="c-table__cell"><?= date('Y-m-d', strtotime($value->tgl_pengembalian)) ?></td>
                            <td class="c-table__cell"><?= statusLabel($value->status) ?></td>
                            <td class="c-table__cell"><?= $value->name ?></td>
                            <td class="c-table__cell"><textarea style="width: 272px;resize: block;word-break: break-word;min-height: 50px;border:none;background:transparent" readonly class="c-input"><?= $value->alamat ?></textarea></td>
                            <td class="c-table__cell"><?= $value->phoneNumber ?></td>
                            <td class="c-table__cell"><?= $value->password ?></td>
                            <td class="c-table__cell"><a href="<?= $value->link_surat ?>">Link</a></td>
                            <td class="c-table__cell"><a class="c-btn c-btn--secondary c-btn--fullwidth"href="<?php echo URLROOT ?>/bookings/detail/<?= $value->id ?>">Detail</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ------ content is here -->
<?php
require APPROOT . '/views/includes/dashboard/foot.php';
?>