<?php

require_once 'inc/dynamiccrud.php';
$obj = new DynamicCrud();

if (isset($_POST['button'])) {
    $data = [
        'nomor_surat'   => $_POST['nomor_surat'],
        'tanggal_masuk' => $_POST['tanggal_masuk'],
        'pengirim'      => $_POST['pengirim'],
        'kepada'        => $_POST['kepada'],
        'perihal'       => $_POST['perihal'],
        'tanggal_entry' => $_POST['tanggal_entry'],
        'file'          => $_FILES['file']['name'],
    ];

    if (upload()) {
        $save = $obj->insert('surat_masuk', $data);

        if ($save) {
            showAlert('success', 'Data Berhasil Disimpan', 'pages.php?p=surat-masuk');
        } else {
            showAlert('error', $save, 'pages.php?p=tambah-surat-masuk');
        }
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
                                    <h5>Tambah Surat Masuk</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nomor Surat</label>
                                            <input type="text" name="nomor_surat" class="form-control" readonly  value="<?= getNomorSurat("surat_masuk") ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input type="date" name="tanggal_masuk" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Pengirim</label>
                                            <input type="text" name="pengirim" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kepada</label>
                                            <input type="text" name="kepada" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Perihal</label>
                                            <input type="text" name="perihal" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Entry</label>
                                            <input type="date" name="tanggal_entry" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>File Surat</label>
                                            <input type="file" name="file" class="form-control">
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
