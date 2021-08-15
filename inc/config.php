<?php
session_start();
error_reporting( E_ALL);
define('BASE_URL', 'http://localhost:8000/surat');
define('SERVER_NAME', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'surat_db');

$servername       = SERVER_NAME;
$username         = USER_NAME;
$password         = PASSWORD;
$database         = DATABASE;

// Create connection
$conn   = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function dataTerbaru()
{
	global $conn;
	$query  = "SELECT *, tanggal_masuk as tanggal FROM surat_masuk ORDER BY id_surat_masuk DESC LIMIT 5";
	$res    = $conn->query($query);
	$query2 = "SELECT *, tanggal_keluar as tanggal FROM surat_keluar ORDER BY id_surat_keluar DESC LIMIT 5";
	$res2   = $conn->query($query2);

	$data = [];

	while ($row = $res->fetch_assoc()) {
		$row['tipe'] = "surat_masuk";
		array_push($data, $row);
	}

	while ($row2 = $res2->fetch_assoc()) {
		$row2['tipe'] = "surat_keluar";
		array_push($data, $row2);
	}

	$tanggal = array_column($data, 'tanggal');
	array_multisort($tanggal, SORT_DESC, $data);

	return $data;
}

function totalSurat($table)
{
	global $conn;
	$query = "SELECT * FROM $table";
	$res = $conn->query($query);
	return $res->num_rows;
}

function getNomorSurat($table)
{
	global $conn;

	if ($table == "surat_masuk") {
		$id  = "id_surat_masuk";
		$tgl = "tanggal_masuk";
		$kd  = "SM";
	} else {
		$id  = "id_surat_keluar";
		$tgl = "tanggal_keluar";
		$kd  = "SK";
	}
	$bulan       = date('n');
	$tahun       = date('Y');
	$romawi      = getRomawi($bulan);

	$nomor       = "/".$kd."/".$romawi."/".$tahun;
	$query       = "SELECT MAX($id) as kode FROM $table WHERE MONTH($tgl) = '$bulan' ";
	$res         = $conn->query($query);
	$row         = $res->fetch_object();

	$kode        = $row->kode + 1;

	$nomor_surat = $kode.$nomor;
	return $nomor_surat;
}

function getWhere($table, $id, $val)
{
	global $conn;
	$query = "SELECT * FROM $table WHERE $id = '$val' ";
	$res   = $conn->query($query);
	$row   = $res->fetch_object();

	return $row;
}

function getRomawi($bln){
    switch ($bln){
	    case 1:
	        return "I";
	    	break;
	    case 2:
	        return "II";
	    	break;
	    case 3:
	        return "III";
	    	break;
	    case 4:
	        return "IV";
	    	break;
	    case 5:
	        return "V";
	    	break;
	    case 6:
	        return "VI";
	    	break;
	    case 7:
	        return "VII";
	    	break;
	    case 8:
	        return "VIII";
	    	break;
	    case 9:
	        return "IX";
	    	break;
	    case 10:
	        return "X";
	    	break;
	    case 11:
	        return "XI";
	    	break;
	    case 12:
	        return "XII";
	    	break;
    }
}

function isAuthenticated() { return $_SESSION['auth']; }

function showAlert($type, $msg, $location)
{
	/*
		TYPE
		success, error, warning
	*/
	echo  "
		<script type='text/javascript'>
			swal({
			  title: '$msg',
			  icon: '$type',
			  text: ' ',
			  button: false,
			  timer: 2000
		  }).then(() => {
			  window.location.href = '$location'
		  });
		</script>
	";
}

function login($username, $password)
{
	global $conn, $auth;

	$query = "SELECT * FROM users WHERE username = '$username'";
	$res   = $conn->query($query);
	$user  = $res->fetch_assoc();
	if ($res->num_rows > 0) {
		if (password_verify($password, $user['password'])) {
			$_SESSION['user'] = $user;
			$_SESSION['auth'] = TRUE;
			return TRUE;
		} else {
			$_SESSION['auth'] = FALSE;
			return FALSE;
		}
	} else {
		$_SESSION['auth'] = FALSE;
		return FALSE;
	}
}

function upload()
{
    $target_dir    = "uploads/";
    $target_file   = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if (file_exists($target_file)) {
		return false;
	}

	if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "xls" && $imageFileType != "xlsx") {
		return false;
	}

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		return true;
	} else {
		return false;
	}

}

function hariIni($tanggal)
{
	$bulan = array (
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$data = explode('-', $tanggal);

	// variabel data 0 = tanggal
	// variabel data 1 = bulan
	// variabel data 2 = tahun

	return $data[2] . ' ' . $bulan[ (int)$data[1] ] . ' ' . $data[0];
}

?>
