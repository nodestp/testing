<?php
require("db.php");
$notes_name = $_POST['notes_name'];

$pic = $_FILES['pic'];
$location = $pic['tmp_name'];
$pic_name = $pic['name'];

$notes_file = $_FILES['notes_file'];
$notes_location = $notes_file['tmp_name'];
$notes_file_name = $notes_file['name'];

$test = file_exists("../../notes_pic/".$pic_name);


   if(!$test)
   {

    $test_file = file_exists("../../notes_file/".$notes_file_name);
    if(!$test_file)
    {

        if(move_uploaded_file($location,"../../notes_pic/".$pic_name))
        {

            if(move_uploaded_file($notes_location,"../../notes_file/".$notes_file_name))
            {

            $check = "SELECT * FROM notes";
            $response = $db->query($check);
            if($response)
            {
                $store = "INSERT INTO notes(pic,notes_name,notes_file)
                    VALUES('$pic_name','$notes_name','$notes_file_name')";
    
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
                $create_table = "CREATE TABLE notes(
                id INT(11) NOT NULL AUTO_INCREMENT,
                pic VARCHAR(225),
                notes_name VARCHAR(255),
                notes_file VARCHAR(255),
                display VARCHAR(255) DEFAULT 'no',
                PRIMARY KEY(id)
                )";
    
                $response = $db->query($create_table);
                if($response)
                {
                    $store = "INSERT INTO notes(pic,notes_name,notes_file)
                    VALUES('$pic_name','$notes_name','$notes_file_name')";
    
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

            }
        }

    }
    else{
        echo "Notes already exist";
    }

   
   }
   else{
       echo "already exist";
   }




?>