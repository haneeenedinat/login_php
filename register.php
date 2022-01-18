<?php
//    session_start();

   $username='root';
   $pass='';
   

try {
  $connected = new PDO("mysql:host=localhost;dbname=store",$username,$pass);

  echo "Connected successfully";
} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


if($_SERVER["REQUEST_METHOD"]=="POST"){

   $email=$_POST["email"];
   $password=$_POST["password"];
   $confirmpassword=$_POST["confirmpassword"];
   $userName=$_POST["username"];


$regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";

 if( empty($userName)){
    $userNameErr= "The email is not valid";
   }

   if(!preg_match($regex, $email) || empty($email)){
    $emailErr= "The email is not valid";
   }

  if(empty($password) ||  strlen($password)<= 7){
      $passwordErr= " Password must be longer than 8 characters";
   }

   if( $password !== $confirmpassword){
       $confirmpasswordErr="The password is not matched";
   }

   if(preg_match($regex, $email) && !empty($email) && !empty($password) && strlen($password) > 7 && $password == $confirmpassword){
    // $_SESSION["Register"][]=[
    //     'Email'=>$email,
    //     'password'=>$password,
    // ];



    $sql = "INSERT INTO users (username,email,password)
    VALUES ('$userName','$email' , '$password')";
     $connected->exec($sql);
   
    header("Location: http://localhost/form/login.php/");
    
   }
  
}

// var_dump($_SESSION["Register"]);

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" rel="stylesheet">


    <title>Document</title>
</head>
<body>
<div class="nav-side-menu">
   

<div class="container">
    <h2 class="">&nbsp</h2>
	<div class="row">
		<div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form action=""   method="POST">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Register</h3>
                                   
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="UserName" ></input>
                                        <span><?php if(isset( $userNameErr))  echo  $userNameErr."<br>"; ?> </span>
                                    </div>
                                </div>
                                                
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" ></input>
                                        <span><?php if(isset( $emailErr))  echo  $emailErr."<br>"; ?> </span>
                                    </div>
                                </div>
                                
                               
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password"  ></input>
                                        <span><?php if(isset($passwordErr))  echo $passwordErr."<br>" ; ?></span>
                                    </div>
                                </div>
                              

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="confirmpassword"  ></input>
                                        <span><?php if(isset($confirmpasswordErr)) echo $confirmpasswordErr;   ?></span>
                                    </div>
                                </div>
                              

                                
                                
                                <div class="text-center">
                                    <input type="submit" value="Register" class="btn btn-info btn-block rounded-0 py-2"></input>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>

</body>
</html>