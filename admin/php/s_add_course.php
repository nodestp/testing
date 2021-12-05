<?php
require("db.php");
$course = $_POST['course'];
$fee = $_POST['fee'];
$duration = $_POST['duration'];
$pic = $_FILES['pic'];

$location = $pic['tmp_name'];
$pic_name = $pic['name'];



$test = file_exists("../../course_pic/".$pic_name);


   if(!$test)
   {
    if(move_uploaded_file($location,"../../course_pic/".$pic_name))
    {
        $check = "SELECT * FROM course";
        $response = $db->query($check);
        if($response)
        {
            $store = "INSERT INTO course(pic,course,fee,duration)
            VALUES('$pic_name','$course','$fee','$duration')";

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
            $create_table = "CREATE TABLE course(
            id INT(11) NOT NULL AUTO_INCREMENT,
            pic VARCHAR(225),
            course VARCHAR(255),
            fee VARCHAR(255),
            duration VARCHAR(255),
            display VARCHAR(255) DEFAULT 'no',
            PRIMARY KEY(id)
            )";

            $response = $db->query($create_table);
            if($response)
            {
                $store = "INSERT INTO course(pic,course,fee,duration)
                VALUES('$pic_name','$course','$fee','$duration')";

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
   else{
       echo "already exist";
   }




?>