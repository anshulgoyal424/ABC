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

$a = getrecord();

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    <ul class="nav nav-pills nav-stacked" 
                        >
                        <li role="presentation" class="active"><a href="index.php?p=aafterfirst">Home</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=search">Search</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=alogout">Logout</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=newrecord">New Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=deleterecord">Delete Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=check">Check Requests</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=group">Group By</a></li>
                    </ul>
                </div>
                <form class="form-inline"class="col-lg-10 " method="post">
                    <div class="form-group col-lg-3">
    <label for="exampleInputName2">Types Of Leaves</label>
  </div>
  <div class="form-group col-lg-3">
    <label for="exampleInputEmail2">Leaves Taken</label>
  </div>
  <div class="form-group col-lg-3">
    <label for="exampleInputEmail2">Updated Leaves</label>
  </div>
  
<br>
<br>
                
  <div class="form-group col-lg-3">
     <label for="exampleInputName2">Casual</label>
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" readonly value="<?php echo isset($a[0][1])?$a[0][1]:'';?>">
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" name="casual" value="<?php echo isset($a[0][1])?$a[0][1]:'';?>">
  </div>
  <div class="form-group col-lg-3">
     <label for="exampleInputName2">Earn</label>
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" readonly value="<?php echo isset($a[0][2])?$a[0][2]:'';?>">
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" name="earn" value="<?php echo isset($a[0][2])?$a[0][2]:'';?>">
  </div>
  <div class="form-group col-lg-3">
     <label for="exampleInputName2">Earns</label>
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" readonly value="<?php echo isset($a[0][3])?$a[0][3]:'';?>">
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" name="earns" value="<?php echo isset($a[0][3])?$a[0][3]:'';?>">
  </div>
  <div class="form-group col-lg-3">
     <label for="exampleInputName2">Vacational (Summer)</label>
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" readonly value="<?php echo isset($a[0][4])?$a[0][4]:'';?>">
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" name="summer" value="<?php echo isset($a[0][4])?$a[0][4]:'';?>">
  </div>
  <div class="form-group col-lg-3">
     <label for="exampleInputName2">Vacational (Winter)</label>
  </div>
  <div class="form-group col-lg-3 ">
      <input type="text" class="form-control" id="exampleInputPassword3" readonly value="<?php echo isset($a[0][5])?$a[0][5]:'';?>">
  </div>
  <div class="form-group col-lg-3 ">
      <input type="text" class="form-control" id="exampleInputPassword3" name="winter" value="<?php echo isset($a[0][5])?$a[0][5]:'';?>">
  </div>
  <div class="form-group col-lg-3">
     <label for="exampleInputName2">Special_Casual</label>
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" readonly value="<?php echo isset($a[0][6])?$a[0][6]:'';?>">
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" name="special" value="<?php echo isset($a[0][6])?$a[0][6]:'';?>">
  </div>
  <div class="form-group col-lg-3">
     <label for="exampleInputName2">Official_Duty</label>
  </div>
  <div class="form-group col-lg-3 ">
      <input type="text" class="form-control" id="exampleInputPassword3" readonly value="<?php echo isset($a[0][7])?$a[0][7]:'';?>">
  </div>
  <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="exampleInputPassword3" name="official" value="<?php echo isset($a[0][7])?$a[0][7]:'';?>">
  </div>

  <div class="form-group col-lg-10">
    <div class="col-lg-offset-8">
        <br>
        <button  type="submit" name = "x2" class="btn btn-success">Update</button>
    </div>
  </div>
  
</form>
            </div>
</div>
         </body>
</html>

<?php
if(isset($_POST['x2'])){
    aupdate();
   header("location:index.php?p=search");
}
?>