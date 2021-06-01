<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/styleAdmin.css">
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
    <!--header-end-->
    <div id="content">
        <span>
            Booking
        </span>
        <a class="ButtonLogout" href="<?php echo URLROOT ?>/bookings/create">Tambah +</a>
    </div><br>   

            <!-- end table content -->
    <table>
        <tr>
            <th>Nomor</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Password</th>
            <th>Surat</th>
        </tr>
        <?php 
        $i = 0;
        foreach ($data as $value){
        $i++
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $value->tgl_peminjaman ?></td>
            <td><?= $value->tgl_pengembalian ?></td>
            <td><?= $value->status ?></td>
            <td><?= $value->name ?></td>
            <td><?= $value->alamat ?></td>
            <td><?= $value->phoneNumber ?></td>
            <td><?= $value->password ?></td>
            <td><?= $value->link_surat ?></td>
        </tr>
        <?php }?>
        
    </table>
</body>

</html>