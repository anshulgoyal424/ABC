<?php

if(isset($_POST['s1'])){
       insert();
       header("location:index.php?p=login");
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/loginsheet.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  
  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
  </script>
        
        <script>
            function abc(){
                    var mobile = document.f.mobilenumber.value;
                    var typ = document.f.type.value;
                    var dep = document.f.department.value;
                   // alert(dep);
                    var p = (/^[0-9]{10}$/);
                    if (!(p.test(mobile)))
                    { 
                    alert("Mobile Number should be of 10 digits");
                    document.getElementById("mobilenumber").focus();
                    document.getElementById("err2").innerHTML = "<font color = 'red'>&#x2717</font>" 
                    return false;
                    }
                    else{
                        document.getElementById("err2").innerHTML = "<font color = 'green'>&#x2713</font>" 
                       }
                    if(typ == 'Select one')
                       {alert("Select Department");
                        document.getElementById("type").focus();
                        document.getElementById("err4").innerHTML = "<font color = 'red'>&#x2717</font>" 
                    return false;
                    }
                    else{
                        document.getElementById("err4").innerHTML = "<font color = 'green'>&#x2713</font>" 
                    
                        
                    }
                    if(dep == 'Select one')
                       {alert("Select Department");
                        document.getElementById("department").focus();
                        document.getElementById("err3").innerHTML = "<font color = 'red'>&#x2717</font>" 
                    return false;
                    }
                    else{
                        document.getElementById("err3").innerHTML = "<font color = 'green'>&#x2713</font>" 
                    return true;
                        
                    }
                    }
        </script>

    <style>
                   
            body{
                background: url(a.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
            }
            
        </style>
    
    </head>
    <body>

            <br><br><br>
            <div class="row ">
                <div class="col-lg-offset-2 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign Up Here</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" name="f" enctype="multipart/form-data" onsubmit="return abc()">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="id" name="id" placeholder="Id" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Email Id</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="emailid" name="email" placeholder="Email Id" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mobile No.</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" maxlength="10" id="mobilenumber" required="required" name="mobilenumber" placeholder="Mobile No.">
        <span id='err2'></span>
    </div>
  </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Date of birth</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="datepicker" name="dob" style="width: 100%;" placeholder="Date of birth">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required="required">
    </div>
  </div>
   <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="department"  name="type" required="required">
                                <option >Select one</option>
                                <option >Faculty</option>
                                <option >Technical</option>
                                <option >Administration</option>
                            </select>
                            <span id='err4'></span>

                        </div>
                    </div>  
   <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Department</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="department"  name="department" required="required">
                                <option >Select one</option>
                                <option >Computer Science</option>
                                <option >Mechanical</option>
                                <option >Civil</option>
                                <option >Electronics</option>
                            </select>
                            <span id='err3'></span>

                        </div>
                    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Date of joining</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="datepicker2" name="doj" style="width: 100%;" placeholder="Date of joining">    </div>
  </div>
 <div style="padding-top: 10px; padding-left: 70px;" class="form-group">
            <label for="exampleInputFile">Photo</label>
            <input type="file" name="photo">
            <p class="help-block">Upload your photo here.</p>
 </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-success" name="s1" id="s1"> Submit</button>
    </div>
  </div>
</form>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
                 <div class="col-lg-3"></div>
                </div>
               

        

    </body>
</html>