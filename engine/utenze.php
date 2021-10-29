<?php

    $count_utenze = count($_POST['username']);

    echo '<table>
    <tr>
      <th>Username</th>
    </tr>';
    for($i = 0; $i < $count_utenze; $i++)
    {
        echo '<tr><td>'.$_POST['username'][$i].'</td></tr>';
        
    } 
    echo '</table><h1> Dati aggiunti nel database</h1>';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/utenze.css">
    <title>Resoconto</title>
</head>
<body>
    
</body>
</html>