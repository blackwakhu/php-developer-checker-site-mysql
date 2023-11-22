<?php

date_default_timezone_set("Africa/Nairobi");

if(isset($_POST["addbtn"])){
	$task = $_POST["mytask"];
	if($task == ""){
	}else{
		$conn = new mysqli("localhost", "root", "shiberowakhu", "Personnal");
		if($conn->connect_error){
			die("connection failed: ".$conn->connect_error);
		}else{
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$sql = "insert into tasks(task_name, start_date, start_time) values('$task', '$date', '$time');";
			if($conn->query($sql) === TRUE){
				header("location: tasks.php");
			}else{
				echo "error: ".$sql."<br>".$conn->error;
			}
		}$conn->close();
	}
}
