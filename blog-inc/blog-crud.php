<?php
error_reporting(0);
//$connection= new PDO("mysql:host=localhost;dbname=vuemysql",'root','');
$db=new mysqli('localhost', 'root', '', 'vuemysql');
$recievedData=json_decode(file_get_contents('php://input'));

$data=[];

if ($recievedData->action==='fetchallblogs') {
	$sql="SELECT * FROM `users` ORDER BY `id` DESC";
	$result=$db->query($sql);
	while ($row=$result->fetch_assoc()) {
		if (!empty($row)) {
			$data[]=$row;
		}
	}
	echo json_encode($data);
}

?>
