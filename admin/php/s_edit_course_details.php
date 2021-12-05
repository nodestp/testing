<?php

require("db.php");
$all_data = [];
$cid = $_POST['course_id'];

$sql = "SELECT * FROM content WHERE cid = '$cid'";
$response = $db->query($sql);

while($data=$response->fetch_assoc()){
    array_push($all_data,$data['content']);
}

echo json_encode($all_data);

?>