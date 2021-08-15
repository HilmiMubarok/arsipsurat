<?php

require_once 'inc/dynamiccrud.php';
$obj  = new DynamicCrud();
$data = getWhere('surat_masuk', 'id_surat_masuk', $_GET['id']);
$file = "uploads/".$data->file;
$id   = ['id_surat_masuk' => $_GET['id']];

if (file_exists($file)) {
    unlink($file);
}
$delete = $obj->delete('surat_masuk', $id);
if ($delete) {
    showAlert('success', 'Data Berhasil Dihapus', 'pages.php?p=surat-masuk');
} else {
    showAlert('error', $delete, "pages.php?p=surat-masuk");
}
