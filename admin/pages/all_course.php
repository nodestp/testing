<div class="msg">

</div>

<table class="table table-hover">
    <thead>
      <tr style="font-size:20px;">
        <th class="text-center">Course Id</th>
        <th>Course Name</th>
        <th>Fee</th>
        <th>Duration</th>
        <th>Featured</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
    require("../php/db.php");
    $data = "SELECT * FROM course";
    $response = $db->query($data);
    while($data = $response->fetch_assoc())
    {
        echo ' <tr style="font-size:18px;">
        <td class="text-center">'.$data['id'].'</td>
        <td>'.$data['course'].'</td>
        <td>'.$data['fee'].'</td>
        <td>'.$data['duration'].'</td>
        <td> 

        <label class="switch">
        <input type="checkbox" '.$data['display'].' class="of_btn">
        <span class="slider round"></span>
        </label>
        
      
      </td>

      <td><i class="fas fa-edit my_edit_btn text-success" style="cursor:pointer;"></i></td>
      <td><i class="fas fa-trash my_del_btn text-danger" style="cursor:pointer;"></i></td>
      </tr>';
    }
    ?>
     
    
    </tbody>
  </table>

 


   <!-- The Modal -->
   <div class="modal animate__animated animate__slideInDown animate__faster 800ms">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="c_img"></div>
            <form class="edit_course_frm">
            <div class="form-group">
            <input type="hidden" name="old_pic" class="old_pic">
            <input type="hidden" required="required" class="course_id" name="course_id">
            </div>
            <div class="form-group">
            <input type="file" accept="image/*" id="pic" name="pic" class="form-control pic">
            </div>
            <div class="form-group">
            
            <input type="text" required="required"  name="course" class="form-control course" placeholder="Course Name">
            </div>
            <div class="form-group">
            <input type="text" required="required"  name="fee" class="form-control fee" placeholder="Fees">
            </div>
            <div class="form-group">
            
            <input type="text" required="required"  name="duration" class="form-control duration" placeholder="Duration">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger ubtn">Update Course</button>
            </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->
        
      </div>
    </div>
  </div>
  

<script>

$(document).ready(function(){
  $(".of_btn").each(function(){
    $(this).click(function(){
      var parent = this.parentElement.parentElement.parentElement;
      var all_td = parent.getElementsByTagName('td');
      var course_id = all_td[0].innerHTML;
      var status;
      if(this.checked == false)
      {
        status = "off";
      }
      else{
        status = "checked";
      }

      $.ajax({
        type : "POST",
        url : "php/s_popular_course.php",
        data : {
          id : course_id,
          status : status
        },
        success : function(response)
        {
         if(response.trim() == "success")
         {
          $(".msg").css({
                "width":"100%",
                "height":"100vh",
                "background-color":"rgba(0,0,0,0.5)",
                "position":"fixed",
                "top":"0",
                "left":"0",
                "z-index":"10000000",
                "display":"flex",
                "align-items":"center",
                "justify-content":"center"
              });
              $(".modal").modal("hide");
             var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-success shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
            div.innerHTML = "<i class='fas fa-check-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'> Update Successfully !</h2>"; 
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
              });},1000);
         }
         else
         {
          $(".msg").css({
                "width":"100%",
                "height":"100vh",
                "background-color":"rgba(0,0,0,0.5)",
                "position":"fixed",
                "top":"0",
                "left":"0",
                "z-index":"10000000",
                "display":"flex",
                "align-items":"center",
                "justify-content":"center"
              });
              $(".modal").modal("hide");
             var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-danger shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
            div.innerHTML = "<i class='fas fa-times-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'> Update Failed !</h2>"; 
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
              });},1000);
         }
        }
      });
    })
  });







});


$(document).ready(function(){
  $(".my_edit_btn").each(function(){
    $(this).click(function(){
      $(".edit_course_frm").trigger("reset");
      var parent = this.parentElement.parentElement;
      var all_td = parent.getElementsByTagName('td');
      var course_id = all_td[0].innerHTML;

      $.ajax({
        type : "POST",
        url : "php/s_course_return_data.php",
        data : {
          id : course_id
        },
        success: function(response)
        {
            var all_course_data = JSON.parse(response);
            $(".course_id").val(all_course_data[0].id);
            $(".course").val(all_course_data[0].course);
            $(".fee").val(all_course_data[0].fee);
            $(".duration").val(all_course_data[0].duration);
            $(".old_pic").val(all_course_data[0].pic);
            $(".c_img").html("<img src='../course_pic/"+all_course_data[0].pic+"' width='100%'>");

            $(".pic").on('change',function(){
              var file = this.files[0];
             var url =  URL.createObjectURL(file);
             $(".c_img").html("<img src='"+url+"' width='100%'>");
            });
        }
      });
      $(".modal").modal("show");

      $(".edit_course_frm").submit(function(e){
        e.preventDefault();
        $.ajax({
          type:"POST",
          url : "php/s_update_course.php",
          data : new FormData(this),
          contentType : false,
          processData : false,
          cache : false,
          success: function(response)
          {
            
            if(response.trim() == "success")
            {
              $(".msg").css({
                "width":"100%",
                "height":"100vh",
                "background-color":"rgba(0,0,0,0.5)",
                "position":"fixed",
                "top":"0",
                "left":"0",
                "z-index":"10000000",
                "display":"flex",
                "align-items":"center",
                "justify-content":"center"
              });
              $(".edit_course_frm").trigger("reset");
              $(".modal").modal("hide");
             var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-success shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
            div.innerHTML = "<i class='fas fa-check-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'> Update Successfully !</h2>"; 
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
              });},1000);
              setTimeout(function(){
                 $("[page-link=all_course]").click(); 
              },1000);
              
            }
            else
         {
          $(".msg").css({
                "width":"100%",
                "height":"100vh",
                "background-color":"rgba(0,0,0,0.5)",
                "position":"fixed",
                "top":"0",
                "left":"0",
                "z-index":"10000000",
                "display":"flex",
                "align-items":"center",
                "justify-content":"center"
              });
              $(".edit_course_frm").trigger("reset");
              $(".modal").modal("hide");
             var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-danger shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
            div.innerHTML = "<i class='fas fa-times-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'> Update Failed !"+response+"</h2>"; 
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
              });},1000);
         }

          }
        });
      });


    });
  });
});


$(document).ready(function(){
  $(".my_del_btn").each(function(){
    $(this).click(function(){
      var parent = this.parentElement.parentElement;
      var all_td = parent.getElementsByTagName('td');
      var course_id = all_td[0].innerHTML;
     
      $.ajax({
        type:"POST",
        url : "php/s_del_course.php",
        data : {
          c_id : course_id
        },
        success: function(response)
        {

          if(response.trim() == "success")
            {
              parent.className = "animate__animated animate__bounceOut";
              setTimeout(function(){
                parent.remove();
              },1000);
              
           
            }
            else
         {
          $(".msg").css({
                "width":"100%",
                "height":"100vh",
                "background-color":"rgba(0,0,0,0.5)",
                "position":"fixed",
                "top":"0",
                "left":"0",
                "z-index":"10000000",
                "display":"flex",
                "align-items":"center",
                "justify-content":"center"
              });
              $(".modal").modal("hide");
             var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-danger shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
            div.innerHTML = "<i class='fas fa-times-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'> Delete Failed !</h2>"; 
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
              });},1000);
         }

          }
        
      });
    });
  });
});
</script>