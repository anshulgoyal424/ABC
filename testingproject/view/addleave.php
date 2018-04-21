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

$ar = 0;
if(isset($_POST['x1'])){
        
    if($_POST['department']!=''&& $_POST['type']!=''){
       //echo 'anshul goyal';
       $ar = fetchAllRecords();
   }
}
if(isset($_POST['x2'])){
    addleaves();
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
        
        <script>
            $(document).ready(function (){
                $("#ckbCheckAll").click(function () {
                    $(".checkBoxClass").attr('checked', this.checked);
                });
            });
            $(document).ready(function (){
                $("#x1").click(function () {
                    $("div.hidden").removeClass("hidden");
                });
            });
            $(document).ready(function (){
                $("#x2").click(function () {
                    $("div.hidden").removeClass("hidden");
                });
            });
            
function showDiv2() {
   document.getElementById('Div1').style.display = "block";
   document.getElementById('welcomeDiv').style.display = "block";
   document.getElementById('Div').style.display = "block";
}
</script>

         </head>
    <body>

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
                <div id="d1">
                <div>
                    <div class="col-lg-3">
                        <label class="col-lg-offset-1">DEPARTMENT</label>
                    </div>
                    <div class="col-lg-3 col-lg-pull-1" style="padding-left: 85px;">
                        <label style="">TYPE</label>
                    </div>
                    <div class="col-lg-3 col-lg-pull-1" style="padding-left: 55px;">
                        <label style="">YEAR</label>
                    </div>
                </div>
                <br>
                <br>
              
                <div>
                    
                    <form class="form-horizontal" method="post">
                    <div class="form-group col-lg-3">
<!--    <label for="inputid" class=" col-lg-4 control-label">Department</label>-->
    <div class="col-lg-offset-1 col-lg-8"> <select class="form-control" name="department">
          //<?php 
          
 echo "<option id='n1' selected >".$ar[0][2]."</option>";
 //echo " <option  selected >".$yr[0][5]."</option>";
 //echo " <option  selected >".$xr[0][5]."</option>";
 
 
 ?>
            <option >Computer Science</option>
            <option >Mechanical</option>
            <option >Civil</option>
            <option >Electronics</option>
</select>
  </div>
  </div>
                    <div class="form-group col-lg-3">
    <!--<label for="inputid" class=" col-lg-4 control-label">Type</label>-->
    <div class="col-lg-8"> <select class="form-control"  name="type">
          <?php 
          
 echo "<option id='n2' selected >".$ar[0][3]."</option>";
 
 
 ?>
            <option >Faculty</option>
            <option >Technical</option>
</select>
  </div>
  </div>
                         <div class="form-group col-lg-3">
    <div class="col-lg-8"> <select class="form-control"  name="year">
          <?php 
          
 echo "<option id='n3' selected >".$ar[0][1]."</option>";
 
 
 ?>
           <option >2016-2017</option>
            <option >2015-2016</option>
            <option >2014-2015</option>
            <option >2013-2014</option>
</select>
  </div>

                         </div>
  <div class="form-group col-lg-2">
    <div class="col-lg-6">
        
        <button type="submit" name = "x1" id="x1" class="btn btn-default">Submit</button>
    <br><br> <center> <a type="submit" name = "c1" id="c1" class="btn btn-default" onclick='showDiv2();'>Search</a> </center>

    </div></div></form>                        

    </div></div><br><br><br><br><br>
    
                <form class="form-horizontal" method="post">               
                  
                <!--<div id="Div"  style="display:none;"> -->
                <div style="padding-left: 55px;">
                <div id="Div1" style="display: none;padding-top: 25px;" class="col-lg-4">
                
                <div class= "col-lg-offset-2 col-lg-7 " style="overflow: scroll;" >
                    
               <?php
               
                echo "<input type='checkbox' id='ckbCheckAll'/> Select All <br>";
                for($i=0;$i<count($ar);$i++){
                    ?>
                        <input type="checkbox" class="checkBoxClass"  name="abc[]" value="<?=$ar[$i][0];?>"/> <span class="checkboxtext"> <?=$ar[$i][0]?></span><br>
                <?php
                }
                ?>
                </div>
                
                </div>
                    <div id="welcomeDiv"  style="display:none;padding-left: 160px;" class="col-lg-offset-5" >
                    <div style="padding-left: 5px;">
                        <label>LEAVE TYPE</label>
                    </div>
                
     <select class="form-control"  size="3" name="leave" style="width: 200px;">
           <option >casual</option>
            <option >special_casual</option>
            <option >vacational_summer</option>
            <option >vacational_winter</option>
</select>
            </div>
            
                </div><br><br>
                    
               <div id="Div"  style="display:none;" class="answer_list">
               <div class="col-lg-6">
                        <label class="col-lg-offset-4" style="padding-left: 48px;">NO OF LEAVES YOU WANT TO ADD</label>
                    </div>
               <div class="col-lg-6">
                        <label for="inputid" style="padding-left: 5px;" class="control-label">YEAR</label>
                    </div>
                    <br>
                    <br>
                <div class="col-lg-offset-2 col-lg-4 " style="padding-left: 50px;">
                    <input type="text" class="form-control" id="emailid" name="num" placeholder="no of leaves" required="required">
    </div>
                     <div class="form-group col-lg-6">
    <div class="col-lg-8"> <select class="form-control"  name="year">
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
                    <br>
                    <br>
                    <br>
                    <br>
                    <div style="padding-left: 70px;" class="col-lg-offset-5 col-lg-6">
        <button type="submit" name = "x2" class="btn btn-default"> Insert </button>
    </div>
              
                
                </div>
            </form>
         </div>
   </div>
         
    </body>
</html>