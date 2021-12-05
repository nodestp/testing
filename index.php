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
  <link rel="stylesheet" media="all" href="css/skitter.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="css/owl.carousel.min.css">  
  
  
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="js/jquery.skitter.min.js"></script>

</head>
<body>
   <?php
    require('assets/header.php');
    ?>

<!-- Start Big Slider Coding -->

  <div class="skitter skitter-large" style="margin-top:80px;">
  <ul>
     <li>
      <a href="#horizontal"><img src="images/banner_one.jpg" class="horizontal" /></a>
    </li>
    <li>
      <a href="#horizontal"><img src="images/banner_two.jpg" class="horizontal" /></a>
    </li>
    <li>
      <a href="#tube"><img src="images/one.jpg" class="tube" /></a>
     </li>
    <li>
      <a href="#cubeRandom"><img src="images/two.jpg" class="cubeRandom" /></a>
     </li>
    <li>
      <a href="#horizontal"><img src="images/three.jpg" class="horizontal" /></a>
    </li>
  </ul>
</div>
  <!-- End Big Slider Coding -->

<div class="container">
<h1 class="text-center mt-4">Popular Courses</h1>
<div class="row">
  <?php
      require("assets/db.php");

      $sql = "SELECT * FROM course WHERE display = 'checked'";
      $response = $db->query($sql);
      while($data = $response->fetch_assoc())
      {
        echo '<div class="col-md-3 p-4 wow__animated wow__zoomInUp">
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


<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-e768b9dc-2d82-49c1-b081-910d7b0071d7"></div>

<h1 class="text-center mt-4">Popular Notes</h1>
<div class="row">
  <?php
      require("assets/db.php");

      $sql = "SELECT * FROM notes WHERE display = 'checked'";
      $response = $db->query($sql);
      while($data = $response->fetch_assoc())
      {
        echo '<div class="col-md-3 p-4">
        <div class="card popular_notes" cid="'.$data['id'].'">
        
        <div class="card-body p-2">
        <img src="notes_pic/'.$data['pic'].'" width="100%" height="150">
        </div>
        <div class="card-footer text-center">
        <h5 class="text-center p-0 m-0">'.$data['notes_name'].'</h5>
        <a href="notes_file/'.$data['notes_file'].'" download><button class="btn btn-primary mt-2">Download</button></a>
        
        </div>
        </div>
      </div>';
      }
  ?>
</div>





<h1 class="text-center mt-4">Our Gallery</h1>
</div>

<div class="owl-carousel owl-theme">
  <div> <img src="gallery/one.jpg" width="23%" height="300"> </div>
  <div> <img src="gallery/two.jpg" width="23%" height="300"> </div>
  <div> <img src="gallery/three.jpeg" width="23%" height="300"> </div>
  <div> <img src="gallery/four.jpg" width="23%" height="300"> </div>
  <div> <img src="gallery/five.jpeg" width="23%" height="300"> </div>
  <div> <img src="gallery/one.jpg" width="23%" height="300"> </div>
  <div> <img src="gallery/two.jpg" width="23%" height="300"> </div>
  <div> <img src="gallery/three.jpeg" width="23%" height="300"> </div>
  <div> <img src="gallery/four.jpg" width="23%" height="300"> </div>
  <div> <img src="gallery/five.jpeg" width="23%" height="300"> </div>
  
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

    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:false,
            loop:false
        }
    }
})
});
    
  </script>

  <script src="js/owl.carousel.min.js"></script>

    
    <script>
	 
    $(document).ready(function(){
      $(".skitter-large").skitter({
        navigation: true,
        dots:false,
        theme:"minimalist"
      });
    });	    
   
    </script>
<?php
require("assets/talk.php");
?>

</body>
</html>