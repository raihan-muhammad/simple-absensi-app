<?php
include "../koneksi.php";
$id = $_POST['id'];

$tipe = $_FILES['approval_unit']['name'];
$tipe = pathinfo($tipe, PATHINFO_EXTENSION);
$approval_unit = rand().".".$tipe;
$lokasi = $_FILES['approval_unit']['tmp_name'];
$folder="../assets/images/approval/";
move_uploaded_file($lokasi,$folder.$approval_unit);

$query = $conn->prepare("UPDATE tb_lembur SET approval_unit = '$approval_unit' WHERE id_lembur = '$id' ");
$query->execute();
if($query) {
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to save data', 'status'=>'0']);
}

?>