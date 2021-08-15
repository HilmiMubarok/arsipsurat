<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Dashboard</h5>
                        <span>Selamat Datang di Aplikasi Manajemen Surat</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item"><?= hariIni(date('Y-m-d')) ?></li>
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
                        <div class="col-xl-6 col-md-6">
                            <div class="card prod-p-card card-red">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Surat keluar</h6>
                                            <h3 class="m-b-0 f-w-700 text-white"><?= totalSurat('surat_keluar') ?></h3>
                                        </div>
                                    </div>
                                    <?php if ($_SESSION['user']['level'] == "admin"): ?>

                                        <a href="<?= BASE_URL. "/pages.php?p=tambah-surat-keluar" ?>" class="btn btn-outline-light btn-sm btn-round">
                                            Tambah Data
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Surat Masuk</h6>
                                            <h3 class="m-b-0 f-w-700 text-white"><?= totalSurat('surat_masuk') ?></h3>
                                        </div>
                                    </div>
                                    <?php if ($_SESSION['user']['level'] == "admin"): ?>

                                        <a href="<?= BASE_URL. "/pages.php?p=tambah-surat-masuk" ?>" class="btn btn-outline-light btn-sm btn-round">
                                            Tambah Data
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php $terbaru = dataTerbaru(); ?>
                        <div class="col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Terbaru</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover table-stripped">
                                        <thead>
                                            <tr>
                                                <th>Nomor Surat</th>
                                                <th>Pengirim</th>
                                                <th>Kepada</th>
                                                <th>Tanggal</th>
                                                <th>Tipe</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($terbaru as $data): ?>

                                                <tr>
                                                    <td><?= $data['nomor_surat'] ?></td>
                                                    <td><?= $data['pengirim'] ?></td>
                                                    <td><?= $data['kepada'] ?></td>
                                                    <td><?= hariIni($data['tanggal']) ?></td>
                                                    <td>
                                                        <?= ($data['tipe'] == "surat_masuk") ? "<span class='badge badge-success'>Surat Masuk</span>" : "<span class='badge badge-danger'>Surat Keluar</span>" ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($data['tipe'] == "surat_masuk"): ?>

                                                            <a href="<?= BASE_URL. "/pages.php?p=detail-surat-masuk&id=".$data['id_surat_masuk'] ?>" class="btn btn-sm btn-success">
                                                                <i class="feather icon-eye"></i> Detail
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?= BASE_URL. "/pages.php?p=detail-surat-keluar&id=".$data['id_surat_keluar'] ?>" class="btn btn-sm btn-success">
                                                                <i class="feather icon-eye"></i> Detail
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
