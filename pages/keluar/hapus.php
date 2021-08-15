<?php

require_once 'inc/dynamiccrud.php';
$obj  = new DynamicCrud();
$data = getWhere('surat_keluar', 'id_surat_keluar', $_GET['id']);
$file = "uploads/".$data->file;
$id   = ['id_surat_keluar' => $_GET['id']];

if (file_exists($file)) {
    unlink($file);
}
$delete = $obj->delete('surat_keluar', $id);
if ($delete) {
    showAlert('success', 'Data Berhasil Dihapus', 'pages.php?p=surat-keluar');
} else {
    showAlert('error', $delete, "pages.php?p=surat-keluar");
}
