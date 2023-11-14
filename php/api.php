<?php  
require_once "koneksi.php";
if (function_exists($_GET['function'])) {
	$_GET['function']();
}

function get_user(){
	global $conn;
	$query = $conn->query("SELECT * FROM data_pengguna");
	while ($row=mysqli_fetch_object($query)) {
		$data[] = $row;
	}
	$response=array(
		'status'=> 1,
		'message' => 'Success',
		'data' => $data);
	header('Content-Type: application/json');
	echo json_encode($response);
}

function get_user_id(){
	global $conn;
	if (!empty($_GET["id"])) {
		$id = $_GET["id"];
	}
	$query = "SELECT * FROM data_pengguna WHERE id_pengguna = '$id'";
	$result = $conn->query($query);
	while ($row = mysqli_fetch_object($result)) {
		$data[] = $row;
	}
	if ($data) {
		$response = array(
			'status'=> 1,
			'message' => 'Success',
			'data' => $data);
	}else {
		$response = array(
			'status'=> 0,
			'message' => 'No Data Found');
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

// function update_user(){
// 	global $koneksi;
// 	if (!empty($_GET["id"])) {
// 		$id = $_GET["id"];
// 		$username = $_GET["username"];
// 		$password = $_GET["password"];
// 		$name = $_GET["name"];
// 	}
// 	$query = "UPDATE data_pengguna SET username = '$email', user_password = '$password', 
// 	user_fullname = '$name' WHERE id = $id";
// 	if ($result= mysqli_query($koneksi, $query)) {
// 		if ($result) {
// 			$response=array(
// 				'status' => 1,
// 				'message' => 'Update Success');
// 		}else{
// 			$response=array(
// 				'status' => 0,
// 				'message' => 'Update Failed');
// 		}
// 	}else{
// 		$response=array(
// 			'status' => 0,
// 			'message' => 'Wrong Parameter',
// 			'data' => $id,
// 			'query'=> $query);
// 	}
// 	header('Content-Type: application/json');
// 	echo json_encode($response);
// }

// function delete_user(){
// 	global $koneksi;
// 	$id = $_GET['id'];
// 	$query = "DELETE FROM user_detail WHERE id = $id";
// 	if (mysqli_query($koneksi, $query)) {
// 		$response=array(
// 				'status' => 1,
// 				'message' => 'Delete Success');
// 	}else{
// 		$response=array(
//     			'status' => 0,
//     			'message' => 'Delete Fail.',
//     			'message' => $query);
// 	}
// 	header('Content-Type: application/json');
// 	echo json_encode($response);
// }

// function insert_user(){
//     global $koneksi;
    
//     // Periksa apakah parameter yang diperlukan tersedia
//     if (!empty($_GET["email"]) && !empty($_GET["password"]) && !empty($_GET["name"])) {
//         $email = $_GET["email"];
//         $password = $_GET["password"];
//         $name = $_GET["name"];
//         $level = "2";
//         // Buat perintah SQL untuk memasukkan data baru ke dalam tabel
//         $query = "INSERT INTO user_detail (user_email, user_password, user_fullname, level) VALUES
//         		('$email', '$password', '$name', '$level')";
//         // Eksekusi perintah SQL
//         if (mysqli_query($koneksi, $query)) {
//             $response = array(
//                 'status' => 1,
//                 'message' => $query
//             );
//         } else {
//             $response = array(
//                 'status' => 0,
//                 'message' => 'Insert Failed'
//             );
//         }
//     } else {
//         $response = array(
//             'status' => 0,
//             'message' => 'Missing Parameters'
//         );
//     }
//     // Mengembalikan respons dalam format JSON
//     header('Content-Type: application/json');
//     echo json_encode($response);
// }

?>