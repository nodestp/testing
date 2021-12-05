<?php
require("db.php");

$id = $_POST['c_id'];

$del_sql = "SELECT * FROM notes WHERE id='$id'";
$response = $db->query($del_sql);
$allData = $response->fetch_assoc();

$old_pic = $allData['pic'];
$old_notes = $allData['notes_file'];

if(unlink("../../notes_pic/".$old_pic))
{
	if(unlink("../../notes_file/".$old_notes))
	{
		
			$sql = "DELETE FROM notes WHERE id='$id'";
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
	echo "notes file not deleted";
	}
}
else
{
	echo "notes pic not deleted";
}

?>