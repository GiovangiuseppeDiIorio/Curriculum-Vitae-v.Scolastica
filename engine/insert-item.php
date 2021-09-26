<?php
//Richiedo la connessione
require_once("../include/database-conn.php");

//Provo ad inserire i dati nel database, altrimenti do errore
try {
    require_once '../include/database-conn.php';
    //echo '<script>console.log(choice)</script>';
     //Se la nazionalità è rimasta in bianco, immetti Italia
     if($_POST['nation'] == '')
     $_POST['nation'] = 'Italia';

    //eseguo la query
    $query = $pdo->query("INSERT INTO Curriculum.Dati (Cognome, Nome, residenza, numero, email, nazionalita, nascita, sesso) VALUES ('".$_POST['lname']."', '".$_POST['fname']."', '".$_POST['address']."', '".$_POST['telephone']."', '".$_POST['mail']."', '".$_POST['nation']."', '".$_POST['birthday']."', '".$_POST['sex']."')");

    //Se l'utente decide di aggiungere una esperienza lavorativa
    if(isset($_POST['lavorativa']))
    {
    //creo una query dove trova l'id di una persona selezionando quella al cognome selezionato
     $query = $pdo->query("SELECT * FROM Curriculum.Dati WHERE Cognome LIKE '".$_POST['lname']."' AND Nome LIKE '".$_POST['fname']."'");
    //fetching results
        while($row = $query->fetch())
        {
            $query = $pdo->query("INSERT INTO Curriculum.eLavorativa (eID, datestartjob, datefinejob, nameinc, typeinc, typework, responsability, `description`) VALUES ('".$row['ID']."', '".$_POST['datestartjob']."', '".$_POST['datefinejob']."', '".$_POST['nameinc']."', '".$_POST['typeinc']."', '".$_POST['typework']."', '".$_POST['responsability']."', '".$_POST['description']."')");

           
        }
   }
  
    //creo i messaggi di output
    $return = '<td>'. $_POST['fname']. '</td><td>'. $_POST['lname'].'</td><td>'.$_POST['address'].'</td><td>'.$_POST['telephone'].'</td><td>'.$_POST['mail'].'</td><td>'.$_POST['nation'].'</td><td>'.$_POST['birthday'].'</td><td>'.$_POST['sex'].'</td></table><br/> 
    <a target="_blank" href="get-item.php?Cognome='.$_POST['lname'].'&Nome='.$_POST['fname'].'&data='.$_POST['birthday'].'&type=pdf"> Vai al PDF </a>
    <a style="float: right;" target="_blank" href="get-item.php?Cognome='.$_POST['lname'].'&Nome='.$_POST['fname'].'&data='.$_POST['birthday'].'&type=rtf"> Vai all\' rtf </a>';

} catch(Exception $e) {
    //Messaggi di errore 
    $return = 'Si è verificato un errore </br>' .$e->getMessage();
    $titolo = 'Dati non inseriti';
}
?>

<!DOCTYPE html>

    <html>
        <head> 
            <title> <?php echo $titolo; ?> </title>
            <link rel="stylesheet" href="../Assets/css/style.css">
        </head> 
    <body>
    <div class="container-items">  
        <div class="container">
           <h1>Riepilogo dati</h1> 
   <table>
       <tr> 
           <th> Nome </th>
           <th> Cognome </th>
           <th> Residenza </th>
           <th> Numero </th>
           <th> Email </th>
           <th> Nazionalità </th>
           <th> Data di nascita </th>
           <th> Sesso </th> 
        </tr>
        <tr>
           <?php echo $return?>
        </tr>
    
        </div>
         </div>
    </body>
</html>