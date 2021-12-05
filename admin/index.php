
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 aside p-0">
                <ul class="list-group ">
                <li class="list-group-item rounded-0 aside_menu" page-link="add_course">Add Course</li>
                <li class="list-group-item rounded-0 aside_menu" page-link="all_course">All Course</li>
                <li class="list-group-item rounded-0 aside_menu" page-link="add_course_details">Add Sub - Course</li>
                <li class="list-group-item rounded-0 aside_menu" page-link="add_notes"> Add Notes</li>
                <li class="list-group-item rounded-0 aside_menu" page-link="all_notes">All Notes</li>
                </ul>
            </div>
            <div class="col-10 content">

            </div>
        </div>
    </div>
    <div class="p_msg">

</div>
    <script>
    $(document).ready(function(){
        $(".aside_menu").each(function(){
            $(this).click(function(){
                $(".content").html("");
                var link = $(this).attr("page-link");
                $.ajax({
                    type : "POST",
                    url : "pages/"+link+".php",
                    beforeSend : function(){
                        $(".p_msg").css({
                "width":"100%",
                "height":"100vh",
                "background-color":"rgba(0,0,0,0.5)",
                "position":"absolute",
                "top":"0",
                "left":"0",
                "z-index":"10000000",
                "display":"flex",
                "align-items":"center",
                "justify-content":"center"
              });
              var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-primary shadow-sm text-center";
            div.innerHTML = "<i class='fas fa-circle-notch fa-spin my-3' style='font-size:100px;'></i> <h2 class='text-center'>Loading...</h2>"; 
            $(".p_msg").append(div);
            
                    },
                    success : function(response)
                    {
                        $(".content").append(response);
                        $(".p_msg").html(" ");  
            $(".p_msg").css({
                "width":"",
                "height":"",
                "background-color":"",
                "position":"",
                "top":"",
                "left":"",
                "z-index":"",
                "display":"",
                "align-items":"",
                "justify-content":""
              });
                    }
                });

            });
        });
    });

    
    </script>
    
</body>
</html>