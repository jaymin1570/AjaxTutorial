<?php

$con = mysqli_connect('localhost','root');
if($con){
    echo "success";
}
echo "<br>";
$db = mysqli_select_db($con,'formdb');
if($db){
    echo "successfull connect database...";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container col-lg-6">
        <h2 class="text-center text-danger"> Get data from Database</h2>
        <form action="">
            Username : <input type="text"   class="form-control"><br>
            Password : <input type="password"  class="form-control"><br>

            Degree : <select name="" class="form-control" onchange="myfun(this.value)">
                        <option >Select Any One</option>
                         
                        <?php

                        $q = "select * from degree";
                        $result = mysqli_query($con,$q); 
                        while($row = mysqli_fetch_array($result)){

                        ?>
                            <option value="<?php echo $row['mid']; ?>">
                            <?php echo $row['degrees']; ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select><br>

            Class : <select name="" class="form-control" id='dataget'>
                <option >Choose Any One</option>
  
            </select><br>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script type="text/JavaScript">
        function myfun(datavalue){
            $.ajax({
                url: 'class.php',
                type: 'POST',
                data:{ datapost : datavalue },

                success: function(result){
                    $('#dataget').html(result);
                }

            });
        }
    </script>
    
</body>
</html>