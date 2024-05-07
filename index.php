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
                <?php if($todos->rowCount() <= 0){ ?>
                    <div class="todo-item">
            <div class="empty">
                <img src="img/modified.png" width = 100% >
                <img src="img/delecte.png" width = 100% >
            </div>
            </div> 
        <?php } ?>
        <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
             <div class="todo-item">
                <span id = "<?php echo $todo['id'];?>"
                class="remove-to-do">x</span>
            <?php if ($todo['checked']){ ?>
                   <input type="checkbox"
                   class="check-box"
                   checked />
                <h2 class ="checked"> <?php echo $todo['title'] ?></h2>
             <?php } else {?>
                <input type="checkbox"
                   class="check-box" />
                <h2> <?php echo $todo['title'] ?></h2>
            <?php } ?>
                <br>
                <small>created:05/05/24</small>
            
              </div>
         <?php } ?>
        </div> 
    </div>
</body>
</html>