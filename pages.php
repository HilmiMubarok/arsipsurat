<?php

require_once 'inc/config.php';
require_once 'templates/header.php';
require_once 'templates/navbar.php';
require_once 'templates/sidebar.php';

switch ($_GET['p']) {

	case 'login':
		header("location:pages/auth/login.php");
		break;

	case 'logout':
		header("location:pages/auth/logout.php");
		break;

	case 'surat-masuk':
		require_once 'pages/masuk/index.php';
		break;

	case 'tambah-surat-masuk':
		require_once 'pages/masuk/tambah.php';
		break;

	case 'detail-surat-masuk':
		require_once 'pages/masuk/detail.php';
		break;

	case 'edit-surat-masuk':
		require_once 'pages/masuk/edit.php';
		break;

	case 'hapus-surat-masuk':
		require_once 'pages/masuk/hapus.php';
		break;

	case 'surat-keluar':
		require_once 'pages/keluar/index.php';
		break;

	case 'tambah-surat-keluar':
		require_once 'pages/keluar/tambah.php';
		break;

	case 'detail-surat-keluar':
		require_once 'pages/keluar/detail.php';
		break;

	case 'edit-surat-keluar':
		require_once 'pages/keluar/edit.php';
		break;

	case 'hapus-surat-keluar':
		require_once 'pages/keluar/hapus.php';
		break;

	case 'setting':
		require_once 'pages/setting/index.php';
		break;

	case 'manajemen-user':
		require_once 'pages/user/index.php';
		break;

	case 'tambah-user':
		require_once 'pages/user/tambah.php';
		break;

	case 'edit-user':
		require_once 'pages/user/edit.php';
		break;

	case 'hapus-user':
		require_once 'pages/user/hapus.php';
		break;

	case 'dashboard':
		if (isAuthenticated() == FALSE) {
			header("location:pages.php?p=login");
		} else {
			require_once 'dashboard.php';
			break;
		}

	default:
		header("location:index.php");
		break;
}

require_once 'templates/footer.php';
