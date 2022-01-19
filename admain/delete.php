<?php


include_once '../connected.php'; 


if($_SERVER["REQUEST_METHOD"]=="GET"){
  $delete=$_GET["id"];
//   $edit=$_POST['Edit'];

// foreach($_POST as $name=>$value){
    // echo $name;
    // echo $value;

    //  if($name=='delete'){
      $deletedata=$connected->prepare("DELETE FROM users WHERE id='$delete'");
    $deletedata->execute();

    echo "haneen";
    echo $delete;
    header("Location:  http://localhost/form/admain/tables.php");

    //  }
// }                               
  }  






?>