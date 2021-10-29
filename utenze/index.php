<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi utenza</title>
    <link rel="stylesheet" href="../Assets/css/utenze.css">
</head>
<body>
<div id="myDIV" class="header">
  <h2>Aggiungi utenza</h2>
  <input style="margin-bottom: 5px;" type="text" id="myInput" placeholder="Username">
  <input type="password" id="myInputPass" placeholder="Password">
  <span onclick="newElement()" class="addBtn">Aggiungi</span>
</div>
<form method="POST" action="../engine/utenze.php">
<ul id="myUL">
</ul>
<input type="submit">
</form>

<script src="../engine/js/utenze.js"></script>
</body>
</html>