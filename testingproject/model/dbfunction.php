<?php

function insert() {
    extract($_POST);
    $fname = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, "img1/$fname");
    $con = getConnection();
    $stmt = $con->prepare("insert into 
              emp(emp_id,emp_name,emp_email,emp_password,emp_address,emp_type,emp_department,emp_dob, emp_doj, emp_number, emp_photo)  
                  values(?,?,?,?,?,?,?,?,?,?,?) ");
    $stmt->bind_param("issssssssss",$id, $na, $ea, $pas, $add, $type, $dep, $dob, $doj, $num, $pho) or die(mysqli_error($con));
    $id = $id;
    $na = $name;
    $ea = $email;
    $pas = md5($password);
    $num = $mobilenumber;
    $dob = $dob;
    $doj = $doj;
    $add = $address;
    $pho = $fname;
    $dep = $department;
    $type = $type;

    $stmt->execute() or die(mysqli_error($con));
}

function request1paging($req) {
    $link = isset($_GET['q'])?$_GET['q']:1;
      $s = $link*$req ;
      $f = $s-$req; 
 
    $emailid =  $_SESSION['emailid'];
    $con = getConnection();
    $stmt = $con->prepare("select * from apply where fr = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("s", $f1);
    $f1 = $emailid;
    $stmt->bind_result( $fr, $t, $reas, $mess, $status,$id, $type, $days);
   
    $stmt->execute();

    $ar = [];
    
    while ($stmt->fetch()) {

        $ar[] = $id; $ar[] = $fr; $ar[] = $t; $ar[] = $reas; 
        $ar[] = $mess; $ar[]=$status; $ar[] = $type; $ar[]=$days;
        
    }
    //print_r($ar[0]);
    return $ar;
}

function select($req) {
    $link = isset($_GET['q'])?$_GET['q']:1;
      $s = $link*$req ;
      $f = $s-$req; 
 
    $id = $_GET['uid'];
    $con = getConnection();
    $stmt = $con->prepare("select * from apply where id = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("i", $f1);
    $f1 = $id;
    $stmt->bind_result($fr, $t, $reas, $mess, $status, $id, $type, $days);
   
    $stmt->execute();

    $ar = [];
    
    while ($stmt->fetch()) {

        $ar[] = $id; $ar[] = $fr; $ar[] = $t; $ar[] = $reas; 
        $ar[] = $mess; $ar[]=$status; $ar[] = $type; $ar[]=$days;
        
    }
    //print_r($ar);
    return $ar;
}

function sinsert() {
    extract($_POST);
    $fname = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, "img1/$fname");
    $con = getConnection();
    $stmt = $con->prepare("insert into 
              supervisor(name,email,password,address,department,dob,doj,number,photo,id)  
                  values(?,?,?,?,?,?,?,?,?,?) ");
    $stmt->bind_param("sssssssssi", $na, $ea, $pas, $add, $dep, $dob, $doj, $num, $pho, $id) or die(mysqli_error($con));
    $na = $name;
    $ea = $email;
    $pas = md5($password);
    $num = $mobilenumber;
    $dob = $dob;
    $doj = $doj;
    $add = $address;
    $pho = $fname;
    $dep = $department;
    $id = $id;

    $stmt->execute() or die(mysqli_error($con));
}

function againcall($a,$ac){
    $lve = $a[6];
    $ea = $ac[0];
    $con = getConnection();
    $stmt = $con->prepare("update leaves set $lve = ? where emp_id = ?") or
          die(mysqli_error($con));
    $stmt->bind_param("ii", $tpe , $e_idd);
    $tpe = $a[7];
    $e_idd = $ea;
    $stmt->execute();
    return 1;
    
}

function updateleaves(){
    $a = select(4);
//    for($i=0 ; $i<count($a) ; $i++){
//        print_r($a[$i]);
//        echo '<br>';
    $con = getConnection();
    $stmt = $con->prepare("select emp_id from emp where emp_email = ?") or
          die(mysqli_error($con));
    $stmt->bind_param("s", $emid);
    $emid = $a[1];
    $stmt->bind_result($e_id);
    $stmt->execute();
    $ac = [];
    while($stmt->fetch()){
        $ac[0] = $e_id;
    }
   // print_r($ac[0]);
    $xs = againcall($a,$ac);
    
    return $xs;
    
}

function requestpaging($req) {
    
    $status = 1;
    $a = $_SESSION['emailid'];
    $con = getConnection();
    $stmt = $con->prepare("select * from apply where t = ? and status = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("si", $a, $status);
    $a = $a;
    $status = $status;
    
    $stmt->bind_result($fr, $t, $reas, $mess, $status, $id, $type, $days);
   
    $stmt->execute();

    $ar = [];
    $co = 0;
    while ($stmt->fetch()) {

        $ar[$co][] = $fr; $ar[$co][] = $t; $ar[$co][] = $reas; $ar[$co][] = $mess; $ar[$co][]=$status; $ar[$co][] = $id;
        $ar[$co][] = $type; $ar[$co][] = $days;
        $co++;
    }
    //print_r($ar);
    return $ar;
}

function arequestpaging($req) {
    
    $con = getConnection();
    $stmt = $con->prepare("select * from apply") or
            die(mysqli_error($con));
      
    $stmt->bind_result($fr, $t, $reas, $mess, $status, $id, $type, $days);
   
    $stmt->execute();

    $ar = [];
    $co = 0;
    while ($stmt->fetch()) {

        $ar[$co][] = $fr; $ar[$co][] = $t; $ar[$co][] = $reas; $ar[$co][] = $mess; $ar[$co][]=$status; $ar[$co][] = $id; $ar[$co][] = $type; $ar[$co][] = $days;
        $co++;
    }
    //print_r($ar);
    return $ar;
}

function leaveapply(){
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("insert into 
            apply(t, fr, reas, mess, status, type, days) 
             values (?,?,?,?,?,?,?)");
  
    $stmt->bind_param("ssssisi", $to , $fr, $reason, $message, $status, $type, $days);
    $to = $to;
    $fr = $from;
    $reason = $reason;
    $message = $message;
    $status = 0;
    $type= $type; 
    $days = $days;
    
    $stmt->execute() or die(mysqli_error($con));
    
}

function changeStatus() {
    $status = $_GET['status'];
     if($status == 0){
         $status = 1 ;
     }
     else if($status == 2){
     $status = 3 ;
     }
     else if($status == 3){
         $status = 3 ;         
     }
     else {
         $status = 1 ;
     }
    $con = getConnection();
    $stmt = $con->prepare("update apply set Status = ? where id= ?") or
            die(mysqli_error($con));
    $stmt->bind_param("ii", $stat , $uidd);
    $stat = $status ;
    $uidd = $_GET['uid'];
    
    $stmt->execute();
    return $stat;
}

function schangeStatus() {
    $status = $_GET['status'];
     if($status == 1 ){
         $status = 2 ;
     }else {
         $status = 1 ;
     }
    $con = getConnection();
    $stmt = $con->prepare("update apply set Status = ? where id= ?") or
            die(mysqli_error($con));
    $stmt->bind_param("ii", $stat , $uidd);
    $stat = $status ;
    $uidd = $_GET['uid'];
    
    $stmt->execute();
}

function requestdelete(){
    extract($_GET);
    $con = getConnection() ;
    $stmt = $con->prepare("delete from"
            . "  apply where id = ? ");
    $stmt->bind_param("i", $id);
    $id = $did;
       
    $stmt->execute() or die(mysqli_error($con));
}

function check_user() {
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select * from emp where emp_email = ? and emp_password = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("ss", $eam, $pas);
    $eam = $ea;
    $pas = md5($pa);
    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $number, $dob, $doj, $photo, $post);
    /* execute query */
    $stmt->execute();

    $ar = [];
    $co = 0;

    while ($stmt->fetch()) {

        $ar[$co][] = $id;
        $ar[$co][] = $email;    
        $co++;
    }
    return $ar;
}

function scheck_user() {
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select post from emp where emp_email = ? and emp_password = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("ss", $eam, $pas);
    $eam = $ea;
    $pas = md5($pa);
    $stmt->bind_result($post);
    /* execute query */
    $stmt->execute();

    $ar = [];
    //$co = 0;

    while ($stmt->fetch()) {

        $ar[0] = $post;    
        //$co++;
    }
    return $ar;
}


function get_details() {
    extract($_POST);
    $id = $_SESSION['id'];
    //print_r($id);
    $con = getConnection();
    $stmt = $con->prepare("select * from leaves where emp_id = ? and year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("ii", $id, $year);
    $id = $id;
    $year = $year;
    $stmt->bind_result($id, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $year, $value);
    /* execute query */
    $stmt->execute();

    $dr = [];
    $bo = 0;

    while ($stmt->fetch()) {

        $dr[$bo][] = $id;
        $dr[$bo][] = $casual;
        $dr[$bo][] = $earn;
        $dr[$bo][] = $earns;
        $dr[$bo][] = $vacational_summer;
        $dr[$bo][] = $vacational_winter;
        $dr[$bo][] = $special_casual;
        $dr[$bo][] = $official_duty;
        $dr[$bo][] = $year;
        $dr[$bo][] = $value;
        $bo++;
    }

    return $dr;
}

function getUserById() {
    $id = $_SESSION['id'];
    //print_r($id);
    $con = getConnection();
    $stmt = $con->prepare("select * from emp where emp_id = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("i", $id);
    $id = $id;

    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $number, $dob, $doj, $photo, $post);
    /* execute query */
    $stmt->execute();

    $dr = [];


    while ($stmt->fetch()) {

        $dr[] = $id;
        $dr[] = $name;
        $dr[] = $email;
        $dr[] = $password;
        $dr[] = $address;
        $dr[] = $number;
        $dr[] = $dob;
        $dr[] = $doj;
        $dr[] = $photo;
        $dr[] = $department;
        $dr[] = $type;
        $dr[] = $post;
    }
    //print_r($dr);
    return $dr;
}

function checkUserById() {
    extract($_POST);
    $id = $_POST['id'];
    // print_r($id);
    $con = getConnection();
    $stmt = $con->prepare("select * from emp where emp_id = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("i", $id);
    $id = $id;

    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $number, $dob, $doj, $photo);
    /* execute query */
    $stmt->execute();

    $dr = [];


    while ($stmt->fetch()) {

        $dr[] = $id;
        $dr[] = $name;
        $dr[] = $email;
        $dr[] = $password;
        $dr[] = $address;
        $dr[] = $number;
        $dr[] = $dob;
        $dr[] = $doj;
        $dr[] = $photo;
        $dr[] = $department;
        $dr[] = $type;
    }

    return $dr;
}

function getById() {
    $id = $_GET['id'];
    // print_r($id);
    $con = getConnection();
    $stmt = $con->prepare("select * from emp where emp_id = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("i", $id);
    $id = $id;

    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $number, $dob, $doj, $photo, $post);
    /* execute query */
    $stmt->execute();

    $dr = [];


    while ($stmt->fetch()) {

        $dr[] = $id;
        $dr[] = $name;
        $dr[] = $email;
        $dr[] = $type;
        $dr[] = $department;
        $dr[] = $dob;
        $dr[] = $doj;
        $dr[] = $number;
        $dr[] = $photo;
        $dr[] = $address;
        $dr[] = $password;
    }

    return $dr;
}

function getleavesById() {
    $id = $_GET['id'];
    $year = $_GET['year'];
    $con = getConnection();
    $stmt = $con->prepare("select * from leaves where emp_id = ? and year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("is", $id, $year);
    $id = $id;
    $year = $year;

    $stmt->bind_result($id, $name, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $year, $acasual, $aearn, $av_summer, $av_winter, $aspecial_casual, $start_date, $end_date, $value);
    /* execute query */
    $stmt->execute();

    $dr = [];


    while ($stmt->fetch()) {

        $dr[] = $id;
        $dr[] = $name;
        $dr[] = $casual;
        $dr[] = $earn;
        $dr[] = $earns;
        $dr[] = $vacational_summer;
        $dr[] = $vacational_winter;
        $dr[] = $special_casual;
        $dr[] = $official_duty;
        $dr[] = $acasual;
        $dr[] = $aearn;
        $dr[] = $av_summer;
        $dr[] = $av_winter;
        $dr[] = $aspecial_casual;
        $dr[] = $start_date;
        $dr[] = $end_date;        
        $dr[] = $year;
        $dr[] = $value;    
        
    }

    return $dr;
}

function fetchallrecords() {
    extract($_POST);
    $con = getConnection();
     
   // print_r($_POST);
   $stmt = $con->prepare("select * from emp where emp_department = ? and emp_type = ?") or die(mysqli_error($con));
    $stmt->bind_param("ss", $dep , $typ);
    $dep = $department;
    $typ = $type;
    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $number, $dob, $doj, $photo);
    $stmt->execute();
     $ar = [];
    $co = 0;
    while ($stmt->fetch()) {
        $ar[$co][] = $id;
        $ar[$co][] = $name;
        $ar[$co][] = $email;
        $ar[$co][] = $address;
        $ar[$co][] = $type;
        $ar[$co][] = $department;
        $ar[$co][] = $number;
        $ar[$co][] = $dob;
        $ar[$co][] = $doj;
        $co++;
    }
    //print_r($ar);
    //return $ar;
    $zi = secondcall($ar,$_POST);
//    $zi[0][2] = $_POST['dep'];
//    $zi[0][3] = $_POST['typ'];
    //print_r($zi);
    return $zi;
}

function secondcall($zi){
    //print_r($zi);
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select emp_name from leaves where year = ?") or die(mysqli_error($con));
    $stmt->bind_param("s", $year); 
    $year = $year;
    $stmt->bind_result($name);
    $stmt->execute();
    $ai = [];
    $ix = 0;
    while($stmt->fetch()){
        $xi = $name;
       // print_r($xi);
        //print_r($zi[1][1]);
       // $i = 0;
//        while($xi === $zi[$i][1]){
//            $ai[$ix] = $xi;
//            $i++;
//        }
        for($i=0;$i<count($zi);$i++){
           // print_r($xi);
            //print_r($zi[$i][1]);
            if($xi == $zi[$i][1]){
                $ai[$ix][0] = $xi;
                $ai[$ix][1] = $_POST['year'];
                $ai[$ix][2] = $_POST['department'];
                $ai[$ix][3] = $_POST['type'];
                 $ix++;
                
            }
        }
       
    }
    //print_r($ai);
    return $ai;
}
function get_profile(){
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select * from emp where emp_id = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("i", $id);
    $id = $empid;
    //print_r($year);

    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $dob, $doj, $number, $photo, $post);
    /* execute query */
    $stmt->execute();

    $vz = [];
    $va = 0;

    while ($stmt->fetch()) {

        $vz[$va][] = $id;
        $vz[$va][] = $name;
        $vz[$va][] = $email;
        $vz[$va][] = $password;
        $vz[$va][] = $address;
        $vz[$va][] = $type;
        $vz[$va][] = $department;
        $vz[$va][] = $dob;
        $vz[$va][] = $doj;
        $vz[$va][] = $number;
        $vz[$va][] = $photo;
        $vz[$va][] = $post;
        
        $va++;
            

    
}
    //print_r($vz);
    return $vz;
    
}

function get_record() {
    // print_r($_POST);
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select * from leaves where (emp_id = ? or emp_name = ?) and year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("iss", $id, $name, $year);
    $id = $s5;
    $name = $name;
    $year = $year;
    //print_r($year);

    $stmt->bind_result($id, $name, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $year, $acasual, $aearn, $aspecial_casual, $av_summer, $av_winter, $start_date, $end_date, $value);
    /* execute query */
    $stmt->execute();

    $vr = [];
    $vo = 0;

    while ($stmt->fetch()) {

        $vr[$vo][] = $id;
        $vr[$vo][] = $casual;
        $vr[$vo][] = $earn;
        $vr[$vo][] = $earns;
        $vr[$vo][] = $vacational_summer;
        $vr[$vo][] = $vacational_winter;
        $vr[$vo][] = $special_casual;
        $vr[$vo][] = $official_duty;
        $vr[$vo][] = $year;
        $vr[$vo][] = $name;
        $vr[$vo][] = $value;        

        $_SESSION['csvid'] = $id;
        $_SESSION['csvyear'] = $year;

        $vo++;
    }
    //  print_r($vr[0][8]);
    return $vr;
}

function delete(){
    extract($_POST);
    $con = getConnection() ;
    $stmt = $con->prepare("delete from"
            . "  leaves  where (emp_id = ? or emp_name = ?)");
    $stmt->bind_param("is", $id, $name);
    $id = $s5;
    $name = $name;
       
    $stmt->execute() or die(mysqli_error($con));
    
}

function delete2(){
    extract($_POST);
    $con = getConnection() ;
    $stmt = $con->prepare("delete from"
            . "  emp  where (emp_id = ? or emp_name = ?)");
    $stmt->bind_param("is", $id, $name);
    $id = $s5;
    $name = $name;
    $stmt->execute() or die(mysqli_error($con));
    
}

function selectp(){

    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select * from emp where (emp_id = ? or emp_name = ?)") or
            die(mysqli_error($con));
    $stmt->bind_param("is", $id, $name);
    $id = $s5;
    $name = $name;
    //print_r($year);

    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $number, $dob, $doj, $photo);
    /* execute query */
    $stmt->execute();

    $vr = [];

    while ($stmt->fetch()) {

        $vr[] = $id;
        $vr[] = $name;
        $vr[] = $email;
        $vr[] = $address;
        $vr[] = $type;
        $vr[] = $department;
        $vr[] = $number;
        $vr[] = $dob;
        $vr[] = $doj;
        $vr[] = $photo;

    }
    
    unlink("img1/$vr[9]");
    return $vr;
}

function getUserRecord() {
    $s5 = $_SESSION['id'];
    $year = $_GET['d'];
    //print_r($year);
    $con = getConnection();
    $stmt = $con->prepare("select * from leaves where emp_id = ? and year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("is", $id, $year);
    $id = $s5;
    $year = $year;


    $stmt->bind_result($id, $name, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $year,$acasual,$aearn,$aspecial_casual,$av_summer,$av_winter,$start_date,$end_date, $value);
    /* execute query */
    $stmt->execute();

    $vr = [];


    while ($stmt->fetch()) {

        $vr[] = $id;
        $vr[] = $casual;
        $vr[] = $earn;
        $vr[] = $earns;
        $vr[] = $vacational_summer;
        $vr[] = $vacational_winter;
        $vr[] = $special_casual;
        $vr[] = $official_duty;
        $vr[] = $year;
        $vr[] = $name;
        $vr[] = $acasual;
        $vr[] = $aearn;
        $vr[] = $av_summer;
        $vr[] = $av_winter;
        $vr[] = $start_date;
        $vr[] = $end_date;
        $vr[] = $aspecial_casual;
        $vr[] = $value;
    }

    header('Content-Type: application/json');
    echo json_encode($vr);
//        return $vr ;
}

function updatep() {
    //$a = $_SESSION['id'];
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("UPDATE emp SET emp_name = ?,emp_email = ?,emp_address = ?,emp_type = ?,emp_department = ?,
           emp_dob = ?,emp_doj = ?,emp_number = ?
          where emp_id = ?");
    //print_r($stmt);
    $stmt->bind_param("ssssssssi", $na, $em, $add, $type, $dep, $dob, $doj, $num, $uid);

    $na = $name;
    $em = $email;
    $add = $add;
    $type = $type;
    $dep = $department;
    $dob = $dob;
    $doj = $doj;
    $num = $mobile;
    $uid = $id;

    $stmt->execute();
    $stmt->close();
}

function updatevalue4() {
    
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("UPDATE leaves SET value = 4 where emp_name= ? and year= ?");
    $stmt->bind_param("ss", $name, $year);
    $name = $_POST['name'];
    $year = $_POST['year'];

    $stmt->execute();
    $stmt->close();
}

function updatevalue3() {
    
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("UPDATE leaves SET value = 3 where emp_name= ? and year= ?");
    $stmt->bind_param("ss", $name, $year);
    $name = $_POST['name'];
    $year = $_POST['year'];

    $stmt->execute();
    $stmt->close();
}

function updatevalue2() {
    
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("UPDATE leaves SET value = 2 where emp_name= ? and year= ?");
    $stmt->bind_param("ss", $name, $year);
    $name = $_POST['name'];
    $year = $_POST['year'];

    $stmt->execute();
    $stmt->close();
}

function updatevalue1() {
    
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("UPDATE leaves SET value = 1 where emp_name= ? and year= ?");
    $stmt->bind_param("ss", $name, $year);
    $name = $_POST['name'];
    $year = $_POST['year'];

    $stmt->execute();
    $stmt->close();
}

function updatephoto() {
    //$a = $_SESSION['id'];
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("UPDATE emp SET emp_photo = ? where emp_id = ?");
    //print_r($stmt);
    $stmt->bind_param("si", $ph, $uid);

    $ph = $photo;
    $uid = $id;

    $stmt->execute();
    $stmt->close();
}

function getrecord() {
    $con = getConnection();
    $stmt = $con->prepare("select * from leaves where emp_id = ? and year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("ii", $id, $year);
    $id = $_SESSION['id'];
    $year = $_SESSION['year'];


    $stmt->bind_result($id, $name, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $year, $acasual, $aearn, $aspecial_casual, $av_summer, $av_winter, $start_date, $end_date, $value);
    /* execute query */
    $stmt->execute();

    $vr = [];
    $vo = 0;

    while ($stmt->fetch()) {

        $vr[$vo][] = $id;
        $vr[$vo][] = $casual;
        $vr[$vo][] = $earn;
        $vr[$vo][] = $earns;
        $vr[$vo][] = $vacational_summer;
        $vr[$vo][] = $vacational_winter;
        $vr[$vo][] = $special_casual;
        $vr[$vo][] = $official_duty;
        $vr[$vo][] = $year;
        $vr[$vo][] = $name;
        $vr[$vo][] = $value;        

        $vo++;
    }
    //print_r($vr);
    return $vr;
}

function getfromvalue() {
    $con = getConnection();
    $dr = getleavesById();
    $cr = getById();
    $value1 = $r[1]=$dr[17]-1;
    $name1 = $cr[1];
    
    $stmt = $con->prepare("select earns from leaves where value = $value1 and emp_name= ?") or
            die(mysqli_error($con));
    
    $stmt->bind_param("s", $name);
    $name = $name1;
    
    $stmt->bind_result($val);

    $stmt->execute();
    
    $aa = [];

    while ($stmt->fetch()) {
        $aa = $val;
    }
    return $aa;
}

function aupdate() {
    //$a = $_SESSION['id'];
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("UPDATE leaves SET casual = ?, earn = ?,earns = ?,
           vacational_summer = ?, vacational_winter = ?, special_casual = ?, official_duty = ?
          where emp_id = ? and year = ?");

    $stmt->bind_param("iiiiiiiis", $ca, $ea, $eas, $vs, $vw, $sca, $od, $id, $year);

    $ca = $casual;
    $ea = $earn;
    $eas = $earns;
    $vs = $summer;
    $vw = $winter;
    $sca = $special;
    $od = $official;
    $id = $_SESSION['id'];
    $year = $_SESSION['year'];

    $stmt->execute();
    $stmt->close();
}

function leave_insert() {
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("insert into 
              leaves(emp_id,emp_name,acasual,aearn,av_summer,av_winter,aspecial_casual,casual,earn,earns,vacational_summer,vacational_winter,special_casual, official_duty,start_date,end_date,year)  
                  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
    $stmt->bind_param("isiiiiiiiiiiiisss", $id, $name, $aca, $aea, $avs, $avw, $asc, $ca, $ea, $eas, $vs, $vw, $sc, $od, $sd, $ed, $year);
    $id = $id;
    $name = $name;
    $aca = $acasual;
    $aea = $aearn;
    $avs = $asummer;
    $avw = $awinter;
    $asc = $aspecial;
    $ca = $casual;
    $ea = $earn;
    $eas = $earns;
    $vs = $summer;
    $vw = $winter;
    $sc = $special;
    $od = $official;
    $sd = $startdate;
    $ed = $enddate;
    $year = $year;
    
    //print_r($year);

    $stmt->execute() or die(mysqli_error($con));
}

function getdetails() {
    extract($_POST);
    //print_r($id);
    $con = getConnection();
    $stmt = $con->prepare("select * from leaves where emp_id = ? and emp_name = ? and year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("isi", $id, $name, $year);
    $id = $id;
    $year = $year;
    $name = $name;
    $stmt->bind_result($id, $name,$acasual, $aearn, $av_summer, $av_winter, $special_casual, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $start_date, $end_date, $year, $value);
    /* execute query */
    $stmt->execute();

    $dr = [];
    $bo = 0;

    while ($stmt->fetch()) {

        $dr[$bo][] = $id;
        $dr[$bo][] = $casual;
        $dr[$bo][] = $earn;
        $dr[$bo][] = $earns;
        $dr[$bo][] = $vacational_summer;
        $dr[$bo][] = $vacational_winter;
        $dr[$bo][] = $special_casual;
        $dr[$bo][] = $official_duty;
        $dr[$bo][] = $year;
        $dr[$bo][] = $name;
        $dr[$bo][] = $value;        
        $bo++;
    }

    return $dr;
}

function getid() {
    extract($_POST);
    $con = getConnection();
    //print_r($leave);
    $stmt = $con->prepare("select sum($leave) from emp e1 Join leaves l1 where e1.emp_id = l1.emp_id and e1.emp_department = ? and l1.year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("si", $department, $year);
    // $type = $leave;
    $department = $department;
    $year = $year;
    $stmt->bind_result($val);
    $stmt->execute();
    $aa = [];
    $ai = 0;

    while ($stmt->fetch()) {

        $aa[$ai] = $val;
        $ai++;
    }
    //print_r($aa);
    return $aa;
}

function getdepartment() {
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select * from emp where emp_department = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("s", $department);
    $department = $department;
    $stmt->bind_result($id, $name, $email, $password, $address, $department, $number, $dob, $doj, $photo);
    $stmt->execute();
    $xy = [];
    while ($stmt->fetch()) {

        $xy[] = $department;
    }
    // print_r($xy);
    return $xy;
}

function gettypee() {
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select * from leaves where year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("i", $year);
    $year = $year;
    $stmt->bind_result($id, $name,$acasual, $aearn, $av_summer, $av_winter, $special_casual, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $start_date, $end_date, $year, $value);
    $stmt->execute();
    $xz = [];
    while ($stmt->fetch()) {

        $xz[] = $year;
        $xz[] = $leave;
    }
    // print_r($xz);
    return $xz;
}

function downloadCSV() {

    $con = getConnection();
    $stmt = $con->prepare("select * from leaves where emp_id = ?  and year = ?") or
            die(mysqli_error($con));
    $stmt->bind_param("is", $id, $year);
    $id = $_SESSION['csvid'];
    $year = $_SESSION['csvyear'];
    //print_r($year);

    $stmt->bind_result($id, $name,$acasual, $aearn, $av_summer, $av_winter, $special_casual, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $start_date, $end_date, $year, $value);
    /* execute query */
    $stmt->execute();

    $vr = [];
    while ($stmt->fetch()) {

        $vr['id'] = $id;
        $vr['name'] = $name;
        $vr['casual'] = $casual;
        $vr['earn'] = $earn;
        $vr['vacational_summer'] = $vacational_summer;
        $vr['vacational_winter'] = $vacational_winter;
        $vr['special_casual'] = $special_casual;
        $vr['official_duty'] = $official_duty;
        $vr['year'] = $year;
        $vr['total'] = $casual + $earn + $vacational_summer + $vacational_winter + $special_casual;
    }
//    $result = $stmt->get_result();
//    $assoc = $result->fetch_assoc();
   // print_r($assoc);
   download_csv_results($vr, 'test.csv');
    exit();
}

function download_csv_results($results, $name) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename=' . $name);
    header('Pragma: no-cache');
    header("Expires: 0");

    $outstream = fopen("php://output", "w");
   
        fputcsv($outstream, array_keys($results));
   
  
        fputcsv($outstream, array_values($results));
  


    fclose($outstream);
}

function fetchAllRecord1(){
    extract($_POST);
    $con = getConnection();
     
   // print_r($_POST);
   $stmt = $con->prepare("select * from emp where emp_department = ?") or die(mysqli_error($con));
    $stmt->bind_param("s", $dep);
    $dep = $department;
    //$typ = $type;
    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $number, $dob, $doj, $photo);
    $stmt->execute();
     $ar = [];
    $co = 0;
    while ($stmt->fetch()) {
        $ar[$co][] = $id;
        $ar[$co][] = $name;
        $ar[$co][] = $email;
        $ar[$co][] = $address;
        $ar[$co][] = $type;
        $ar[$co][] = $department;
        $ar[$co][] = $number;
        $ar[$co][] = $dob;
        $ar[$co][] = $doj;
        $co++;
    }
   // print_r($ar);
    return $ar;

    
}

function fetchAllRecord2(){
    extract($_POST);
    $con = getConnection();
     
    //print_r($_POST);
   $stmt = $con->prepare("select * from emp where emp_type = ?") or die(mysqli_error($con));
    $stmt->bind_param("s", $typ);
    //$dep = $department;
    $typ = $type;
    $stmt->bind_result($id, $name, $email, $password, $address, $type, $department, $number, $dob, $doj, $photo);
    $stmt->execute();
     $ar = [];
    $co = 0;
    while ($stmt->fetch()) {
        $ar[$co][] = $id;
        $ar[$co][] = $name;
        $ar[$co][] = $email;
        $ar[$co][] = $address;
        $ar[$co][] = $type;
        $ar[$co][] = $department;
        $ar[$co][] = $number;
        $ar[$co][] = $dob;
        $ar[$co][] = $doj;
        $co++;
    }
    //print_r($ar);
    return $ar;
}

function fetch(){
    extract($_POST);
    $con = getConnection();
     
    //print_r($_POST);
   $stmt = $con->prepare("select * from leaves") or die(mysqli_error($con));
    $stmt->bind_result($id, $name,$acasual, $aearn, $av_summer, $av_winter, $special_casual, $casual, $earn, $earns, $vacational_summer, $vacational_winter, $special_casual, $official_duty, $start_date, $end_date, $year, $value);
    /* execute query */
    $stmt->execute();

    $dr = [];
    $bo = 0;

    while ($stmt->fetch()) {

        $dr[$bo][] = $id;
        $dr[$bo][] = $name;
        $dr[$bo][] = $casual;
        $dr[$bo][] = $earn;
        $dr[$bo][] = $earns;
        $dr[$bo][] = $vacational_summer;
        $dr[$bo][] = $vacational_winter;
        $dr[$bo][] = $special_casual;
        $dr[$bo][] = $official_duty;
        $dr[$bo][] = $year;
        $dr[$bo][] = $value;        
        $bo++;
    }

    return $dr;
}

function nested($py){
    extract($_POST);
   // print_r($py);
   // print_r($_POST);
    $con = getConnection();
    $stmt = $con->prepare("select $leave from leaves where emp_name = ? and year = ?") or die(mysqli_error($con));
    $stmt->bind_param("ss", $en, $year) or die(mysqli_error($con));
    $en = $py;
    $year = $year;
    $stmt->bind_result($n);
    $stmt->execute();
    $a = 0;
    while ($stmt->fetch()) {
    $a=$n;}
   
   //  print_r($a);
     return $a;
}

function addleaves(){
    
    extract($_POST);
   // print_r($_POST);
    for($i=0;$i<count($abc);$i++){
     //for($j=0;$j<count($_POST['leave');$j++){
        $de=$abc[$i];
   //print_r($de);
      
//   print_r($leave);
//   print_r($num);
//   print_r($year);
    
    $con = getConnection();
    $zx = nested($de);
    //print_r($zx);
//    $rlt = $con->prepare("select $leave from leaves where emp_name = ? and year = ?) or die(mysqli_error($con));
//    $nu = $num;
//    $en = $de;
//    $year = $year;
    
    $stmt = $con->prepare("UPDATE leaves SET $leave = $zx + ? where emp_name = ? and year = ?") or die(mysqli_error($con));
    $stmt->bind_param("iss", $nu, $en, $year) or die(mysqli_error($con));
    $nu = $num;
    $en = $de;
    $year = $year;
    $stmt->execute() or die(mysqli_error($con));
    }
}

function update_post(){
    extract($_POST);
    $con = getConnection();
    $stmt = $con->prepare("UPDATE emp SET post = ? where emp_id = ?");
    //print_r($stmt);
    $stmt->bind_param("si", $post,$empid);

    $post = $post;
    $empid = $empid;

    $stmt->execute();
    $stmt->close();
}
?>
