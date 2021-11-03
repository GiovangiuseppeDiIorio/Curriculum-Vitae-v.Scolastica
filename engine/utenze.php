<!---
Pagina che carica gli utenti creati nel database e mostra un messaggio di errore in caso di fallimento o un messaggio
di conferma in caso di riuscita
-->
<?php
    try {

    
    //Richiedo la connessione
    require_once("../include/database-conn.php");
    $count_utenze = count($_POST['username']);

    echo '<table>
    <tr>
      <th>Username</th>
    </tr>';
    
    for($i = 0; $i < $count_utenze; $i++)
    {
        $password = md5($_POST['password'][$i]);
        echo '<tr><td>'.$_POST['username'][$i].'</td></tr>';
        //eseguo la query
    $query = $pdo->query("INSERT INTO Curriculum.Utenze (Nickname, `Password`) VALUES ('".$_POST['username'][$i]."', '".$password."')");

        
    } 
    echo '</table><h1> Dati aggiunti nel database</h1>';
} catch(Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/utenze.css">
     <!-- Bootstrap REQUIRED -->
	<link rel="stylesheet" href="../Assets/css/bootstrap.css">
    <script src="../engine/js/bootstrap.js" ></script>
    <title>Resoconto</title>
</head>
<body>
    
</body>
</html>