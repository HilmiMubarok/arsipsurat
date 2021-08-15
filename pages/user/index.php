<?php

require_once 'inc/dynamiccrud.php';
$obj     = new DynamicCrud();
$results = $obj->fetchall('users',array('id_user','nama','username', 'password', 'level'));

?>
<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-users bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Manajemen User</h5>
                        <span>Daftar User</span>
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
                                    <h5>Data User</h5>
                                </div>
                                <div class="card-body">
                                    <a href="<?= BASE_URL . "/pages.php?p=tambah-user" ?>" class="mb-3 btn btn-primary">
                                        <i class="feather icon-plus"></i> Tambah Data
                                    </a>
                                    <table class="table table-bordered table-hover table-stripped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; foreach ($results as $data): ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['username'] ?></td>
                                                    <td><?= $data['level'] ?></td>
                                                    <td>
                                                        <a href="<?= BASE_URL. "/pages.php?p=edit-user&id=".$data['id_user'] ?>" class="btn btn-sm btn-warning">
                                                            <i class="feather icon-edit"></i> Edit
                                                        </a>
                                                        <a href="<?= BASE_URL. "/pages.php?p=hapus-user&id=".$data['id_user'] ?>" class="btn btn-sm btn-danger">
                                                            <i class="feather icon-trash-2"></i> Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
