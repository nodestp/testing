<?php
require("db.php");
$c_id = $_POST['id'];
$c_data = [];
$sql = "SELECT * FROM notes WHERE id = '$c_id'";

$response = $db->query($sql);

while($data = $response->fetch_assoc())
{
    array_push($c_data,$data);
}

echo json_encode($c_data);


?>