<?php
    require("db.php");
    $cid = $_POST['cid'];
    $back = [];
    $sql = "SELECT * FROM content WHERE cid = '$cid'";
    $response = $db->query($sql);
    while($data = $response->fetch_assoc())
    {
        array_push($back,$data);
    }

    echo json_encode($back);
?>