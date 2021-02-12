<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="crudstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once 'process.php'; ?>


    
    <?php 
           if (isset($_SESSION['message'])):  ?>
      
      
      <div  class="alert alert-<?=$_SESSION['msg_type']?>" >
     
    <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
     </div>
    
            <?php endif ?>


    <?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>

    <div id="formContainer">
    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id;?>">

    <label class="label">Name:</label>
    <input type="text" name="name" class="input" placeholder="Enter your name"
     value="<?php echo $name; ?>">

    <label class="label">Age:</label>
    <input type="text" name="age" class="input"  placeholder="Enter your age"
    value="<?php echo $age; ?>">

        <?php 
        if($update == true):
        ?>
        <button type="Sumbit" name="update" id="update">Update</button>
        <?php else: ?>
        <button type="Sumbit" name="save" id="save">Save</button>
        <?php endif; ?>
    </form>
</div>

        

    <?php
        $mysqli = new mysqli("localhost:3306", "", '',"");
        $result = $mysqli->query("SELECT * FROM data");
     
    	 ?>

        <div id="display">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th colspan="2" class="col2">Action</th>
                    </tr>
                </thead>

                <?php
                    while($row = $result->fetch_assoc()): ?>
               <tr>
                   <td><?php echo $row["name"]; ?></td>
                   <td><?php echo $row["age"]; ?></td>
                   <td class="col2">
                       <a href="index.php?edit=<?php echo $row['id']; ?> " class="editBtn" >
                            Edit
                    </a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>" id="delete">
                        Delete
                    </a>
                   </td>
               </tr>

               <?php endwhile; ?>

            </table>

        </div>


 
    
  
</body>
</html>
