<?php
if(!isset($_SESSION['role'])){
       header("location:index.php?p=home");}
else {
    if ($_SESSION['role']=="employee"){
        header("location:index.php?p=home");
    }
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
    </head>  

<script> 
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>  

<a href="index.php?p=vclogout"><button class="btn btn-success" style="position:absolute; right:40px;">Log out</button></a>

<?php

if(isset($_GET['status'])){
    schangeStatus();
header('Location: index.php?p=rhome');        
}

if(isset($_GET['did'])){
    requestdelete();
header('Location: index.php?p=rhome');    
    
}

 $ar = requestpaging(4);
 echo "<center> <h2> <font color = 'darkblue'> <b> Requests  </b> </font> </center> <br>";
 echo "<table align='center' class='table table-bordered' border='1'>";
    echo " <tr class='success'><th><center>From</center></th><th><center>To</center></th><th><center>Reason</center></th><th><center>Message</center></th>"
    . "<th><center>Type</center></th><th><center>Days</center></th><th><center>Status</center></th><th><center>Operation</center></th></center></tr> ";
for($i=0 ; $i<count($ar) ; $i++){
   
    echo "<tr class='warning' align='center'>";
    echo "<td>".$ar[$i][0]."</td>";
    echo "<td>".$ar[$i][1]."</td>";
    echo "<td>".$ar[$i][2]."</td>";
    echo "<td>".$ar[$i][3]."</td>";
    echo "<td>".$ar[$i][6]."</td>";
    echo "<td>".$ar[$i][7]."</td>";
    if($ar[$i][4] == 2){
    echo "<td><a href='index.php?p=shome&uid=".$ar[$i][5]."&status=".$ar[$i][4]."'>"
    . "<button type='button' class='btn btn-success' data-toggle='tooltip' data-placement='top' title = 'Accepted'><span class='glyphicon glyphicon-ok'></span></button><a> &nbsp; &nbsp;"; 
    }else{
     echo "<td><a href='index.php?p=shome&uid=".$ar[$i][5]."&status=".$ar[$i][4]."'>"
    . "<button type='button' class='btn btn-warning' data-toggle='tooltip' data-placement='top' title = 'Pending'><span class='glyphicon glyphicon-warning-sign'></span></button><a> &nbsp; &nbsp;"; 
    }
    
    echo "<td><a href='index.php?p=shome&did=".$ar[$i][5]."'>"
    . "<button type='button' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title = 'Remove'><span class='glyphicon glyphicon-remove'></span></button><a></td>";
        
}
echo "</table>";
?>