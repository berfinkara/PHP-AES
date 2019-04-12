
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ms Richard Project</title>
</head>
<body>

    <div class="container">
        <h3 class="text-muted">Mr Richard G. AES256 Project</h3>
    </div>
    <div class="container">

    </div>







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



<?php

    require('AES.php');
    require('MySQLHandler.php');

    $data = "koray loves Melisa and Melisa loves Koray and Christopher ";
    $key = "kor";

    $aes = new AES($data,$key);
    $encryptedData = $aes ->encrypt();
    echo "encrypted data is: ";
    echo $encryptedData , "</br>";

    $aes->setData($encryptedData);
    $decryptedData = $aes ->decrypt();
    echo "decrypted data is: ";
    echo $decryptedData;

    $mysqlHandler = new MySQLHandler("localhost","root",null,"richard");
    $mysqlHandler -> insertUser("Melisa","meldsafasdf");
    $mysqlHandler -> getAllUsers();

?>