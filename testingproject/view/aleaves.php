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

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>

         </head>
    <body >

        <div class="container">
            <div class="page-header">
                <h1> <small>LRMS</small></h1>
                <div class="col-lg-5" style="margin-left: 900px;">
                <?php
                $ar = scandir("img1");
       
       foreach ($ar as $val) {
           if($val == "." || $val == "..")
           {}else{
           
           echo "<img src='img1/$val' height='120' width='200' class='img-circle' /> <br>";
          
           
           echo "<center>";
           }
       }
       
       ?> 
                </div>
            </div>
            
       
            
            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav nav-pills nav-stacked" 
                        >
                        <li role="presentation" class="active"><a href="index.php?p=afterfirst">Home</a></li>
                        <li role="presentation" class="active"><a href="index.php?p=search">Search</a></li>
                        
                    </ul>
                </div>
                <div class="col-lg-10">

                    <table class="table table-bordered table-hover
                           table-striped text-center
                           ">
                        
                        <tr class="danger">
                            <th class="text-center">
                                Leave types
                            </th >
                            <th class="text-center">
                                Total leaves
                            </th>
                            <th class="text-center">
                                Leaves taken
                            </th>
                            <th class="text-center">
                                Leaves left
                            </th>
                            <th colspan="2" class="text-center">
                                operation
                            </th>
                            
                            
                        </tr>
                        <tr class="success">
                            <td>
                                Casual leaves
                            </td>
                            <td>
                                10
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title=" Edit "><span class="glyphicon glyphicon-pencil"></span></button>                           

                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" 
                                        data-placement="top" title=" delete "><span class="glyphicon glyphicon-trash"></span></button>                           

                            </td>
                            
                            
                        </tr>
           
                        <tr class="success">
                            <td>
                                Earn leaves
                            </td>
                            <td>
                                7
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title=" Edit "><span class="glyphicon glyphicon-pencil"></span></button>                           

                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" 
                                        data-placement="top" title=" delete "><span class="glyphicon glyphicon-trash"></span></button>                           

                            </td>
                            
                        </tr>
           
                        <tr class="success">
                            <td>
                                Vacational leaves(summer)
                            </td>
                            <td>
                                15
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title=" Edit "><span class="glyphicon glyphicon-pencil"></span></button>                           

                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" 
                                        data-placement="top" title=" delete "><span class="glyphicon glyphicon-trash"></span></button>                           

                            </td>
                            
                            
                        </tr>
           
                        <tr class="success">
                            <td>
                                vacational leaves(winter)
                            </td>
                            <td>
                                7
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title=" Edit "><span class="glyphicon glyphicon-pencil"></span></button>                           

                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" 
                                        data-placement="top" title=" delete "><span class="glyphicon glyphicon-trash"></span></button>                           

                            </td>
                            
                            
                        </tr>
           
                        <tr class="success">
                            <td>
                               Special casual leaves
                            </td>
                            <td>
                                12
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title=" Edit "><span class="glyphicon glyphicon-pencil"></span></button>                           

                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" 
                                        data-placement="top" title=" delete "><span class="glyphicon glyphicon-trash"></span></button>                           

                            </td>
                            
                            
                        </tr>
           
                        <tr class="success">
                            <td>
                                Official duty
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title=" Edit "><span class="glyphicon glyphicon-pencil"></span></button>                           

                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" 
                                        data-placement="top" title=" delete "><span class="glyphicon glyphicon-trash"></span></button>                           

                            </td>
                            
                            
                        </tr>
                </div>
            </div>