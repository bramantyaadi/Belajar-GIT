<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<h2>Selamat Datang , <?= $this->session->userdata('yanglogin')->dokter_nama ?></h2>
<div class="button">
    <a href="<?= site_url('landing/logout') ?>">
        <button style="font-size: 20px; height:50px;background-color:red;color:cornsilk">Logout</button>
    </a>
    <a href="">
        <button style=" height:50px;width:200px;background-color: green;color:honeydew; font-size: 20px;">Tampilkan Pasien</button>
    </a>
</div>
<hr>
    <h2>Masukan Pencarian</h2>
    
    <?php

        echo form_open('dokter/daftarPantauan');
        echo form_submit('btnCari', 'Cari');
        echo form_close();

    ?>
<hr>
<br>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>KODE</th>
                <th>NAMA</th>
                <th>GEJALA</th>
                <th>KOTA</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
                foreach ($daftarPantauan as $row) {
                    ?>
                        <tr>
                            <td><?= $row->pantauan_id ?></td>
                            <td><?= $row->pantauan_nama ?></td>
                            <td><?= $row->pantauan_gejala ?></td>
                            <td><?= $row->kota_nama ?></td>
                            <td>
                                <button>Periksa Pasien</button>
                            </td>
                        </tr>
                    <?php
                }
            
            ?>
        </tbody>
    </table>
    <?= $this->pagination->create_links() ?>
</div>