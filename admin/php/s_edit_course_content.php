<?php

    require("db.php");

    $course_id = $_POST['id'];
    $old_data = $_POST['old_data'];
    $new_data = $_POST['new_data'];

   $sql = "UPDATE content set content = '$new_data' WHERE content = '$old_data' AND cid = '$course_id'";

   $response = $db->query($sql);

    if($response)
    {
        echo "success";
    }
    else{
        echo "failed".$db->error();
    }
   


?>