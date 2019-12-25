<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAXcrud operation</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



</head>

<body>

    <div class="container">
        <h2 class="text-primary text-center text-uppercase"> AJAX CRUD OPERATION </h2>
        <div class="d-flex justify-content-end">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                Open modal
            </button>
        </div>


        <div>
            <h2 class="text-danger">All Records</h2>
        </div>

        <div id="records_contant">
        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">AJAX CRUD OPERATION</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form action="">
                            <div class="form-group">
                                <label for="">Firstname :</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Lastname :</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="">Email Id :</label>
                                <input type="email" name="emial" id="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Mobile Number :</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" maxlength="10">
                            </div>


                        </form>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>


                </div>
            </div>
        </div>

            <!-- Upadate Modal -->
            <!-- The Modal -->
        <div class="modal" id="update_user_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">AJAX CRUD OPERATION</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form action="">
                            <div class="form-group">
                                <label for="update_firstname">update_Firstname :</label>
                                <input type="text" id="update_firstname" class="form-control" placeholder="First Name" >
                                
                            <div class="form-group">
                                <label for="update_lastname">update_Lastname :</label>
                                <input type="text"  id="update_lastname" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="update_email">update_Email Id :</label>
                                <input type="email"  id="update_email" class="form-control" placeholder="Email" >
                            </div>
                            <div class="form-group">
                                <label for="update_mobile">update_Mobile Number :</label>
                                <input type="text"  id="update_mobile" class="form-control" placeholder="Mobile Number" maxlength="10">
                            </div>


                        </form>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateuserdetail()">Update
                    </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="hidden" name="" id="hidden_user_id">
                    </div>


                </div>
            </div>
        </div>
    </div>



    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/JavaScript">

    $(document).ready(function(){
        readRecord();
    });

        function readRecord(){
            var readrecord = "readrecord";
            $.ajax({
                url:'backend1.php',
                type:'POST',
                data:{
                    readrecord: readrecord},

                success: function(data,status){
                    $('#records_contant').html(data);
                }

            });
        };

        function addRecord(){
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var email = $('#email').val();
                var mobile = $('#mobile').val();

                $.ajax({
                    url:'backend1.php',
                    type:'POST',
                    data : { firstname : firstname,
                        lastname : lastname,
                        email : email,
                        mobile : mobile
                     },

                     success: function(data,status){
                        readRecord();
                     }


                });
            }


            //delete record 
            function DeleteUser(deleteid){
                var conf = confirm("Are You Sure ....");
                if(conf == true){
                    $.ajax({
                        url:'backend1.php' ,
                        type: 'POST',
                        data : {deleteid : deleteid},

                        success : function(data,status){
                            readRecord();
                        }
                    });
                }
            }


            //Edit user details
            function GetUserDetails(id){
                $('#hidden_user_id').val(id);
                
                $.post("backend1.php",{
                    id:id
                },function(data,status){

                    var user = JSON.parse(data);
                    $('#update_firstname').val(user.firstname);
                    $('#update_lastname').val(user.lastname);
                    $('#update_email').val(user.email);
                    $('#update_mobile').val(user.mobile);
                }
                );

                $('#update_user_modal').modal("show");

            }

            function updateuserdetail(){
                var firstname_upd = $('#update_firstname').val();
                var lastname_upd = $('#update_lastname').val();
                var email_upd = $('#update_email').val();
                var mobile_upd = $('#update_mobile').val();

                var hidden_user_id_upd = $('#hidden_user_id').val();

                $.post("backend1.php",
                {
                    firstname_upd : firstname_upd,
                        lastname_upd : lastname_upd,
                        email_upd : email_upd,
                        mobile_upd : mobile_upd,
                        hidden_user_id_upd: hidden_user_id_upd
                },
                function(data,status){
                    $('#update_user_modal').modal("hide");
                    readRecord();
                }
                );
            }


        </script>

</body>

</html>