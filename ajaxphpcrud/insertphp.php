<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'ajaxcrud');

extract($_POST);

if(isset($_POST['submit'])){
        $q = "insert into ajaxinsert (username,password) values
        ('$Username','$Password')";

        $query = mysqli_query($con,$q);
         header('location:insert.php');
    }
?>