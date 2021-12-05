<div class="msg">

</div>
<h2 class="my-4 text-center">Add Course Details</h2>
<hr>
<form class="course_details_frm">
    <div class="form-group">
    <select name="cid" class="form-control cid">
    <option value="none">Select Course Id</option>
    <?php
        require("../php/db.php");
        $data = "SELECT * FROM course";
        $response = $db->query($data);
        while($data = $response->fetch_assoc())
        {
            echo '<option value="'.$data['id'].'">'.$data['course'].' [ '.$data['id'].' ] </option>';
        }
    ?>
    </select>
    </div>
    <div class="form-group">
    <input type="text" required="required" id="content" name="content" class="form-control" placeholder="Enter Course Content">
    </div>
    
    <div class="form-group">
    <button type="submit" class="btn btn-danger ac_btn">Add Content</button>
    </div>
</form>



<h2 class="my-4 text-center">Edit Course Details</h2>
<form>
<div class="form-group">
    <select name="c_id" class="form-control course_id">
    <option value="none">Select Course Id</option>
    <?php
        require("../php/db.php");
        $data = "SELECT * FROM course";
        $response = $db->query($data);
        while($data = $response->fetch_assoc())
        {
            echo '<option value="'.$data['id'].'">'.$data['course'].' [ '.$data['id'].' ] </option>';
        }
    ?>
    </select>
</div>


</form>

<ul class="list-group e_data">
   
</ul>

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
            <form class="edit_cc_frm">
            
            <input type="hidden" class="ccid" name="ccid">
            <input type="hidden" class="oldcc" name="oldcc">
            <div class="form-group">  
            <input type="text" required="required"   name="ecc" class="form-control cc" placeholder="Course Content Name">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-danger ubtn">Update Course content</button>
            </div>

            </form>
        </div>
    </div>
    </div>
</div>



<script>

    $(document).ready(function(){
        $(".course_id").on("change",function(){
            $(".e_data").html("");
            var courses_id =  $(this).val();
            if($(this).val() == "none")
           {
                 console.log("select course");
         
           }
           else
           {
               $.ajax({
                   type : "POST",
                   url : "php/s_edit_course_details.php",
                   data : {
                       course_id : courses_id
                   },
                   beforeSend : function(){
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
                div.className = "shadow-lg alert alert-primary shadow-sm text-center";
                div.innerHTML = "<i class='fas fa-circle-notch fa-spin my-3' style='font-size:100px;'></i> <h2 class='text-center'>Loading...</h2>"; 
                $(".msg").append(div);
                   },
                   success : function(response){
                        $(".msg").html(" ");  
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


                    var all_data =  JSON.parse(response);
                    var i;
                    for(i=0;i<all_data.length;i++)
                    {   
                        var li = document.createElement("LI");
                        $(li).addClass("list-group-item");

                        var span = document.createElement("SPAN");
                        $(span).html(all_data[i]);

                        var edit = document.createElement("I");
                        $(edit).addClass("fa fa-edit text-success float-right mx-5 edit");
                        $(edit).css({
                            "cursor":"pointer",
                            "font-size":"22px"
                        });

                        var del = document.createElement("I");
                        $(del).addClass("fa fa-trash text-danger float-right del");
                        $(del).css({
                            "cursor":"pointer",
                            "font-size":"22px"
                        });

                        $(li).append(span);
                        $(li).append(del);
                        $(li).append(edit);
                        $(".e_data").append(li);


                    }




                    $(".del").each(function(){
                        $(this).click(function(){
                            var txt  = this.parentElement.getElementsByTagName("SPAN")[0].innerHTML;
                            var parent = this.parentElement;
                             $.ajax({
                                type:"POST",
                                url:"php/cc_del.php",
                                data : {
                                    del_course_id : courses_id,
                                    cc : txt
                                },
                                success : function(response){
                                        if(response.trim() == "success")
                                        {
                                            $(parent).addClass("animate__animated animate__bounceOut");
                                            setTimeout(function(){
                                                parent.remove();
                                            },1000);
                                        }
                                }
                             });
                        });
                    })








                        $(".edit").each(function(){
                            $(this).click(function(){
                                var txt  = this.parentElement.getElementsByTagName("SPAN")[0].innerHTML;
                                $(".ccid").val(courses_id);
                                $(".cc").val(txt);
                                $(".oldcc").val(txt);
                               $(".modal").modal("show");

                                $(".edit_cc_frm").submit(function(e){
                                    
                                    e.preventDefault();
                                    var frm  = $(this);
                                    $.ajax({
                                        type: "POST",
                                        url : "php/s_edit_course_content.php",
                                        data : {
                                            id : $(".ccid").val(),
                                            old_data : $(".oldcc").val(),
                                            new_data : $(".cc").val()
                                        },
                                        beforeSend : function(){
                                           $(".ubtn").html("Please Wait...");
                                           $(".ubtn").attr("disabled","disabled"); 
                                        },
                                        success : function(response){
                                            $(".ubtn").html("Update Course Content");
                                            $(".ubtn").removeAttr("disabled");
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

                                                    $(".edit_cc_frm").trigger("reset");
                                                    $(".modal").modal("hide");
                                                    var div = document.createElement("DIV");
                                                    div.style.height = "250px";
                                                    div.style.width = "300px";
                                                    div.style.position = "absolute";
                                                    div.className = "shadow-lg alert alert-success shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
                                                    div.innerHTML = "<i class='fas fa-check-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'> Update Successfully !</h2>"; 
                                                    $(".msg").append(div);
                                            
                                                    setTimeout(function(){
                                                        $(".msg").html(" ");  
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
                                                            $("[page-link=add_course_details]").click(); 
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
                                                    $(".edit_cc_frm").trigger("reset");
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
                                });

                            });
                        });






                   }
               });
           }
        })
    });






    $(document).ready(function(){
        $(".course_details_frm").submit(function(e){
            e.preventDefault();
           if($(".cid").val() == "none")
           {
        
         
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
              $(".modal").modal("hide");
             var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-warning shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
            div.innerHTML = "<i class='fas fa-exclamation-triangle my-3' style='font-size:100px;'></i> <h2 class='text-center'>Select Course !</h2>"; 
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
           else{
            $.ajax({
                type : "POST",
                url : "php/s_add_course_details.php",
                data : new FormData(this),
                processData : false,
                contentType :false,
                cache :false,
                beforeSend : function(){
                    $(".ac_btn").html("Please Wait...");
                },
                success : function(response){
                    if(response.trim() == "success")
            {
                $(".ac_btn").html("Add Content");
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
              $(".modal").modal("hide");
             var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-success shadow-sm animate__animated animate__bounceIn animate__faster 500ms text-center";
            div.innerHTML = "<i class='fas fa-check-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'>Content Add Successfully !</h2>"; 
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
              $(".course_details_frm").trigger('reset');
              },1000);
            }
            else
         {
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
              $(".modal").modal("hide");
             var div = document.createElement("DIV");
            div.style.height = "250px";
            div.style.width = "300px";
            div.style.position = "absolute";
            div.className = "shadow-lg alert alert-danger shadow-sm animate__animated animate__bounceIn animate__faster 500ms  text-center";
            div.innerHTML = "<i class='fas fa-times-circle my-3' style='font-size:100px;'></i> <h2 class='text-center'>Failed !</h2>"; 
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
              $(".course_details_frm").trigger('reset');
              },1000);
         }
                }
            });
           }
        });
    });
</script>

