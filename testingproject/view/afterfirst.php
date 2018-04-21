<?php


if(isset($_SESSION['role'])){
        if ($_SESSION['role']=="employee"){
        }
else{
        header("location:index.php?p=home");
    }
}
else{
        header("location:index.php?p=home");
}
//print_r($_SESSION['id']);
$cr = getUserById();
//print_r($cr);
?>

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

        <div style="position:fixed;padding-left: 1100px;padding-top: 120px;" class="col-lg-2" >
            
            <?php
                $ar = scandir("img1");
                 
           echo "<img src='img1/$cr[8]' height='150' width='200' class='img-circle' /> <br>";
          // print_r($cr[0][8]);
           
           echo "<center>";
            ?> 
              
        </div>
        
        <div class="container">
            <div class="page-header">
                <h1> <small>LRMS</small></h1>
            </div>
             
            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active"><a href="index.php?p=afterfirst">Home</a></li>
                        <li role="presentation" class="active"><a href='index.php?p=editp'>Edit</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=leaves">Leaves</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=apply">Apply for leaves</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=status">Status</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=logout">Logout</a></li>

                    </ul>
                </div>
                <div id ="profile"> <h1 class="text-center col-lg-6" style="color:darkgreen"><strong>Your Profile</strong></h1>
                    
                    <div class="col-lg-10">  
                        <form class="form-horizontal" method="post">
    <br>
    <div class="form-group">
    <label for="inputEmail3" class="col-lg-2 control-label">Employee ID</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" readonly id="inputEmail3" name="id" value="<?php echo isset($cr[0])?$cr[0]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-2 control-label">Name</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[1])?$cr[1]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-4">
      <input type="email" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[2])?$cr[2]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-2 control-label">Type</label>
    <div class="col-lg-4">
      <input type="email" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[10])?$cr[10]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-2 control-label">Department</label>
    <div class="col-lg-4">
      <input type="email" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[9])?$cr[9]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-2 control-label">Date of birth</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[5])?$cr[5]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-2 control-label">Mobile</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" id="inputPassword3" readonly value="<?php echo isset($cr[7])?$cr[7]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-2 control-label">Date of joining</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" id="inputPassword3" readonly value="<?php echo isset($cr[6])?$cr[6]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-2 control-label">Address</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" id="inputPassword3"readonly value="<?php echo isset($cr[4])?$cr[4]:'';?>">
    </div>
  </div>
                            
</form>
                    </div>
          </div> </div> </div>