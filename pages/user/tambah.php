<?php

require_once 'inc/dynamiccrud.php';
$obj = new DynamicCrud();

if (isset($_POST['button'])) {
    $data = [
        'nama'     => $_POST['nama'],
        'username' => $_POST['username'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'level'    => $_POST['level'],
    ];

    $save = $obj->insert('users', $data);

    if ($save) {
        showAlert('success', 'Data Berhasil Disimpan', 'pages.php?p=manajemen-user');
    } else {
        showAlert('error', $save, 'pages.php?p=tambah-user');
    }

}

?>

<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-file-plus bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Manajemen User</h5>
                        <span>Tambah User</span>
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
                                    <h5>Tambah User</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control border border-dark" name="level">
                                                <option value="admin">Admin</option>
                                                <option value="owner">Owner</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="button" class="btn btn-primary">
                                            <i class="feather icon-save"></i> Simpan Data
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
