<?php
echo "hello.php";
date_default_timezone_set("Africa/Nairobi");
$date = date("Y-m-d");
$time = date("H:i:s");
echo $time;

$conn = new mysqli("localhost", "root", "shiberowakhu", "Personnal");

function completeTask($id, $conn, $date, $time){
	$sql = "update tasks set stop_date = '$date', stop_time='$time', done = 1 where task_id=$id";
	if($conn->query($sql) === TRUE){
		$conn->close();
		header("location: tasks.php");
	}else{
		echo "error occured in sql .$sql <br> $conn->error";
	}
}

function deleteTask($id, $conn){
	$sql = "delete from tasks where task_id = $id";
	if($conn->query($sql) === TRUE){
		$conn->close();
		header("location: tasks.php");
	}else{
		echo "error occured in sql $sql <br> $conn->error";
	}
}

if ($_GET["action"] === "taskcomplete"){
	completeTask($_GET["id"], $conn, $date, $time);
}
if($_GET["action"] === "taskdelete"){
	deleteTask($_GET["id"], $conn);
}
?>
