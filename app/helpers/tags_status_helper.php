<?php
function statusChecker($statusValue)
{
    switch ($statusValue) {
        case 9999:
            # code...
            return 'success';
        case 8888:
            # code...
            return 'info';
        case $statusValue < 50:
            # code...
            return 'danger';
        default:
            return 'primary';
    }
}

function statusLabel($statusValue)
{
     switch ($statusValue) {
        case 9999:
            # code...
            return '<span class="c-badge c-badge--success">Booking Selesai</span>';
        case 8888:
            # code...
            return '<span class="c-badge c-badge--info">Booking Baru</span>';
        case $statusValue < 50:
            # code...
            return '<span class="c-badge c-badge--danger">('.$statusValue.') Hari Booking Dikembalikan</span>';;
        default:
            return '<span class="c-badge c-badge--secondary">unknown status</span>';
    }
}
