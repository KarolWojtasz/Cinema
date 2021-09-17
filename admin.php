<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema administration</title>
</head>

<body>

    <h3>Add new user for administration</h3>
    <form action="" method="POST">
        <label>username: <input type="text" name="username"></label>
        <label>password: <input type="password" name="password"></label>
        <input type="submit" name="user" value="Create user">
    </form>
    <br>
    <h3>Add new projection</h3>
    <form action="" method="POST">
        <label>username: <input type="text" name="username"></label>
        <label>password: <input type="password" name="password"></label>
        <input type="submit" name="user" value="Create user">
    </form>
    <?php
    
        if(!$_SESSION["admin"]){
            $address = substr($_SERVER['PHP_SELF'], 0, -9);
            header('Location: ' . $address );
        } 
        $conn = @new mysqli("localhost", "root", "","cinema");
        if ($conn->connect_error) {
            die("Connection failed, try again");
        } else {
            if (!empty($_POST)){
                foreach($_POST as $key=>$value){
                    if($key=="user"){
                        if($_POST['username']!=NULL && $_POST['password']!=NULL){
                            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                           
                            $result = mysqli_query($conn, "INSERT INTO `users` (`ID`, `username`, `password`) VALUES (NULL, '".$_POST['username']."', '".$pass."')");
                            if($result==1){
                                echo("New administration user addded");
                            }else{
                                echo("Error");
                            }
                        }
                    }
                }
            }
        }
    ?>
</body>

</html>