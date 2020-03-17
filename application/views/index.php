<?php
    $this->template->cek_login();
    if($this->session->flashdata('pesan')== TRUE){

        $pesan = $this->session->flashdata('pesan');

		   echo "
           <script>
		   	alert('$pesan');
		   </script>
           ";
} ?>
<?= $header ?>
<?= $slider ?>
<div class="content-wrapper py-3">
    <section class="content">
        <div class="container-fluid">
            <?= $content ?>
        </div>
    </section>
</div>
<?= $footer ?>