<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

if(isset($_GET["login"])){

    $username = $_GET["username"];
    $password = $_GET["password"];

    $response = $client->request('GET', 'http://localhost:3000/user?email='.$username.'&password='.$password.'', [
    ]);

    $result = json_decode($response->getBody()->getContents(), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="profile">
        <img src="<?=$result[0]['picture']?>" alt="image">
        <h3><?=$result[0]['name']?></h3>
    </div>
    
</body>
</html>