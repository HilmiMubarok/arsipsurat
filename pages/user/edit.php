<?php

require_once 'inc/dynamiccrud.php';
$obj = new DynamicCrud();
$data = getWhere('users', 'id_user', $_GET['id']);
if (isset($_POST['button'])) {

    $data = [
        'nama'     => $data->nama,
        'username' => $data->username,
        'password' => $data->password,
        'level'    => $_POST['level']
    ];

    $id = ['id_user' => $_GET['id']];

    $update = $obj->update("users", $data, $id);

    if ($update) {
        showAlert('success', 'Data Berhasil Diubah', 'pages.php?p=manajemen-user');
    } else {
        showAlert('error', $update, "pages.php?p=edit-user&id=$_GET[id]");
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
                        <h5>Edit User</h5>
                        <span>Edit User <?= $data->nama ?></span>
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
                                    <h5>Edit User <?= $data->nama ?></h5>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" value="<?= $data->nama ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" value="<?= $data->username ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" value="*******">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control border border-dark" name="level">
                                                <option value="admin" <?= ($data->level == "admin" ? "selected" : "null") ?> >Admin</option>
                                                <option value="owner" <?= ($data->level == "owner" ? "selected" : "null") ?> >Owner</option>
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
