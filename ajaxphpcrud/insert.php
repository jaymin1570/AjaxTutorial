<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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

    <div class="container col-lg-8 m-auto"><br>
        <h2 class="text-center ">Insert Data using AJAX PHP and MySQLi3</h2><br>
        <div>
            <form action="insertphp.php" id="myform" method="post">
                <div class="form-group">
                    <label>Username :</label><span id="Uname" style="color:red;"></span>
                    <input type="text" name="Username" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password :</label><span id="Pass" style="color:red;"></span>
                    <input type="text" name="Password" class="form-control">
                </div>

                <input type="submit" name="submit" value=Submit id="submit" class="btn btn-primary">
            </form>
        </div>
    </div>

    <div class="container col-lg-8 m-auto"><br><br>
        <h2 class="text-center bg-dark text-white">Display Data using AJAX</h2><br>
        <button class="btn btn-danger" id="displaydata">Get Data</button><br><br>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <th> Id </th>
                <th> Name </th>
                <th> Password </th>
            </thead>

            <tbody id="response">

            </tbody>

        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var form = $('#myform');

            $('#submit').click(function() {

                $.ajax({
                    url: form.attr("action"),
                    type: 'POST',
                    data: $('#myform input').serialize(),

                    success: function(data) {
                        console.log(data);
                    }

                });

            });

            // $('#displaydata').click(function(){
                displaydata();

            function displaydata() {
                $.ajax({

                    url: 'displayajax.php',
                    type: 'POST',

                    success: function(responsedata) {
                        $('#response').html(responsedata);
                    }

                });
            }
            // });

        });
    </script>

</body>

</html>