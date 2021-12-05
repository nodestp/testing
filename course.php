<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunshine | Institute Of Computer Education</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


</head>
<body>
    <?php
    require('assets/header.php');
    ?>



<div class="container" style="margin-top:130px;">
<h1 class="text-center mt-4">Our Courses</h1>
<div class="row">
<?php
      require("assets/db.php");

      $sql = "SELECT * FROM course";
      $response = $db->query($sql);
      while($data = $response->fetch_assoc())
      {
        echo '<div class="col-md-3 p-4">
        <div class="card popular_course" cid="'.$data['id'].'">
        <div class="card-header">
        <h4 class="text-center p-0 m-0">'.$data['course'].'</h4>
        </div>
        <div class="card-body p-2">
        <img src="course_pic/'.$data['pic'].'" width="100%" height="150">
        </div>
        <div class="card-footer">
        
        <p class="text-center p-0 m-0" style="font-size:20px;">Duration : '.$data['duration'].'</p>
        <p class="text-center p-0 m-0" style="font-size:20px;">Fee : '.$data['fee'].'</p>
        </div>
        </div>
      </div>';
      }
  ?>
</div>
</div>

<?php
require("assets/footer.php")
?>

      <!-- The Modal -->
   <div class="modal animate__animated animate__zoomIn animate__faster 500ms">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-danger">
          <h2 class="modal-title text-white">Course Content</h2>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
            
        </div>
        
        <!--Modal footer -->
         <div class="modal-footer bg-danger">
          <button type="button" class="btn btn-danger border border-white" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div> 

  <script>
    $(document).ready(function(){
      $(".popular_course").each(function(){
        $(this).click(function(){
          $(".modal-body").html(" ");
          var c_id = $(this).attr("cid");
          $.ajax({
            type : "POST",
            url : "assets/s_course_content_return.php",
            data : {
              cid : c_id
            },
            success : function(response){
              var all_course_data = JSON.parse(response);
              var i;
              for(i=0;i<all_course_data.length;i++)
              {
                $(".modal-body").append("<p style='font-size:20px;'>"+all_course_data[i].content+"</p><hr>");
                $(".modal").modal("show");
              }
            }
          });
        });
      });
    });
  </script>

<?php
require("assets/talk.php")
?>
</body>
</html>