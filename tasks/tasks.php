<?php require "header.php" ?>
</head>
<body>
<form action="insert.php" method="post">
<input type="text" name="mytask" placeholder="Enter a tasks">
<input type="submit" value="submit" name="addbtn">
</form>
<?php
$conn = new mysqli("localhost", "root", "shiberowakhu", "Personnal");
if($conn->connect_error){
	echo "error in connection: ".$conn->connect_error;
}else{
	if($result = $conn->query("select task_id, task_name, done from tasks order by done")){
		if($result->num_rows > 0){
			$i = 0;
			echo "<table><thead><tr><th>id</th><th>task</th><th>status</th></tr></thead><tbody>";
			while($row = $result->fetch_array()){
				$i = $i + 1;
				echo "<tr><th>".$i."</th><td>".$row['task_name']."</td><td>";
				if($row['done'] == 0){
					echo "<a href='sqltask.php?id=".$row["task_id"]."&action=taskcomplete' class='inc'>incomplete</a>";
				}else{
					echo "<span class='tcomp'>complete</span>";
				}
				echo "</td><td><a href='sqltask.php?id=".$row['task_id']."&action=taskdelete' class='mydel'>Delete</a></td></tr>";
			}
			echo "<tbody></table>";
		}else{
			echo "<h2>There is no data in the database</h2>";
		}
	}else{
		echo "error in getting the data";
	}
}

?>

</body>
