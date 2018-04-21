<?php

if(isset($_POST['s1'])){
    leaveapply();
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
    <body>

            <br><br><br>
            <div class="row ">
                <div class="col-lg-offset-2 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Apply here for your leaves</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" name="f" enctype="multipart/form-data" onsubmit="return abc()">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">From</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="from" name="from" readonly value="<?php echo($_SESSION['emailid']) ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">To</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="to" name="to" required="required">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
        <select class="form-control" id="type"  name="type" >
                                
                                <option >Casual</option>
                                <option >Earn</option>
                                <option >vacational_summer</option>
                                <option >vacational_winter</option>
                                <option >special_casual</option>
                            </select>
    </div>
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">No of days</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="days" name="days" required="required">
    </div>
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Reason</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="reason" name="reason" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Message</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="message" name="message" required="required" rows="5">
      </textarea>
  </div>
    <div class="form-group" style="padding-left:20px;">
    <div class="col-sm-offset-2 col-sm-10">
        <br><button class="btn btn-success" name="s1" id="s1"> Submit</button> &nbsp;&nbsp; <a href="index.php?p=afterfirst" type="button" class="btn btn-warning"> Cancel</a>
    </div>
  </div>
</form>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
                 <div class="col-lg-3"></div>
                </div>
               

        

    </body>
</html>
