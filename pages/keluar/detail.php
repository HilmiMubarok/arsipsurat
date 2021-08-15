<?php $data = getWhere('surat_keluar', 'id_surat_keluar', $_GET['id']); ?>
<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-file-plus bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Detail Surat Keluar</h5>
                        <span>Detail Surat Keluar <?= $data->nomor_surat ?></span>
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
                                    <h5>Detail Surat <?= $data->nomor_surat ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <embed src="uploads/<?= $data->file ?>#toolbar=0" width="100%" height="100%"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <table class="table table-bordered table-hover table-stripped">
                                                    <tr>
                                                        <th>No Surat</th>
                                                        <td><?= $data->nomor_surat ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Keluar</th>
                                                        <td><?= $data->tanggal_keluar ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pengirim</th>
                                                        <td><?= $data->pengirim ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kepada</th>
                                                        <td><?= $data->kepada ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Perihal</th>
                                                        <td><?= $data->perihal ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Entry</th>
                                                        <td><?= $data->tanggal_entry ?></td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= BASE_URL. "/pages.php?p=surat-keluar" ?>" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
