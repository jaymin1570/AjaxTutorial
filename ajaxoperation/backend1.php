<?php

$con = mysqli_connect('localhost','root','','youtubecrudoperation');

extract($_POST);

if(isset($_POST['readrecord'])){
    $data = '<table class=" table table-bordered table-striped ">
    
            <tr>
                <th>NO.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Edit Action </th>
                <th>Delete Action</th>
            </tr>';

            $display_query = "SELECT * FROM crudtable";
            $result = mysqli_query($con,$display_query);

            if(mysqli_num_rows($result) > 0){
                $number=1;
                while($row=mysqli_fetch_array($result)){
                    $data .= '<tr>
                    <td>'.$number.'</td>
                    <td>'.$row['firstname'].'</td>
                    <td>'.$row['lastname'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['mobile'].'</td>
                    <td>
                        <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
                    </td>

                    <td>
                    <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
                    </td>


                    </tr>';
                    $number++;
                }
            }

    $data.='</table>';
    echo $data;
}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile'] ))
{
    $query = "INSERT INTO `crudtable`(`firstname`, `lastname`, `email`, `mobile`) VALUES ('$firstname','$lastname','$email','$mobile') ";

    mysqli_query($con,$query);
}

//delete user record

if(isset($_POST['deleteid'])){


    $userid = $_POST['deleteid'];
    $deletequery = "delete from crudtable where id='$userid' ";
    mysqli_query($con,$deletequery);
}

/// get user id for update

if(isset($_POST['id']) && isset($_POST['id']) != ""){

    $user_id = $_POST['id'];
    $query = "select * from crudtable where id = '$user_id' ";
    if(!$result = mysqli_query($con,$query)){
        exit(mysqli_error(0));
    }

    $response = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $response=$row;
        }
    }
    else{
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // php has some buit-in function to handle JSON.
    // object in PHP can be converted into JSON by using the PHP function
    // json_encode();

    echo json_encode($response);
}
else{
     $response['status'] = 200;
     $response['message'] = "Invalid Request!";
    }

/// update table

if(isset($_POST['hidden_user_id_upd'])){

    $hidden_user_id_upd = $_POST['hidden_user_id_upd'];

    $firstname_upd = $_POST['firstname_upd'];
    $lastname_upd = $_POST['lastname_upd'];
    $email_upd = $_POST['email_upd'];
    $mobile_upd = $_POST['mobile_upd'];

    $query = "UPDATE `crudtable` SET `firstname`='$firstname_upd',`lastname`= '$lastname_upd',`email`= '$email_upd',`mobile`='$mobile_upd' WHERE id = '$hidden_user_id_upd' ";

    mysqli_query($con,$query);
}

?>