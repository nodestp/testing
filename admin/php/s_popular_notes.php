<?php
require("db.php");
$id = $_POST['id'];
$status = $_POST['status'];

$check = "UPDATE notes SET display = '$status' WHERE id = '$id'";

$response = $db->query($check);

if($response)
{
    echo "success";
}
else
{
    echo "failed";
}

?>