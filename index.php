<?php
    require 'db_conn.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTo Do List</title>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
  <h1> Liste de choses à faire</h1>
    <div class="main-section">
        <div class="add-section">
            <form action ="add/add_task.php" method = "POST" autotocomplete = "off" >
                <?php if ( isset($_GET['mess'])&& $_GET['mess']== 'error'){ ?>
                    <input type ="text"
                name="title" 
                style= "border-color: #ff6666"
                placeholder="Ce champ est obligatoire"/>
                <button type="submit"> Ajouter &nbsp; <span>&#43;</span></button>

                <?php } else{ ?>
                <input type ="text"
                name="title" 
                placeholder="Qu'avez-vous besoin de faire?"/>
                <button type="submit"> Ajouter &nbsp; <span>&#43;</span></button>
                <?php  } ?>
            </form>
        </div>
            <?php
             $todos = $conn->query('SELECT * FROM todos ORDER BY id DESC');
            ?>
            <div class="show-todo-section">
                <?php if($todos->rowCount() <= 0){ ?>
                    <div class="todo-item">
            <div class="empty">
                <img src="img/list.png" width = 100% >
               
            </div>
            </div> 
        <?php } ?>
        <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
              
             <div class="todo-item">
                <span id = "<?php echo $todo['id'];?>"
                class="remove-to-do">🗑️</span>
            <?php if ($todo['checked']){ ?>
                   <input type="checkbox"
                        class="check-box"
                        data-todo-id = "<?php echo $todo['id'];?>"
                   checked />
                <h2 class ="checked"> <?php echo $todo['title'] ?></h2>
             <?php } else {?>
                <input type="checkbox"
                    data-todo-id = "<?php echo $todo['id'];?>"
                   class="check-box" />
                <h2> <?php echo $todo['title'] ?></h2>
            <?php } ?>
                <br>
                <small> </small>
            
              </div>
         <?php } ?>
        </div> 
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>

$(document).ready(function(){
    
 $('.remove-to-do').click(function(){
        const id = $(this).attr('id');
        $.post("add/delete_task.php",  // Assurez-vous que le chemin est correct
            { id: id },
            (data) => {
                if(data == '1'){
                    $(this).parent().hide(600);  // Cachez l'élément si la suppression est réussie
                } else {
                    alert('Erreur lors de la suppression');
                }
            }
        );
    });

    $(".check-box").click(function(e){
        const id = $(this).attr('data-todo-id');
        $.post('add/check.php',
            { id: id },
            (data) => {
                if(data != 'error'){
                    const h2 = $(this).next();
                    if(data == '1'){
                        h2.addClass('checked');
                    } else {
                        h2.removeClass('checked');
                    }
                } else {
                    alert('Erreur lors de la mise à jour');
                }
            }
        );
    });
});
</script>



</body>
</html>"