<?php

include_once '../connected.php';




if($_SERVER["REQUEST_METHOD"]=="GET"){
    $id=$_GET['id'];
  $data=  $connected->prepare("SELECT * FROM users WHERE id='$id'");
  $data->execute();
$row = $data->fetch(PDO::FETCH_ASSOC);
// echo $row["userName"];
}

//   print_r($row);
if($_SERVER["REQUEST_METHOD"]=="POST"){
//   $id=$_POST['id'];
$id=$_GET['id'];
$username=$_POST['userName'];
$email=$_POST['email'];
$password=$_POST['password'];
$is_admin=$_POST['is_admin'];



$dataedit=("UPDATE users SET `userName`='$username',`email`='$email',`password`='$password',`is_admin`='$is_admin' WHERE id='$id'");

     $connected->exec($dataedit);
    header("Location:  http://localhost/form/admain/tables.php");


}




?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                               

                                    <form class="user" method="POST">
                                    <div class="form-group">
                                         
                                        <lable> userName</lable>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="userName" value='<?php echo $row["userName"] ?>'
                                                placeholder="Enter userName...">
                                        </div>

                                        <div class="form-group">
                                        <lable> email</lable>
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" value='<?php echo $row["email"] ?>'>
                                        </div>
                                        <div class="form-group">
                                        <lable> password</lable>

                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" value='<?php echo $row["password"] ?>'>
                                        </div>


                                        <div class="form-group">
                                        <lable> is_admin</lable>

                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name='is_admin' value='<?php echo $row["is_admin"] ?>'>
                                        </div>
                                      
                                        <button type='submit' class="btn btn-primary btn-user btn-block">
                                      edit
                                       </button>
                                        <hr>
                                      
                                    </form>
                                
                                    <hr>
                                    
                                    <div class="text-center">
                                        <!-- <a class="small" href="register.php">Create an Account!</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>