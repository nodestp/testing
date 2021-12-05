<?php
require("db.php");
$cid = $_POST['cid'];
$content = $_POST['content'];


$check = "SELECT * FROM content";
$response = $db->query($check);
if($response)
{
    $store = "INSERT INTO content(cid,content)
    VALUES('$cid','$content')";

    $response = $db->query($store);
    if($response)
    {
        echo "success";
    }
    else
    {
        echo "failed to store".$db->error();
    }
}
else{
    $create_table = "CREATE TABLE content(
    id INT(11) NOT NULL AUTO_INCREMENT,
    cid VARCHAR(225),
    content VARCHAR(255),
    PRIMARY KEY(id)
    )";

    $response = $db->query($create_table);
    if($response)
    {
        $store = "INSERT INTO content(cid,content)
        VALUES('$cid','$content')";

        $response = $db->query($store);
        if($response)
        {
            echo "success";
        }
        else
        {
            echo "failed to store".$db->error();
        }
    }
    else
    {
        echo "failed".$db->error();
    }
}



?>