<?php
    require("db.php");

   $id = $_POST['del_course_id'];
   $cc = $_POST['cc'];

    $sql = "DELETE FROM content WHERE cid='$id' AND content='$cc'";
    $response = $db->query($sql);
    if($response)
    {
        echo "success";
    }
    else
    {
        echo "failed".$db->error();
    }

?>