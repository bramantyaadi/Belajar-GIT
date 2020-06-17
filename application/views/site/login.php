<h1>Login</h1>
<br>
<?php 

    echo form_open('landing/ceklogin');
    echo "USERNAME : " .form_input('username');
    echo "<br><br>";
    echo "PASSWORD : ". form_input('password');
    echo "<br>";
    echo form_submit('btnlogin','Login',['style' => 'background-color:green;color:white']);
    echo form_close();

    if (null != $this->session->flashdata('pesanLogin')) {
        echo '<h1 style="color:red;">'.$this->session->flashdata("pesanLogin").'</h1>';
    }

    
?>

