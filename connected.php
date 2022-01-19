<?php

$username='root';
$pass='';

try{
    $connected=new PDO ("mysql:host=localhost;dbname=store",$username,$pass);
    echo "Connected successfully";
}

catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>