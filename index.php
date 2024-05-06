<?php 
require 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To_Do_List</title>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
    <h2>hi</h2>
    <div class="main-section">
        <div class="add-section">
            <form action ="" >
                <input type ="text"
                name="title" 
                placeholder="This field is required"/>
                <button type="submit"> Add &nbsp; <span>&#43;</span></button>
            </form>
            </div>
            <?php
              $todos = $conn->query('SELECT * FROM todos ORDER BY id DESC');
            ?>
            <div class="show-todo-section">
                <?php if($todos->rowCount() === 0){ ?>
                    <div class="todo-item">
            <div class="empty">
                <img src="" >
            </div>
            </div> 
        <?php } ?>
                <div class="todo-item">
                <input type="checkbox">
                <h2> Voici la liste</h2>
                <br>
                <small>created:05/05/224</small>
            
        </div>
        </div>
    </div>
</body>
</html>