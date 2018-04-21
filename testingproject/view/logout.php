<?php
if(isset($_SESSION['id'])){
    session_destroy();
    unset($_SESSION);
    header("location:index.php?p=login");
}