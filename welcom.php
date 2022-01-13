<?php

session_start();
var_dump($_SESSION["Login"]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


 <?php

foreach($_SESSION["Login"] as $element){
    echo "<h1>Welcom $element</h1>";
}

?>


    
</body>
</html>