<?php
if(isset($_POST['a3'])){
      $_SESSION['role']= "Vice Chancellor";
      $br = scheck_user();
      $po = "Vice Chancellor";
      $_SESSION['emailid'] = $_POST['ea'];
     // $_SESSION['year'] = $br[$i][1];
   //  print_r($br);
    // print_r($po);
      
      if($br[0] == $po){
          
          header("location:index.php?p=dhome");
      }
          else
              { echo " <div style=padding-right:40px;> <center> <h4> <font color = 'red'> Error Occured! <br> 
      Wrong Username Password Entered </font> </h4> </center> </div>";
      }
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
        <link href="css/loginsheet.css" rel="stylesheet" type="text/css">
        
    </head>
    <body style="background: url(img/a.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
        <div class="a1">
            <img src="img/logo.png">
        </div>
        <br>
        <br>
        <div class="col-lg-offset-4 col-lg-8  col-sm-offset-4 col-sm-8 col-md-offset-4 col-md-8 col-xs-offset-4 col-xs-12" style="color:orange; font-weight: bold; font-size: 20px;">
            <form method="post" class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">EMAIL ID</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" name="ea" style="width:30%; border-radius: 120px;"id="inputEmail3" placeholder="EMAIL ID">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">PASSWORD</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" name="pa" style="width:30%; border-radius: 120px;" id="inputPassword3" placeholder="PASSWORD">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
            <input type="checkbox" style="font-weight:bold;"> Remember Me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group" style="padding-right: 150px;">
    <div class="col-sm-offset-1 col-sm-12">
        <button class='btn btn-primary btn-lg col-lg-5'  name="a3" >Login</button>
    </div>
  </div>
  </div>
        
</form>
        
        
    </body>
</html>