<?php

if (isset ($_POST['id'])) {
    require '../db_conn.php';
    $id= $_POST['id'];

   if (empty($id)){
    echo 'error';
}else{
    $todos = $conn->prepare("SELECT id,checked FROM todos WHERE  id=?" );
    $todos->exucute([$id]);

    $todos = $todos->fetch();
    $uId = $ todos->['id'];
    $checked = $todo['checked'];

    $uChecked =  $checked ? 0 : 1;
    $res = $conn->querry("UPDATE todos SET checked=$uChecked WHERE id =$uId");

    if($re){
        echo $checked
    }elese{
        echo "error";
    }
    $conn = null;
    exit();
   }
}else{
    header("Location:../index.php?mess=error");
}
