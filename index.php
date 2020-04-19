<?php
    require_once 'utility.php';

    session_start();
    if (empty($_SESSION)) {
        header('Location: login.php');
    }

    // API provided by fixer.io (refreshes price every 60 mins)
    // Base currency is EUR
    // set API Endpoint and API key 
    $endpoint = 'latest';
    $access_key = '456500d8ee008b97a7bda92745bede73';

    // Initialize CURL:
    $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $exchangeRates = json_decode($json, true);

    // Access the exchange rate values, e.g. USD:
    $USD = $exchangeRates['rates']['INR']/$exchangeRates['rates']['USD']; // value of USD-INR calculated from EUR-USD and EUR-INR
    $USD = round($USD, 2);

    $conn = connect_db(); // connection established with database

    $sql = "SELECT * FROM user_data WHERE username='".$_SESSION['username']."'";

    $result = $conn->query($sql);
    
    // storing the user data in an array
    if ($result->num_rows > 0) {
        $profile_data = $result->fetch_assoc();
    }

    // clearing session variables and destroying session on click of logout
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('Location: login.php');
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USD-INR live</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        body {
            background: #d8d84491;
            font-size: 18px;
            font-family: 'Lato', sans-serif;
        }

        @media (max-width: 500px) {
            body {
                font-size: 14px;
            }
        }

        h1 {
            margin: 50px;
            text-align: center;
            font-size: 3em;
        }

        main {
            display: flex; 
            flex-direction: column;
            padding: 30px 30% 30px 30%;
            background: #ecec4991;
        }
        
        div {
            display: flex;
            align-items: center;
            cursor: default;
            padding: 10px;
        }
        
        p {
            padding-left: 20px;
            font-size: 1.5em;
        }

        button {
            float: right;
            margin-right: 10%;
            width: 120px;
            height: 50px;
            font-size: 1em;
        }
        
    </style>
</head>
<body>
    <p>Welcome <?php echo $profile_data['name'] ?>
        <form action="" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>        
    </p>
    <h1>USD-INR convertor (live)</h1>
    <main>
        <div>
            <h2>USD : </h2>
            <p>1 $</p>
        </div>
        <div>
            <h2>INR : </h2>
            <p><?php echo$USD;?> &#8377;</p>
        </div>
    </main>
</body>
</html>