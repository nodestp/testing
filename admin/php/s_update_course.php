<?php

require("db.php");
$id = $_POST['course_id'];
$course = $_POST['course'];
$fee = $_POST['fee'];
$duration = $_POST['duration'];
$old_pic = $_POST['old_pic'];
$pic = $_FILES['pic'];

$location = $pic['tmp_name'];
$pic_name = $pic['name'];


if($pic_name == "")
{
    $sql = "UPDATE course SET course = '$course',fee = '$fee',duration = '$duration' WHERE id='$id'";
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
    if(unlink("../../course_pic/".$old_pic))
    {

        $test = file_exists("../../course_pic/".$pic_name);


        if(!$test)
        {
         if(move_uploaded_file($location,"../../course_pic/".$pic_name))
         {
            $sql = "UPDATE course SET pic='$pic_name',course = '$course',fee = '$fee',duration = '$duration' WHERE id='$id'";
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
            echo "data_store_failed";
         }
        }
         else
         {
            echo "already_exist";
         }
     
    }
    else
    {
        echo "delete_failed";
    }
  
}


?>