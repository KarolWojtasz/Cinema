<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Cinema</h1>
    <h3>See what's on</h3>

    <?php
        $conn = @new mysqli("localhost", "root", "","cinema");

        if ($conn->connect_error) {
            die("Connection failed, try again");
        } else {
           
            $result = mysqli_query($conn, "SELECT * from movies");
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo ("<div class='movie'>
                        <h3>".$row['Title']."</h3>".$row['Duration']." min<br>
                        <p>".$row['Description']."</p>
                        <p>".$row['Type']."</p>
                        <form action='' method='POST'>
                            <input type='hidden' name='title' value='".$row['Title']."'/>
                            <input type='submit' name='book' value='Book now'/>
                        </form>
                    </div>");
            }
        }
        }

        if (!empty($_POST)){
            foreach($_POST as $key=>$value){
                if($key=="title"){
                    echo("book");
                }
                elseif($key=="admin"){
                    echo("<div class='login'>
                        <h4>Login to administration panel:</h4>
                        <form action='' method='POST'>
                            <label>username:<input type='text' name='username'/></label><br/>
                            <label>password:<input type='password' name='password'/></label><br/>
                            <input type='submit' name='login' value='Login'/>
                        </form>
                    </div>");
                } 
                elseif($key=="login"){
                    
                }

            }
            
        }
    ?>
    <div id="admin">
        <form action="" method="POST">
            <input type="submit" name="admin" value="login">
        </form>
    </div>
</body>

</html>