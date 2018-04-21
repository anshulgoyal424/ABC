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
?>

<?php

if(isset($_POST['u1'])){

$cr = checkUserById();

$abc = $_POST['startdate'];

$date1 = DateTime::createFromFormat('m/d/Y', "$abc");
$date1->format('Y-m-d');
$year1 = $date1->format("Y");
$month1 = $date1->format("m");
$day1 = $date1->format("d");

$date2 = DateTime::createFromFormat('m/d/Y', "$cr[6]");
$date2->format('Y-m-d');
$year2 = $date2->format("Y");
$month2 = $date2->format("m");
$day2 = $date2->format("d");

if($year1<$year2){echo"Form not submitted. Error Occured since DOJ > StartDate";}
elseif($year1 == $year2){
  if($month1<$month2){echo"Form not submitted. Error Occured since DOJ > StartDate";}
  elseif($month1 == $month2){
      if($day1<$day2){echo"Form not submitted. Error Occured since DOJ > StartDate";}
      
      else{
   $d = getdetails();
   if ($d){
       echo "Record is already present";      
   }
   else{
       leave_insert();
       echo "Record successfully inserted";
  
if($_POST['year']=="2016-2017"){
    updatevalue4();
}

if($_POST['year']=="2015-2016"){
    updatevalue3();
}

if($_POST['year']=="2014-2015"){
    updatevalue2();
}

if($_POST['year']=="2013-2014"){
    updatevalue1();
}
}
}     
  }
  else{
   $d = getdetails();
   if ($d){
       echo "Record is already present";      
   }
   else{
       leave_insert();
       echo "Record successfully inserted";
  
if($_POST['year']=="2016-2017"){
    updatevalue4();
}

if($_POST['year']=="2015-2016"){
    updatevalue3();
}

if($_POST['year']=="2014-2015"){
    updatevalue2();
}

if($_POST['year']=="2013-2014"){
    updatevalue1();
}
}
}
}
else{
   $d = getdetails();
   if ($d){
       echo "Record is already present";      
   }
   else{
       leave_insert();
       echo "Record successfully inserted";
  
if($_POST['year']=="2016-2017"){
    updatevalue4();
}

if($_POST['year']=="2015-2016"){
    updatevalue3();
}

if($_POST['year']=="2014-2015"){
    updatevalue2();
}

if($_POST['year']=="2013-2014"){
    updatevalue1();
}
}
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <title>LRMS</title>
        <script>
        function abc(){
           // alert("hgcvhjvk");
                    var dep = document.f.year.value;
                   // alert(dep);
                    if(dep == 'Select One')
                       {alert("Select year");
                        document.getElementById("year").focus();
                       // document.getElementById("err4").innerHTML = "<font color = 'red'>&#x2717</font>" 
                    return false;
                    }
                    else{
                        //document.getElementById("err4").innerHTML = "<font color = 'green'>&#x2713</font>" 
                    return true;
                        
                    }
                   }
        </script>
        
        <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  
  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
  </script>
 

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
                        <li role="presentation" class="active"><a href="index.php?p=alogout">Logout</a></li>
                        
                    </ul>
                </div>
                <form class="form-horizontal" method="post" name="f" enctype="multipart/form-data" onsubmit="return abc()">
  <div class="form-group col-lg-10">
    <label for="inputEmail3" class="col-sm-2 control-label">Employee ID</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="inputEmail3" name="id" style="width: 30%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10">
    <label for="inputEmail3" class="col-sm-2 control-label">Employee Name</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="inputEmail3" name="name" style="width: 30%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10">
    <label for="inputid" class=" col-lg-2 control-label">Year</label>
    <div class="col-lg-6"> <select class="form-control" style="width: 30%;" name="year" id="year">
            <option >Select One</option>
            <option >2016-2017</option>
            <option >2015-2016</option>
            <option >2014-2015</option>
            <option >2013-2014</option>
</select>
        </div>
    
  </div>
                    <div class="form-group col-lg-10">
    <label for="inputPassword3" class="col-sm-2 control-label">Alloted Casual</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="inputPassword3" name="acasual" style="width: 30%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10">
    <label for="inputPassword3" class="col-sm-2 control-label">Alloted Earn</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="inputPassword3" name="aearn" style="width: 30%;" required="required">
    </div>
  </div>
                    
  <div class="form-group col-lg-10" style="margin-left: 180px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Alloted Vacational Summer</label>
    <div class="col-lg-8" style="margin-top:10px;margin-left:4px;">
        <input type="text" class="form-control" id="inputPassword3" name="asummer" style="width: 29.5%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10" style="margin-left: 180px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Alloted Vacational Winter</label>
    <div class="col-lg-8" style="margin-top:10px;margin-left:4px;">
        <input type="text" class="form-control" id="inputPassword3" name="awinter" style="width: 29.5%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10" style="margin-left: 180px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Alloted Special Casual</label>
    <div class="col-lg-8" style="margin-top:8px;margin-left:4px;">
        <input type="text" class="form-control" id="inputPassword3" name="aspecial" style="width: 29.5%;" required="required">
    </div>
    
    <div class="form-group col-lg-10" style="margin-left: 20px; margin-top:8px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Start Date &nbsp;</label>
    <div class="col-lg-8">   
    <input type="text" class="form-control" id="datepicker" name="startdate"style="width: 37%;" required="required">
    </div>
    </div>
    
    <div class="form-group col-lg-10" style="margin-left: 20px;">
    <label for="inputPassword3" class="col-sm-2 control-label">End Date &nbsp;</label>
    <div class="col-lg-8">   
    <input type="text" class="form-control" id="datepicker2" name="enddate" style="width: 37%;" required="required">
    </div>
    </div>
    
  <div class="form-group col-lg-10" style="margin-left: 20px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Casual</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="inputPassword3" name="casual" style="width: 37%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10" style="margin-left: 20px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Earn</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="inputPassword3" name="earn" style="width: 37%;" required="required">
    </div>
  </div>
                    <div class="form-group col-lg-10" style="margin-left: 20px;">
     <label for="inputPassword3" class="col-sm-2 control-label">Earns</label>
    <div class=" col-lg-8">
        <input type="text" class="form-control" id="inputPassword3" name="earns" style="width: 37%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10" style="margin-left: 20px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Vacational Summer</label>
    <div class="col-lg-8" style="margin-top:10px;">
        <input type="text" class="form-control" id="inputPassword3" name="summer" style="width: 37%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10" style="margin-left: 20px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Vacational Winter</label>
    <div class="col-lg-8" style="margin-top:10px;">
        <input type="text" class="form-control" id="inputPassword3" name="winter" style="width: 37%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10" style="margin-left: 20px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Special Casual</label>
    <div class="col-lg-8" style="margin-top:10px;">
        <input type="text" class="form-control" id="inputPassword3" name="special" style="width: 37%;" required="required">
    </div>
  </div>
  <div class="form-group col-lg-10" style="margin-left: 20px;">
    <label for="inputPassword3" class="col-sm-2 control-label">Official Duty</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="inputPassword3" name="official" style="width: 37%;" required="required">
    </div>
  </div>    
    
                    <div class="form-group col-lg-10">
                        <div class="col-lg-offset-4" style="padding-right:100px;">
                            <button type="submit" name = "u1" id="u1" class="btn btn-primary">Add</button>
    </div>
  </div>
    
</form>
            </div>
        </div>
    </body>
</html>