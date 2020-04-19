<?php
    require_once 'utility.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login USD-INR live</title>
</head>
<body>
    <h1>Login to view USD-INR live conversion</h1>
    <p>Don't have an account? <a href="signup.php">Signup</a></p>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>

<?php
    if ($_POST) {

        $conn = connect_db();

        session_start();
    
        if(login_check($_POST)) {
            $_SESSION['username'] = $_POST['username'];
            header('Location: index.php');
        } else {
            echo ('Invalid username or password, please try again');
        }

        $conn->close();
    }
    
?>