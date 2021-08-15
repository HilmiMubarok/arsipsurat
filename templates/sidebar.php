<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="nav-list">
                <div class="pcoded-inner-navbar main-menu">
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="">
                            <a href="<?= BASE_URL ?>" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-home"></i>
                                </span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <div class="pcoded-navigation-label" menu-title-theme="Surat">
                        Surat
                    </div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="">
                            <a href="<?= BASE_URL . '/pages.php?p=surat-masuk' ?>" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-file-plus"></i>
                                </span>
                                <span class="pcoded-mtext">Surat Masuk</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?= BASE_URL . '/pages.php?p=surat-keluar' ?>" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-file-minus"></i>
                                </span>
                                <span class="pcoded-mtext">Surat Keluar</span>
                            </a>
                        </li>
                    </ul>
                    <?php if ($_SESSION['user']['level'] == "admin"): ?>
                    <div class="pcoded-navigation-label" menu-title-theme="App">
                        Users
                    </div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li>
                            <a href="<?= BASE_URL. '/pages.php?p=manajemen-user' ?>" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-users"></i>
                                </span>
                                <span class="pcoded-mtext">Manajemen User</span>
                            </a>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <div class="pcoded-navigation-label" menu-title-theme="App">
                        App
                    </div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li>
                            <a href="<?= BASE_URL. '/pages/auth/logout.php' ?>" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-log-out"></i>
                                </span>
                                <span class="pcoded-mtext">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
