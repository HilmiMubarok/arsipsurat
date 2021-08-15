<?php

require_once 'inc/dynamiccrud.php';
$obj = new DynamicCrud();

if (isset($_POST['button'])) {

    $data = [
        'nama'     => $_SESSION['user']['nama'],
        'username' => $_SESSION['user']['username'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'level'    => $_SESSION['user']['level']
    ];

    $id = ['id_user' => $_SESSION['user']['id_user']];

    $update = $obj->update("users", $data, $id);

    if ($update) {
        showAlert('success', 'Password Berhasil Diubah', 'pages.php?p=setting');
    } else {
        showAlert('error', $update, "pages.php?p=setting");
    }

}

?>
<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-settings bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Setting</h5>
                        <span>Pengaturan Aplikasi</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item"><?= hariIni(date('Y-m-d')) ?> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pengaturan</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" value="<?= $_SESSION['user']['nama'] ?>" class="form-control form-control-lg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" value="<?= $_SESSION['user']['username'] ?>" class="form-control form-control-lg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Silahkan Masukkan Password Jika Ingin Diganti" class="form-control form-control-lg">
                                        </div>
                                        <button type="submit" name="button" class="btn btn-primary">
                                            <i class="feather icon-save"></i> Ubah Data
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
