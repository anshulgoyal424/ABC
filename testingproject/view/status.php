<?php
$cs = getUserById();

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

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>

<?php// print_r($_SESSION);?>
        <div class="container">
            <div class="page-header">
                <h1> <small>LRMS</small></h1>
<!--                <div class="col-lg-5" style="margin-left: 900px;">

                    <?php
                    $ar = scandir("img1");
                    echo "<img src='img1/$cs[8]' height='120' width='200' class='img-circle' /> <br>";


                    echo "<center>";
                    ?> 
                </div>-->
            </div>



            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active "><a  class="noPrint" href="index.php?p=afterfirst">Home</a></li>
                        <li role="presentation" class="active"><a href='index.php?p=editp'>Edit</a></li>
                        <li role="presentation" class="active"><a class="noPrint" href="index.php?p=leaves">Leaves</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=apply">Apply for leaves</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=status">Status</a></li>
                        <li role="presentation" class="active"><a class="noPrint" href="index.php?p=logout">Logout</a></li>
                        <li role="presentation" class="active"><a href="javascript:window.print()" class="noPrint">Print</a></li>
                    </ul>
                </div>

<?php

echo "<center> <h2> <font color = 'darkblue'> <b> Status  </b> </font> </h2> </center> <br>";

echo "<center> <h3> <font color = 'darkgreen'> Here you can see Status of your Leave request. </font> </h3> <center> <br>";

$ar = request1paging(4);

error_reporting(0);

if(empty($ar[5])){
 
if($ar[1]==$_SESSION['emailid']) {
echo" <center> <h3> <font color = 'darkblue'> <b> Your request is still there on the Admin site. Please wait. </b> </font> </h3> </center> <br>";
}

else{
echo"  <center> <h3> <font color = 'darkblue'> <b> No request found for your account. <br> If you had requested one, so it is rejected. </b> </font> </h3> </center> <br> ";
}
}

elseif($ar[5]==1){
echo"  <center> <h3> <font color = 'darkblue'> <b> Your request is there on the Supervisor site. Please wait. </b> </font> </h3> </center> <br> ";
}

elseif($ar[5]==2){
echo"  <center> <h3> <font color = 'darkblue'> <b> Your request is accepted. </b> </font> </h3> </center> <br> ";
}

?>