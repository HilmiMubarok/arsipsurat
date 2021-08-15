<?php

require_once 'inc/dynamiccrud.php';
$obj = new DynamicCrud();
$data = getWhere('surat_keluar', 'id_surat_keluar', $_GET['id']);
if (isset($_POST['button'])) {

    if (!empty($_FILES['file']['name'])) {
        $file_lama = "uploads/".$data->file;
        $data = [
            'nomor_surat'   => $data->nomor_surat,
            'tanggal_keluar' => $_POST['tanggal_keluar'],
            'pengirim'      => $_POST['pengirim'],
            'kepada'        => $_POST['kepada'],
            'perihal'       => $_POST['perihal'],
            'tanggal_entry' => $_POST['tanggal_entry'],
            'file'          => $_FILES['file']['name']
        ];
        $id = ['id_surat_keluar' => $_GET['id']];
        if (upload()) {
            if (file_exists($file_lama)) {
                unlink($file_lama);
            }
            $update = $obj->update("surat_keluar", $data, $id);
            if ($update) {
                showAlert('success', 'Data Berhasil Diubah', 'pages.php?p=surat-keluar');
            } else {
                showAlert('error', $update, "pages.php?p=edit-surat-keluar&id=$_GET[id]");
            }
        }
    } else {
        $data = [
            'nomor_surat'   => $data->nomor_surat,
            'tanggal_keluar' => $_POST['tanggal_keluar'],
            'pengirim'      => $_POST['pengirim'],
            'kepada'        => $_POST['kepada'],
            'perihal'       => $_POST['perihal'],
            'tanggal_entry' => $_POST['tanggal_entry'],
            'file'          => $data->file
        ];

        $id = ['id_surat_keluar' => $_GET['id']];

        $update = $obj->update("surat_keluar", $data, $id);

        if ($update) {
            showAlert('success', 'Data Berhasil Diubah', 'pages.php?p=surat-keluar');
        } else {
            showAlert('error', $update, "pages.php?p=edit-surat-keluar&id=$_GET[id]");
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
                        <h5>Edit Surat Keluar</h5>
                        <span>Edit Surat Keluar <?= $data->nomor_surat ?></span>
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
                                    <h5>Edit Surat Keluar <?= $data->nomor_surat ?></h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nomor Surat</label>
                                            <input type="text" name="nomor_surat" class="form-control" readonly  value="<?= $data->nomor_surat ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Keluar</label>
                                            <input type="date" name="tanggal_keluar" class="form-control" value="<?= $data->tanggal_keluar ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Pengirim</label>
                                            <input type="text" name="pengirim" class="form-control" value="<?= $data->pengirim ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Kepada</label>
                                            <input type="text" name="kepada" class="form-control" value="<?= $data->kepada ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Perihal</label>
                                            <input type="text" name="perihal" class="form-control" value="<?= $data->perihal ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Entry</label>
                                            <input type="date" name="tanggal_entry" class="form-control" value="<?= $data->tanggal_entry ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>File Surat</label>
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                        <button type="submit" name="button" class="btn btn-primary">
                                            <i class="feather icon-save"></i> Update Data
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
