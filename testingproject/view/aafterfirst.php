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
                        <li role="presentation" class="active"><a href="index.php?p=updatepost">Update Post</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=apedit">Employee profile</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=newrecord">Add Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=deleterecord">Delete Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=acheck">Check Requests</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=alogout">Logout</a></li>
                       
                        
                    </ul>
                </div>

<div class="col-lg-10">
<?php    

    $xr = fetch();
       echo "<table class = 'table table-bordered table-striped table-hover'>";
    echo "<tr><th><center>Emp Id</center></th><th><center>Name</center></th><th><center>Year</center></th><th><center>Full Info</center></th></tr>";
for($i=0 ; $i<count($xr) ; $i++){
   
    echo "<tr>";
    echo "<td><center>".$xr[$i][0]."</center></td>";
    echo "<td><center>".$xr[$i][1]."</center></td>";
    echo "<td><center>".$xr[$i][4]."</center></td>";
    echo "<td><center><a href='index.php?p=check&id=".$xr[$i][0]."&year=".$xr[$i][4]."'>"
    . "Check</a></center></td>";
}    
    
echo "</table>";

?>
</div>    
          </div>
      </div>
        
    </body>
</html>