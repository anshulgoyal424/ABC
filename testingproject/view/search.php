<?php

error_reporting(0);

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
$x = get_record();}

if(isset($_GET['id'])){
    downloadCSV();
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
        <style>

            @media print {
                body * {
                    visibility: hidden;
                }
                #section-to-print, #section-to-print * {
                    visibility: visible;
                }
                #section-to-print {
                    position: absolute;
                    left: 0;
                    top: 0;
                }
            }
            
        </style>
         </head>
         <body >
<div class="container">
            <div class="page-header">
                <h1> <small>LRMS</small></h1>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active"><a href="index.php?p=aafterfirst">Home</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=addleave">Add Leaves</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=search">Search</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=apedit">Employee Profile</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=newrecord">Add Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=deleterecord">Delete Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=acheck">Check Requests</a></li>
                        <li role="presentation" class="active"><a href="javascript:window.print()" class="noPrint">Print</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=search&id=down">Download</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=alogout">Logout</a></li>
                    </ul>
                </div>
                <div id="section-to-print">
                <form class="form-horizontal" method="post">
  <div class="form-group col-lg-5">
    <!--<label for="inputid" class="col-lg-4 control-label">Employee ID</label>-->
    <div class="col-lg-offset-1 col-lg-8">
        <input type="text" class="form-control" name="s5" id="inputid"  
               value="<?php echo isset($x[0][0])?$x[0][0]:'';?>" placeholder="Employee ID">
    </div>
  </div>
  <div class="form-group col-lg-5">
    <!--<label for="inputid" class="col-lg-4 control-label">Employee Name</label>-->
    <div class="col-lg-8">
        <input type="text" class="form-control" name="name" id="inputid"  
               value="<?php echo isset($x[0][9])?$x[0][9]:'';?>" placeholder="Employee Name">
    </div>
  </div>
                    <div class="form-group col-lg-10" style="padding-left: 20px">
    <label for="inputid" class=" col-lg-4 control-label">Year</label>
    <div class="col-lg-6"> <select class="form-control" style="width: 30%;" name="year">
          <?php 
          
 echo " <option  selected >".$x[0][8]."</option>";
 
 
 ?>
           <option >2016-2017</option>
            <option >2015-2016</option>
            <option >2014-2015</option>
            <option >2013-2014</option>
</select>
  </div>
  </div>
  <div class="form-group col-lg-10" style="padding-right:120px;">
      <div class="col-lg-offset-5 col-lg-4">
        <button type="submit" name = "x1" class="btn btn-default">Search</button>
    </div>
  </div>
</form>
            
                    <div class="col-lg-offset-0 col-lg-8" style="padding-left: 35px; padding-top: 20px;">
<?php
if(isset($_POST['x1'])){
$y = get_record();

//     for($i=0 ; $i<count($y) ; $i++){
      $_SESSION['id'] = $y[0][0];
      $_SESSION['year'] = $y[0][8];
      $_SESSION['name'] = $y[0][9];
//      }
   // session_destroy();
  // unset($_SESSION);
  // print_r($y[0][8]);

echo "<table align='center' border='1' class='table table-bordered table-hover
                           table-striped text-center'>";
    echo "<tr><th class='text-center'>Types of Leave</th ><th class='text-center'>Total Leaves</th><th class='text-center'>Leaves Taken</th><th class='text-center'>Leaves Left</th>"
    . "<th class='text-center' colspan='2'>Operation</th></tr>";
for($i=0 ; $i<count($y) ; $i++){
    $r = $y[$i][1]+$y[$i][2]+$y[$i][4]+$y[$i][5]+$y[$i][6];
    $z = (10-$y[$i][1])+$y[$i][3]+(15-$y[$i][4])+(7-$y[$i][5])+(12-$y[$i][6]);
    echo "<tr>";
    echo "<td> Casual</td><td>10</td><td>".$y[$i][1]."</td><td>".(10-$y[$i][1])."</td><td><a href='index.php?p=aedit'>Edit</a></td></tr>";
    echo "<tr>";
    echo "<td> Earn</td><td>7</td><td>".$y[$i][2]."</td><td>".($y[$i][3])."</td></td><td><a href='index.php?p=aedit'>Edit</a></td></tr>";
    echo "<tr>";
    echo "<td> Vacatinal_Summer</td><td>15</td><td>".$y[$i][4]."</td><td>".(15-$y[$i][4])."</td></td><td><a href='index.php?p=aedit'>Edit</a></td></tr>";
    echo "<tr>";
    echo "<td> vacational_winter</td><td>7</td><td>".$y[$i][5]."</td><td>".(7-$y[$i][5])."</td></td><td><a href='index.php?p=aedit'>Edit</a></td></tr>";
    echo "<tr>";
    echo "<td> Special_casual</td><td>12</td><td>".$y[$i][6]."</td><td>".(12-$y[$i][6])."</td></td><td><a href='index.php?p=aedit'>Edit<a></td></tr>";
    echo "<tr>";
    echo "<td> Official_Duty</td><td></td><td>".$y[$i][7]."</td><td></td?</td><td><a href='index.php?p=aedit'>Edit<a></td></tr>";
    echo "<tr>"; 
    echo "<td> Total</td><td>51</td><td>".$r."</td><td>".$z."</td><td></td></tr>";
    echo "<tr>";
     
}

echo "</table>";
}
?>
             </div>
</div>
</div>
</div>

     </body>
</html>