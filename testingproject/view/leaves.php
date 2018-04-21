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

        <script>
            $(document).ready(function () {
                $("#year").change(function () {
                    var url1 = "model/ajax.php?d="+$("#year").val();
                     alert(url1);
                    $.ajax({
                        type: "get",
                        url: url1,
                        data: "",
                        datatype: "html",
                        success: function (resp, status) {
                       


                            $("#cl").html(resp[1]);
                            var cl2 = 10 - resp[1];
                            $("#cl2").html(cl2);

                            $("#el").html(resp[2]);
                            var el2 = resp[3];
                            //alert(el2);
                            $("#el2").html(el2);
                            //  $("#d2").html(resp);
                            $("#vls").html(resp[4]);
                            var vls2 = 15 - resp[4];
                            $("#vls2").html(vls2);
                            $("#vlw").html(resp[5]);
                            var vlw2 = 7 - resp[5];
                            $("#vlw2").html(vlw2);
                            $("#spl").html(resp[6]);
                            var spl2 = 12 - resp[6];
                            $("#spl2").html(spl2);
                            $("#ofl").html(resp[7]);
                        }
                    });
                });
            });
        </script>
        <script>
            function abc() {
                window.print();
            }
        </script>
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
    <body  >
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
                  <div id="section-to-print">
                      <br>
                <form method="post" class="col-lg-8">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Year</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="year" style="width: 25%;" name="year" >
                                <option >Select year</option>
                                <option >2016-2017</option>
                                <option>2015-2016</option>
                                <option>2014-2015</option>
                                <option>2013-2014</option>
                            </select>

                        </div>
                    </div>


                </form>
                <br>
                <br>
                <br>
              
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


                        </tr>
                        <tr class="success">
                            <td>
                                Casual leaves
                            </td>
                            <td>
                                10
                            </td>
                            <td>
                                <span id="cl"></span>

                            </td>
                            <td>
                                <span id="cl2"></span>
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
                                <span id="el"></span>
                            </td>
                            <td>
                                <span id="el2"></span>
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
                                <span id="vls"></span>
                            </td>
                            <td>
                                <span id="vls2"></span>
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
                                <span id="vlw"></span>
                            </td>
                            <td>
                                <span id="vlw2"></span>
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
                                <span id="spl"></span>
                            </td>
                            <td>
                                <span id="spl2"></span>
                            </td>


                        </tr>

                        <tr class="success">
                            <td>
                                Official duty
                            </td>
                            <td>

                            </td>
                            <td>
                                <span id="ofl"></span>
                            </td>
                            <td>

                            </td>


                        </tr>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>