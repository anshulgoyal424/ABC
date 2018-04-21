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
delete();
delete2();
selectp();    
}

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
                    
  <div class="form-group col-lg-10">
      <div class="col-lg-offset-4 col-lg-4" style="padding-left:52px;">
        <button type="submit" name = "x1" class="btn btn-default">Delete</button>
    </div>
  </div>
</form>
            
             
             </div>
</div>
</div>

     </body>
</html>