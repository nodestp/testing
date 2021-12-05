<?php
require("db.php");

$id = $_POST['c_id'];

$del_sql = "SELECT * FROM course WHERE id='$id'";
$response = $db->query($del_sql);
$allData = $response->fetch_assoc();

$old_pic = $allData['pic'];


if(unlink("../../course_pic/".$old_pic))
{
	
	$sql = "DELETE FROM course WHERE id='$id'";
	$response = $db->query($sql);
	if($response)
	{
	    echo "success";
	}
	else
	{
	     echo "failed";
	}		


	
}
else
{
	echo "course pic not deleted";
}

?>