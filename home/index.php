

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie edge">

    <!-- <link rel="shortcut icon" type="image/x-icon" href="./image/favicon.ico"> -->
    <meta name="author" content="Tieri Francesco, Di Iorio Giovangiuseppe">
    <meta name="description" content="Curriculum Vitae">

    <!-- Stile del sito -->
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Curriculum Vitae</title>
   <!-- Logica del sito -->
   <script src="../engine/js/logic.js"></script>  
</head>





<?php 
session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: ../engine/login.php');

    }
try {
    //Richiedo la connessione
    require_once("../include/database-conn.php");
    $query = $pdo->query("SELECT * FROM Curriculum.Dati");
    echo ' <div class="container-items">  
    <div class="container">
<header>
    <h1>Benvenuto nella home page dello script per il Curriculum vitae</h1>
    <p>Script creato da Tieri Francesco e Di Iorio Giovangiuseppe</p>
</header><body>  <h3 style="text-align:left;">Utenti registrati</h3><br><table>
    <th>Nome</th>
    <th>Cognome</th>
    <th>Data di nascita</th>
    <th>PDF</th>
    <th>Elimina voce</th>';
        while($row = $query->fetch())
        {
            echo '
            <tr><td>'.$row['Nome'].'</td><td> '.$row['Cognome'].'</td><td>'.$row['nascita'].'</td><td><a href="../engine/get-item.php?Cognome='.$row['Cognome'].'&Nome='.$row['Nome'].'&data='.$row['nascita'].'&type=pdf">PDF</a></td><td><a  href="../engine/get-item.php?Cognome='.$row['Cognome'].'&Nome='.$row['Nome'].'&data='.$row['nascita'].'&delete=true">Elimina</a></td></tr>';
        }
        echo '
        
        </table>
        <br /><br /><a href="../index.html">Crea un\'utenza</a></div>
    </div>  
    </body>';
} catch(Exception $e){
    $return = 'Errore: ' .$e->GetMessage();
}

?>

</html>