<h2>SELAMAT DATANG , Administrator</h2>
<a href="<?= site_url('landing/logout') ?>">
    <button style="background-color: red; width: 100px;height: 50px;font-size: 25px;">Logout</button>
</a>
<script src="<?= base_url('js/jquery.js') ?>"></script>
<br>
<h3>Master Dokter</h3>
<?php 
    echo form_open_multipart('admin/olah');
    ?>
        <input type="hidden" name="dokter_id" id="" class="dokterId"><br>
    <?php
    echo "Nama : " .form_input('dokter_nama' ,'' ,['class' => 'dokterNama'] );echo "<br>";
    echo "Username : ".form_input('dokter_username' ,'',['class' => 'dokterUsername']);echo "<br>";
    echo "Password : ".form_input('dokter_password','',['class' => 'dokterPassword']);echo "<br>";
    echo "Upload Gambar : ".form_upload('fotodokter');echo "<br>";
    echo form_submit('btninsert' , "Tambah");
    echo form_submit('btnupdate' ,"update");
    echo form_close();
?>
<?php 
        if (null != $this->session->flashdata('pesan')) {
		echo '<h1 style="color:red;">'.$this->session->flashdata("pesan").'</h1>';
        }
    ?>
<h3>daftar Dokter</h3>
<br>
<table border="1px solid black">
        <thead>
            <tr>
                <th >ID</th>
                <th>NAMA</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>GAMBAR</th>
                <th>Ubah</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($daftarDok as $row) {
                    $gambar = "<img style='width:100px;height:100px;' src='".base_url('foto/'.$row->dokter_id.'.jpg')."' />";
                    ?>
                        <tr id="<?= $row->dokter_id ?>">
                            <th><?= $row->dokter_id ?></th>
                            <td><?= $row->dokter_nama ?></td>
                            <td><?= $row->dokter_username ?></td>
                            <td><?= $row->dokter_password ?></td>
                            <td><?= $gambar ?></td>
                            <td>
                                <a href="javascript:void(0)" class="Ubah" 
                                data-id="<?= $row->dokter_id ?>" 
                                data-pass="<?= $row->dokter_password ?>" data-username="<?= $row->dokter_username ?>" data-nama="<?= $row->dokter_nama ?>">
                                    <button>ubah</button>
                                </a>
                            </td>
                            <td>
                                <button onclick="deleteAjax(<?= $row->dokter_id?>)">Delete</button>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>



    <script>
        function deleteAjax(id) {
            if (confirm('Yaking Menghapus Data?')) {
                $.post('<?= site_url('admin/deleteAjax') ?>' , {dokter_id:id}, function(ret) {
                    if (ret > 0) {
                        $('#'+id).remove();
                        console.log(ret);
                    }
                })
            }
        }
        $(document).ready(function() {
            $('.Ubah').click(function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var pass = $(this).data('pass');
                var username = $(this).data('username');
                $('.dokterId').val(id).val();
                $('.dokterUsername').val(username);
                $('.dokterPassword').val(pass);
                $('.dokterNama').val(nama);
            });
        });
    </script>

