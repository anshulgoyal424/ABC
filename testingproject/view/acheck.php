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
                        <li role="presentation" class="active"><a href="index.php?p=newrecord">Add Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=deleterecord">Delete Record</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=acheck">Check Requests</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=alogout">Logout</a></li>
                       
                        
                    </ul>
                </div>

<div class="col-lg-10">

<?php

if(isset($_GET['status'])){
$status = changeStatus();
//header('Location: index.php?p=acheck');    
if($status==3){
  //$ar = arequestpaging(4);
 $wa = updateleaves();
// print_r($wa);
// if($wa==1){
//     requestdelete();
//     header('Location: index.php?p=acheck&did=".$ar[$i][5]."');
//     
//}}
}}

if(isset($_GET['did'])){
    requestdelete();
header('Location: index.php?p=acheck');    
}
$ar = arequestpaging(4);
   
 echo "<center> <h2> <font color = 'darkblue'> <b> Requests  </b> </font> </center> <br>";
 echo "<table align='center' class='table table-bordered' border='1'>";
    echo " <tr class='success'><th><center>From</center></th><th><center>To</center></th><th><center>Reason</center></th><th><center>Message</center></th>"
    . "<th><center>Type</center></th><th><center>Days</center></th><th><center>Status</center></th><th><center>Operation</center></th><th><center>Status by next party</center></th></center></tr> ";
for($i=0 ; $i<count($ar) ; $i++){
   
    echo "<tr class='warning' align='center'>";
    echo "<td>".$ar[$i][0]."</td>";
    echo "<td>".$ar[$i][1]."</td>";
    echo "<td>".$ar[$i][2]."</td>";
    echo "<td>".$ar[$i][3]."</td>";
    echo "<td>".$ar[$i][6]."</td>";
    echo "<td>".$ar[$i][7]."</td>";
    if($ar[$i][4] == 1 || $ar[$i][4] == 2 || $ar[$i][4] == 3){
    echo "<td><a href='index.php?p=acheck&uid=".$ar[$i][5]."&status=".$ar[$i][4]."'>"
    . "<button type='button' class='btn btn-success' data-toggle='tooltip' data-placement='top' title = 'Accepted'><span class='glyphicon glyphicon-ok'></span></button><a> &nbsp; &nbsp;</td>"; 
    }else{
     echo "<td><a href='index.php?p=acheck&uid=".$ar[$i][5]."&status=".$ar[$i][4]."'>"
    . "<button type='button' class='btn btn-warning' data-toggle='tooltip' data-placement='top' title = 'Pending'><span class='glyphicon glyphicon-warning-sign'></span></button><a> &nbsp; &nbsp;</td>"; 
    }
    echo "<td><a href='index.php?p=acheck&did=".$ar[$i][5]."'>"
    . "<button type='button' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title = 'Remove'><span class='glyphicon glyphicon-remove'></span></button><a></td>";
    if($ar[$i][4] == 1){
    echo "<td>Request is pending</td>"; 
    }else if($ar[$i][4] == 2 || $ar[$i][4] == 3){
     echo "<td>Request is accepted</td>";
    }
    else{echo "<td>Request is still not accepted by you</td>"; 
    }
    
}
echo "</table>";
?>