<?php
require 'db_conn.php'; 
?>

<?php
require 'app/add.php';
?>

<?php
require 'app/remove.php';
?>
<?php
require 'app/edit.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
        <form action="index1.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error' ){ ?>
                    <input type="text"
                       name="title" 
                       style="border-color: #ff6666"
                       placeholder="THIS FIELD IS REQUIRED"/>
                    <button type="submit" name = 'add'>Add &nbsp; <span>&#43; </span> </button>
                
                <?php }else{ ?>
                    <input type="text"
                           name="title" 
                           placeholder="What DO You Need To Do?!!"/>
                    <button type="submit" name = 'add'>Add &nbsp; <span>&#43; </span> </button>
                <?php }?>
            </form>
        </div>
       
        <div class="show-todo-section">

        <?php
        if($todos->rowCount() <= 0){
        ?>

            <div class="todo-item">
                <div class="empty">
                    <img src="img/f.png" width="100%" />
                    <img src="img/Ellipsis.gif" width="80px">
                </div>        
            </div>
        <?php
        }
        ?>

        <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="todo-item">
            <span class="remove-to-do" onclick="removeTask(<?php echo $todo['id']; ?>)">x</span>  
            
            <?php if($todo['checked']){ ?>
                    
                    <input type="checkbox"
                            class="check-box"
                            checked />
                    <h2 class="checked"><?php echo $todo['title']?></h2>
            
                <?php }else{ ?>
                    <input type="checkbox"
                        class="check-box" />
                    <h2><?php echo $todo['title']?></h2>
            
                <?php }?>
                    <br>
                    <small>created: <?php echo $todo['date_time']?> </small>
            </div>
            <?php } ?>
        </div>
    </div>
    

    <script>
        function removeTask(id) {
            if (confirm('Are you sure you want to remove this task?')) {
                window.location.href = 'index1.php?remove=' + id;
            }
        }

        
    </script>

</body>
</html>