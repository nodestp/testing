<div class="msg">

</div>
<h2 class="my-4 text-center">Add Course</h2>
<hr>
<form class="add_course_frm">
<div class="form-group">
    <label for="pic">Upload Course Pic</label>
    <input type="file" required="required" accept="image/*" id="pic" name="pic" class="form-control">
    </div>
    <div class="form-group">
    <label for="course">Enter Course Name</label>
    <input type="text" required="required" id="course" name="course" class="form-control">
    </div>
    <div class="form-group">
    <label for="fee">Enter Fees</label>
    <input type="text" required="required" id="fee" name="fee" class="form-control">
    </div>
    <div class="form-group">
    <label for="duration">Enter Duration</label>
    <input type="text" required="required" id="duration" name="duration" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-danger ac_btn">Add Course</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $(".add_course_frm").submit(function(e){
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "php/s_add_course.php",
                data : new FormData(this),
                processData : false,
                contentType :false,
                cache :false,
                beforeSend : function(){
                    $(".ac_btn").html("Please Wait...");
                },
                success : function(response){
                    $(".ac_btn").html("Add Course");
                    if(response.trim() == "success")
            {
                $(".ac_btn").html("Add Course");
              $(".msg").css({
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
            div.className = "shadow-lg alert alert-success shadow-sm animate__animated animate__bounceIn animate__faster text-center";
            div.innerHTML = "<i class='fas fa-check-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'>Course Add Successfully !</h2>"; 
            $(".msg").append(div);
            setTimeout(function(){$(".msg").html(" ");  
            $(".msg").css({
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
              $(".add_course_frm").trigger('reset');
              },1000);
            }
            else
         {
            console.log(response);
          $(".msg").css({
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
            div.className = "shadow-lg alert alert-danger shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
            div.innerHTML = "<i class='fas fa-times-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'>!</h2>"; 
            $(".msg").append(div);
            setTimeout(function(){$(".msg").html(" ");  
            $(".msg").css({
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
            $(".add_course_frm").trigger('reset');
        },1000);
         }
                }
            });
        });
    });
</script>

