<?php


include_once '../connected.php'; 


if($_SERVER["REQUEST_METHOD"]=="GET"){
  $delete=$_GET["id"];
  if($_GET["name"]=="products"){
    $deletedata=$connected->prepare("DELETE FROM products WHERE id='$delete'");
    header("Location:  http://localhost/form/admain/productstables.php");
 
  }

  elseif($_GET["name"]=="Categories"){
    $deletedata=$connected->prepare("DELETE FROM products WHERE Category_id='$delete'");
    $deletedata->execute();
    $deletedata=$connected->prepare("DELETE FROM categories WHERE id='$delete'");
    header("Location: http://localhost/form/admain/Categorietables.php");

  }
 

  elseif($_GET["name"]=="users"){
    $deletedata=$connected->prepare("DELETE FROM users WHERE id='$delete'");
    header("Location:  http://localhost/form/admain/tables.php");

  }
  $deletedata->execute();
  

    echo "haneen";
    echo $delete;

    //  }
// }                               
  }  






?>