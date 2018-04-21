<?php

error_reporting(0);

if(isset($_SESSION['role'])){
        if ($_SESSION['role']=='admin'){
        }
else{
        header('location:index.php?p=home');
    }
}
else{
        header('location:index.php?p=home');

}
if(isset($_POST['x1'])){
$x = get_profile();}

?>

<html>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'/>
        <link href='css/bootstrap-theme.css' rel='stylesheet' type='text/css'/>
        <script src='js/jquery-3.2.1.js' type='text/javascript'></script>
        <script src='js/bootstrap.js' type='text/javascript'></script>
         </head>
    <body>

        <div class='container'>
            <div class='page-header'>
                <h1> <small>LRMS</small></h1>
            </div>
             <div style='position:fixed;padding-left: 1000px;padding-top: 10px;' class='col-lg-2' >
                      
             </div>
            <div class='row'>
                <div class='col-lg-2'>
                    <ul class='nav nav-pills nav-stacked'>
                        <li role='presentation' class='active'><a href='index.php?p=aafterfirst'>Home</a></li>
                         <li role='presentation' class='active'><a href='index.php?p=addleave'>Add Leaves</a></li>
                        <li role='presentation' class='active'><a href='index.php?p=search'>Search</a></li>
                        <li role='presentation' class='active'><a href='index.php?p=apedit'>Employee Profile</a></li>
                        <li role='presentation' class='active'><a href='index.php?p=newrecord'>Add Record</a></li>
                        <li role='presentation' class='active'><a href='index.php?p=deleterecord'>Delete Record</a></li>
                        <li role='presentation' class='active'><a href='index.php?p=acheck'>Check Requests</a></li>
                        <li role='presentation' class='active'><a href='index.php?p=alogout'>Logout</a></li>
                        
                    </ul>
                </div>
                <div id ='profile'> <h1 class='text-center col-lg-6' style='color:darkgreen'><strong>Edit Employee Profile</strong></h1>
                    <div class='col-lg-10'>  
                        <form class='form-horizontal' method='post'>
    <br>
    <div class='form-group col-lg-5'>
    <label for='inputEmail3' class='col-lg-6 control-label'>Employee ID</label>
    <div class='col-lg-6'>
        <input type='text' class='form-control'  id='inputEmail3' name='empid' value='<?php echo isset($x[0][0])?$x[0][0]:'';?>'>
    </div>
  </div>
    <div class='form-group col-lg-6' >
      <div class='col-lg-offset-5 col-lg-4'>
        <button type='submit' name = 'x1' class='btn btn-default'>Search</button>
    </div>
  </div>
    </form>
    
                        
    


<?php
if(isset($_POST['x1'])){
$cr = get_profile();
//print_r($cr);
echo "
    <div class='col-lg-10'>  
            <form class='form-horizontal' method='post'>
    <div class='form-group col-lg-12'>
    <label for='inputEmail3' class='col-lg-2 control-label'>Employee ID</label>
    <div class='col-lg-4'>
        <input type='text' class='form-control' readonly id='inputEmail3' name='id' value=".$cr[0][0].">
    </div>
  </div>
  <div class='form-group col-lg-12'>
    <label for='inputEmail3' class='col-lg-2 control-label'>Name</label>
    <div class='col-lg-4'>
        <input type='text' class='form-control' id='inputEmail3' name='name' value=".$cr[0][1].">
    </div>
  </div>
  <div class='form-group col-lg-12'>
    <label for='inputEmail3' class='col-lg-2 control-label'>Email</label>
    <div class='col-lg-4'>
      <input type='email' class='form-control' id='inputEmail3' name='email' value=".$cr[0][2].">
    </div>
  </div>
   <div class='form-group col-lg-12'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Type</label>
                        <div class='col-sm-10'>
                            <select class='form-control' id='department'  name='type' required='required' style='width: 38%;'> 
                                <option >".$cr[0][5]."</option>
                                <option >Faculty</option>
                                <option >Technical</option>
                            </select>
                            <span id='err4'></span>

                        </div>
                    </div>  
   <div class='form-group col-lg-12'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Department</label>
                        <div class='col-sm-10'>
                            <select class='form-control' id='department'  name='department' style='width: 38%;'>
                                <option >".$cr[0][6]."</option>
                                <option >Computer Science</option>
                                <option >Mechanical</option>
                                <option >Civil</option>
                                <option >Electronics</option>
                            </select>
                            <span id='err3'></span>

                        </div>
                    </div>
  <div class='form-group col-lg-12'>
    <label for='inputEmail3' class='col-lg-2 control-label'>Date of birth</label>
    <div class='col-lg-4'>
        <input type='date' class='form-control' id='inputEmail3' name='dob' value=".$cr[0][7].">
    </div>
  </div>
  <div class='form-group col-lg-12'>
    <label for='inputPassword3' class='col-lg-2 control-label'>Mobile</label>
    <div class='col-lg-4'>
        <input type='text' class='form-control' id='inputPassword3' name='mobile' value=".$cr[0][9].">
    </div>
  </div>
  <div class='form-group col-lg-12'>
    <label for='inputPassword3' class='col-lg-2 control-label'>Date of joining</label>
    <div class='col-lg-4'>
        <input type='date' class='form-control' id='inputPassword3' name='doj' value=".$cr[0][8].">
    </div>
  </div>
  <div class='form-group col-lg-12'>
    <label for='inputPassword3' class='col-lg-2 control-label'>Address</label>
    <div class='col-lg-4'>
        <input type='text' class='form-control' id='inputPassword3' name='add' value=".$cr[0][4].">
    </div>
  </div>
  <div class='form-group col-lg-12'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Post</label>
                        <div class='col-sm-10'>
                            <select class='form-control' id='post'  name='post' style='width: 38%;'>
                                <option >".$cr[0][11]."</option>
                                <option >Vice Chancellor</option>
                                <option >Registrar</option>
                                <option >Dean</option>
                                <option >HOD</option>
                                
                            </select>
                            <span id='err3'></span>

                        </div>
                    </div>

                          
    <div class='form-group col-lg-12'>
    <div class='col-sm-offset-2 col-sm-10' style='padding-left: 110px;'>
        <button class='btn btn-primary'  name='sub' >Submit</button>
                            
</form>
                    </div>
                        
                    
      
                    </div>

";
};

?>
                    </div>
                </div>
            </div>
        </div>
    
    
                    </div>
                </div>
            </div>
        </div>
</body>
</html>