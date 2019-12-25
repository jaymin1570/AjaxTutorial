<?php

$con = mysqli_connect('localhost','root');

$db = mysqli_select_db($con,'formdb');

$nameid = $_POST['datapost'];

$q = "select * from classes where mid = '$nameid'";
$result = mysqli_query($con,$q);

while($row = mysqli_fetch_array($result)){
?>
    <option > <?php echo $row['class'];  ?> </option>
<?php
    }
?>