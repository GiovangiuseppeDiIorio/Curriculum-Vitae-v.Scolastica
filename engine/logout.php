<?php
session_start();
if(!empty($_SESSION) && is_array($_SESSION)) {
    foreach($_SESSION as $sessionKey => $sessionValue)
        session_unset($_SESSION[$sessionKey]);
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout </title>
</head>
<body>
    <center>
    <h3> Logout effettuato </h3>
    </center>
</body>
</html>
