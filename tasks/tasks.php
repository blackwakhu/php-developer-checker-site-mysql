<?php 
	require "header.php";
	include "myfunctions.php";
?>
<div>
<?php
	//	$conn = new mysqli("localhost", "root", "shiberowakhu", "Personnal");
	$conn = getConnection();
	if($conn->connect_error){	
		echo "<p>error in connection: $conn->connect_error </p>";	
	}else{
		if($result = $conn->query("select done from tasks")){
			if($result->num_rows > 0){
				$i = 0;
				$c = 0;
				$f = 0;
				while($row=$result->fetch_array()){
					$i = $i + 1;
					if($row['done'] == 0){
						$f = 1 + $f;
					}else{
						$c = 1 + $c;
					}
				}
				$c_p = $c/$i * 100;
				$f_p = $f/$i * 100;
				echo "<table><thead><tr><th></th><th>Number</th><th>Percentage</th></thead><tbody>";
				echo "<tr><th>total</th><td>$i</td><td>100%</td></tr>";
				echo "<tr><th>complete</th><td>$c</td><td>$c_p%</td></tr>";
				echo "<tr><th>incomplete</th><td>$f</td><td>$f_p%</td></tr>";
				echo "</tbody></table>";
			}else{
				echo "<p>you do not have any record in the database</p>";
			}
		}else{
			echo "<p>Error in getting the data</p>";
		}
	}
?>
</div>
<div>
	<form action="insert.php" method="post">
		<input type="text" name="mytask" placeholder="Enter a tasks">
		<input type="submit" value="submit" name="addbtn">
	</form>
</div>
<div>
	<?php
		$conn = new mysqli("localhost", "root", "shiberowakhu", "Personnal");
		if($conn->connect_error){
			echo "<p>error in connection: ".$conn->connect_error."</p>";
		}else{
			if($result = $conn->query("select task_id, task_name, done from tasks order by done")){
				if($result->num_rows > 0){
					$i = 0;
					echo "<table><thead><tr><th>id</th><th>task</th><th>status</th></tr></thead><tbody>";
					while($row = $result->fetch_array()){
						$i = $i + 1;
						echo "<tr><th>".$i."</th><td><a href='detail.php?id=".$row['task_id']."'>".$row['task_name']."</a></td><td>";
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
</div>

<?php require "footer.php" ?>


