<?php
    require_once 'utility.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup USD-INR live</title>
</head>
<body>
    <h1>Signup to view USD-INR live conversion</h1>
    <p>Already have an account? <a href="login.php">Login</a></p>
    <form action="" method="post">
        <div>
            <input type="text" name="name" placeholder="Enter name" width="500px" height="500px">
        </div>
        <div>
            <input type="email" name="email" placeholder="email">
        </div>
        <div>
            <input type="text" name="username" placeholder="username">
        </div>
        <div>
            <input type="password" name="password" placeholder="password" minlength="8">
        </div>
        <div>
            <input type="password" name="confirm_password" placeholder="confirm password" minlength="8">
        </div>
        <div>
            <input type="submit" name="submit" value="signup">
        </div>
    </form>
</body>
</html>

<?php
if ($_POST) {
    // echo '<pre>';
    // print_r($_POST);
    // echo "</pre><br>";

    // echo ($_POST['username']);

    if ($_POST['password'] != $_POST['confirm_password']) {
        echo "passwords do not match.";
        die;
    }

    $conn = connect_db();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(is_username_exist($username)) {
        die ("username not available, please choose another username");
    }

    $insert_sql = "insert into user_data (name, email, username, password) values ('$name', '$email', '$username', '$password')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "Registration successful";
    } else {
        $err = "Error in registration: " . $conn->error;
    }
    echo'<meta http-equiv="refresh" content="4;url=login.php">';
    header( "Refresh:4; login.php", true, 303);

    $conn->close();
}
?>