<?php

require("db.php");
$id = $_POST['course_id'];
$notes_name = $_POST['notes_name'];

$old_file = $_POST['old_notes_file'];
$new_file = $_FILES['notes_file'];
$file_location = $new_file['tmp_name'];
$file_name = $new_file['name'];


$old_pic = $_POST['old_pic'];
$pic = $_FILES['pic'];
$location = $pic['tmp_name'];
$pic_name = $pic['name'];


if($pic_name == "" && $file_name == "")
{
    $sql = "UPDATE notes SET notes_name = '$notes_name' WHERE id='$id'";
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
else if($file_name == "")
{
    if(unlink("../../notes_pic/".$old_pic))
    {

        $test = file_exists("../../notes_pic/".$pic_name);


        if(!$test)
        {
         if(move_uploaded_file($location,"../../notes_pic/".$pic_name))
         {
            $sql = "UPDATE notes SET pic='$pic_name',notes_name = '$notes_name' WHERE id='$id'";
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
else if($pic_name == "")
{
    if(unlink("../../notes_file/".$old_file))
    {

        $test = file_exists("../../notes_file/".$file_name);


        if(!$test)
        {
         if(move_uploaded_file($file_location,"../../notes_file/".$file_name))
         {
            $sql = "UPDATE notes SET notes_name = '$notes_name',notes_file = '$file_name' WHERE id='$id'";
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

else 
{
    if(unlink("../../notes_file/".$old_file))
    {

        if(unlink("../../notes_pic/".$old_pic))
        {

            $file_test = file_exists("../../notes_file/".$file_name);
            $pic_test = file_exists("../../notes_pic/".$pic_name);

            if(!$file_test)
            {
                if(!$pic_test)
                {

                    if(move_uploaded_file($file_location,"../../notes_file/".$file_name))
                        {
                            
                            if(move_uploaded_file($location,"../../notes_pic/".$pic_name))
                                {

                                    $sql = "UPDATE notes SET pic='$pic_name',notes_name = '$notes_name',notes_file = '$file_name' WHERE id='$id'";
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
                                echo "notes pic data_store_failed";
                                }
                        }
                        else
                        {
                           echo "notes file data_store_failed";
                        }

                }
                else
                {
                   echo "notes pic already_exist";
                }

            }
            else
            {
               echo "notes file already_exist";
            }

        }
        else
        {
            echo "notes pic delete_failed";
        }
    }
    else
    {
        echo "notes file delete_failed";
    }
}


?>