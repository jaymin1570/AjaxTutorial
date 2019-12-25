<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    
    <!-- <div class="container "`>
        <div class="row">
            <div class="col-lg-12"><br>
                <h3 class="text-success text-center">AJAX - Asynchrounous JavaScript And XML. </h3>

                <form action="" class="">
                    <div class="form-group">
                        <label for="user">Username : </label>
                        <input type="text" name="" id="user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password : </label>
                        <input type="password" name="" id="pwd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Choose State : </label>
                        <select name="" id="" class="form-control" onchange="myfun(this.value)">
                            <option value="">Select State</option>
                            <option value="Maharastra">Maharastra</option>
                            <option value="Up">Up</option>
                            <option value="Bihar">Bihar</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="">Choose City : </label>
                        <select name="" id="city" class="form-control">
                            <option value="">Select City</option>    
                        </select>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/Javascript">
        
            function myfun(data){
                alert (data);
            

                var req = new XMLHttpRequest();
                req.open("POST","http://localhost/AJAX%20(thapa%20technical)/ajax/response.php?datavalue="+data,true);
                req.send();

                req.onreadystatechange = function(){

                    if(req.readyState == 4 && req.status == 200){
                        document.getElementById('city').innerHTML = req.responseText;
                    }
                    
                    // readyState == 4
                    // Hold the status of the XMLHttpRequest

                    // 0: request not initialized
                    // 1: server connection established
                    // 2: request received
                    // 3: processing request
                    // 4: request finished and response is ready
                }
            }
       
    </script> -->
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>