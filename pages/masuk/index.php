<?php

require_once 'inc/dynamiccrud.php';
$obj     = new DynamicCrud();
$results = $obj->fetchall('surat_masuk',array('id_surat_masuk','nomor_surat','tanggal_masuk', 'pengirim', 'kepada', 'perihal','tanggal_entry', 'file'));

?>
<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-file-plus bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Surat Masuk</h5>
                        <span>Daftar Surat Masuk</span>
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
                                    <h5>Data Surat Masuk</h5>
                                </div>
                                <div class="card-body">
                                    <?php if ($_SESSION['user']['level'] == "admin"): ?>
                                        <a href="<?= BASE_URL . "/pages.php?p=tambah-surat-masuk" ?>" class="mb-3 btn btn-primary">
                                            <i class="feather icon-plus"></i> Tambah Data
                                        </a>
                                    <?php endif; ?>
                                    <table class="table table-bordered table-hover table-stripped">
                                        <thead>
                                            <tr>
                                                <th>No Surat</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Pengirim</th>
                                                <th>Kepada</th>
                                                <th>File</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($results as $data): ?>
                                                <tr>
                                                    <td><?= $data['nomor_surat'] ?></td>
                                                    <td><?= $data['tanggal_masuk'] ?></td>
                                                    <td><?= $data['pengirim'] ?></td>
                                                    <td><?= $data['kepada'] ?></td>
                                                    <td>
                                                        <a href="<?= BASE_URL . "/uploads/". $data['file'] ?>" class="p-2 badge badge-primary">
                                                            <i class="feather icon-download"></i> Download
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= BASE_URL. "/pages.php?p=detail-surat-masuk&id=".$data['id_surat_masuk'] ?>" class="btn btn-sm btn-success">
                                                            <i class="feather icon-eye"></i> Detail
                                                        </a>
                                                        <?php if ($_SESSION['user']['level'] == "admin"): ?>

                                                            <a href="<?= BASE_URL. "/pages.php?p=edit-surat-masuk&id=".$data['id_surat_masuk'] ?>" class="btn btn-sm btn-warning">
                                                                <i class="feather icon-edit"></i> Edit
                                                            </a>
                                                            <a href="<?= BASE_URL. "/pages.php?p=hapus-surat-masuk&id=".$data['id_surat_masuk'] ?>" class="btn btn-sm btn-danger">
                                                                <i class="feather icon-trash-2"></i> Hapus
                                                            </a>
                                                        <?php endif; ?>
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
