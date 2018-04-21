<?php
$cr = getById();
$dr = getleavesById();

echo "<div style='position:fixed; padding-left:1120px; padding-top:120px;'> <img src='img1/$cr[8]' height='150' width='200' class='img-circle' /> </div> <br>";

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
    
   if($_POST['department']!=''&& $_POST['type']==''){
       //echo 'anshul';
       $xr = fetchAllRecord1();
   }
   else if($_POST['department']==''&& $_POST['type']!=''){
      // echo 'goyal';
       $yr = fetchAllRecord2();
   }
   else if($_POST['department']!=''&& $_POST['type']!=''){
       //echo 'anshul goyal';
       $ar = fetchAllRecords();
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
                        <li role="presentation" class="active"><a href="index.php?p=newrecord">Add Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=deleterecord">Delete Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=alogout">Logout</a></li>                        
                    </ul>
                </div>

<?php
$g = getfromvalue();
if (empty($g)){
    $g = 0;
}

    $sum = 0;
    for($i=2;$i<9;$i++){
        $sum=$sum+$dr[$i];
    }
    $sum=$sum-$dr[4];
    $sum=$sum-$dr[8];
    
    $asum = 0;
    for($i=9;$i<14;$i++){
        $asum=$asum+$dr[$i];
    }
    $asum=$asum-$sum;
    
    $sum2 = 0;
    for($i=9;$i<14;$i++){
        $sum2=$sum2+$dr[$i];
    }
    $sum2=$sum2+$g;
?>

<div class="col-lg-5">
    <div id ="profile"> <h1> <font style="color:darkblue"><strong>Details</strong> </font> </h1>
    <form class="form-horizontal" method="post">
    <br>
        
    <div class="form-group">
    <label for="inputEmail3" class="col-lg-4 control-label">Employee ID</label>
    <div class="col-lg-5">
        <input type="text" class="form-control" readonly id="inputEmail3" name="id" value="<?php echo isset($cr[0])?$cr[0]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-4 control-label">Name</label>
    <div class="col-lg-5">
        <input type="text" class="form-control" id="name" name="name" readonly value="<?php echo isset($cr[1])?$cr[1]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-4 control-label">Email Id</label>
    <div class="col-lg-5">
      <input type="email" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[2])?$cr[2]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-4 control-label">Mobile Number</label>
    <div class="col-lg-5">
      <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[6])?$cr[6]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-4 control-label">Date of birth</label>
    <div class="col-lg-5">
      <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[7])?$cr[7]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-4 control-label">Address</label>
    <div class="col-lg-5">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($cr[9])?$cr[9]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-4 control-label">Type</label>
    <div class="col-lg-5">
        <input type="text" class="form-control" id="inputPassword3" readonly value="<?php echo isset($cr[3])?$cr[3]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-4 control-label">Department</label>
    <div class="col-lg-5">
        <input type="text" class="form-control" id="inputPassword3" readonly value="<?php echo isset($cr[4])?$cr[4]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-4 control-label">Start Date</label>
    <div class="col-lg-5">
        <input type="text" class="form-control" id="inputPassword3" readonly value="<?php echo isset($dr[14])?$dr[14]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-4 control-label">Date of joining</label>
    <div class="col-lg-5">
        <input type="text" class="form-control" id="inputPassword3"readonly value="<?php echo isset($cr[5])?$cr[5]:'';?>">
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail3" class="col-lg-4 control-label">Year</label>
    <div class="col-lg-5">
      <input type="email" class="form-control" id="inputEmail3" readonly value="<?php echo isset($dr[16])?$dr[16]:'';?>">
    </div>
  </div>   
                            
</form>
                    </div>
          </div>
                
                <br>
                <br>
                <br>
                <br>
                
  <div class="col-lg-5"style="padding-top:5px;"> 
  <form class="form-horizontal" method="post">    
   
  <div class="form-group" style="padding-left:150px;">
    <label for="inputEmail3" class="col-lg-4 control-label">Consumed&nbsp;&nbsp;&nbsp;&nbsp;Balanced</label>
  </div>
  
  <div class="form-group">
    <label for="inputEmail3" class="col-lg-4 control-label">Casual</label>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($dr[2])?$dr[2]:'';?>">
    </div>
    <div class="col-lg-2">
        <?php $r[1]=$dr[9]-$dr[2]; ?>
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($r[1])?$r[1]:'';?>">
    </div>
  </div>
  <div class="form-group">
        <?php $r[2]=$dr[10]-$dr[3]; ?>
    <label for="inputEmail3" class="col-lg-4 control-label">Earn</label>
    <div class="col-lg-2">
      <input type="email" class="form-control" id="inputEmail3" readonly value="<?php echo isset($dr[3])?$dr[3]:'';?>">
    </div>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($r[2])?$r[2]:'';?>">
    </div>
  </div>
  <div class="form-group">
        <?php $r[3]=$dr[11]-$dr[5]; ?>
    <label for="inputEmail3" class="col-lg-4 control-label">Vacational Summer</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($dr[5])?$dr[5]:'';?>">
    </div>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($r[3])?$r[3]:'';?>">
    </div>
  </div>
  <div class="form-group">
        <?php $r[4]=$dr[12]-$dr[6]; ?>
    <label for="inputEmail3" class="col-lg-4 control-label">Vacational Winter</label>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($dr[6])?$dr[6]:'';?>">
    </div>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($r[4])?$r[4]:'';?>">
    </div>
  </div>
  <div class="form-group">
        <?php $r[5]=$dr[13]-$dr[7]; ?>
    <label for="inputPassword3" class="col-lg-4 control-label">Special Casual</label>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputPassword3" readonly value="<?php echo isset($dr[7])?$dr[7]:'';?>">
    </div>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($r[5])?$r[5]:'';?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-4 control-label">Total</label>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputPassword3"readonly value="<?php echo isset($sum)?$sum:'';?>">
    </div>
    <div class="col-lg-2">
        <input type="text" class="form-control" id="inputPassword3"readonly value="<?php echo isset($asum)?$asum:'';?>">
    </div>
  </div>    
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-4 control-label">Official Duty</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" id="inputPassword3" readonly value="<?php echo isset($dr[8])?$dr[8]:'';?>">
    </div>
  </div>
  <div class="form-group">
      <label for="inputEmail3" class="col-lg-4 control-label">End Date</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($dr[15])?$dr[15]:'';?>">
    </div>
  </div>
  <div class="form-group">
      <label for="inputEmail3" class="col-lg-4 control-label">Leaves entitled</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($sum2)?$sum2:'';?>">
    </div>
  </div>    
  <div class="form-group">
      <label for="inputEmail3" class="col-lg-4 control-label">Leaves carried from last year</label>
    <div class="col-lg-4" style="padding-top:10px;">
        <?php $r[1]=$dr[17]-1; ?>
      <input type="text" class="form-control" id="inputEmail3" readonly value="<?php echo isset($g)?$g:'';?>">
    </div>
  </div>
</form>
</div>
</div>
          
</div>    
           
</body>
</html>