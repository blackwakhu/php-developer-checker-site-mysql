<?php 
function getConnection(){
	return new mysqli("localhost", "root","shiberowakhu","Personnal");
}

/*function getstats(){
	$conn = getConnection();
	$data = array("total" => 0, "complete" => 0, "incomplete" => 0, "%complete"=> 0, "%incomplete" => 0);

	if($result = $conn->query("select done from tasks")){
		if($results->num_rows > 0){
			if($count = $conn->query("select count(done) from tasks where done = 0")){

			}
		}
	}

*/

function getIndividualdata($id){
	$conn = getConnection();
	
