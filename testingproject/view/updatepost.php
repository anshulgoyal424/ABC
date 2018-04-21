<?php
if(isset($_SESSION['role'])){
        if ($_SESSION['role']=="admin"){
        }
else{
        header("location:index.php?p=home");
    }
}
else{
            header("location:index.php?p=home");

}


if(isset($_POST['x1'])){
$x = update_post();

print_r('successfully updated');
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
         </head>
    <body >

        <div class="container">
            <div class="page-header">
                <h1> <small>LRMS</small></h1>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav nav-pills nav-stacked"  >
                        <li role="presentation" class="active"><a href="index.php?p=aafterfirst">Home</a></li>
                         <li role="presentation" class="active"><a href="index.php?p=addleave">Add Leaves</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=search">Search</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=updatepost">Update Post</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=apedit">Employee Profile</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=newrecord">Add Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=deleterecord">Delete Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=acheck">Check Requests</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=alogout">Logout</a></li>
                       
                        
                    </ul>
                </div>

<div class='col-lg-10'>  
                        <form class='form-horizontal' method='post'>
    <div class='form-group col-lg-10'>
    <label for='inputEmail3' class='col-lg-2 control-label'>Employee ID</label>
    <div class='col-lg-5'>
        <input type='text' class='form-control'  id='inputEmail3' name='empid' >
    </div>
  </div>
    <div class='form-group col-lg-10'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Post</label>
                        <div class='col-sm-10'>
                            <select class='form-control' id='post'  name='post' style='width: 38%;'>
                                <option ></option>
                                <option >Vice Chancellor</option>
                                <option >Registrar</option>
                                <option >Dean</option>
                                <option >DOS</option>
                                <option >HOD</option>
                                
                            </select>
                            <span id='err3'></span>

                        </div>
                    </div>
    <div class='form-group col-lg-6' >
      <div class='col-lg-offset-5 col-lg-4'>
        <button type='submit' name = 'x1' class='btn btn-default'>Update</button>
    </div>
  </div>
    </form> 
</div>
            </div>
        </div>
        
    </body>
</html>