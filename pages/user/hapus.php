<?php

require_once 'inc/dynamiccrud.php';
$obj  = new DynamicCrud();
$data = getWhere('users', 'id_user', $_GET['id']);
$id   = ['id_user' => $_GET['id']];

$delete = $obj->delete('users', $id);
if ($delete) {
    showAlert('success', 'Data Berhasil Dihapus', 'pages.php?p=manajemen-user');
} else {
    showAlert('error', $delete, "pages.php?p=manajemen-user");
}
