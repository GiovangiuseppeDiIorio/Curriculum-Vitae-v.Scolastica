<?php 
    try {
        
        switch($_GET['type'])
        {
            case 'pdf': 
                include_once("tfpdf.php");
                break;
            case 'rtf':
                include_once("rtflite.php");
                $return = 'Download del file in corso...';
                break;
            default: 
                $return = "Nessun tipo di data specificato, usare <b>type=pdf</b> oppure <b> type=rtf </b>";
                break;
        }
        //Controllo se l'utente vuole eliminare i propri dati
    if($_GET['delete'] == true)
    {
        
        include_once("../include/database-conn.php");
        echo '
                <title> Output </title>
                <link rel="stylesheet" href="../Assets/css/style.css">
            
        <body>
        <div class="container-items">  
            <div class="container">
               <h1>Output del file</h1> 
                <p>Eliminazione dei dati in corso</p>
                <a href="../home/"> Torna alla Home </a>
            </div>
             </div>
        </body>
    </html>';
    
    $query = $pdo->query("DELETE FROM Curriculum.Dati WHERE Cognome LIKE '".$_GET['Cognome']."' AND Nome LIKE '".$_GET['Nome']."' ");
    
    $query = $pdo->query("SELECT * FROM Curriculum.Dati WHERE Cognome LIKE '".$_GET['Cognome']."' AND Nome LIKE '".$_GET['Nome']."' ");
    
        while($row = $query->fetch()) {
        $ID = $row['ID'];
        }
        
     $query2 = $pdo->query("SELECT * FROM Curriculum.Dati WHERE ID LIKE '".$ID."' "); 
     
     //Eseguo una seconda query dove prende le informazioni lavorative   
     if($query2->rowCount()!= 0)
        $query2 = $pdo->query("DELETE FROM Curriculum.eLavorativa WHERE eID LIKE '".$ID."' ");

        
        return;
    }

    } catch(Exception $e) {
        //se ci sono problemi restituisci l'errore del problema
        $return = 'Errore: ' .$e->GetMessage();
    }
?>



<!DOCTYPE html>

    <html>
        <head> 
            <title> Output programma </title>
            <link rel="stylesheet" href="../Assets/css/style.css">
        </head> 
    <body>
    <div class="container-items">  
        <div class="container">
           <h1>Output del file </h1> 
            <p> <?php echo $return; ?></p>
            <a href="../home/"> Torna alla Home </a>
        </div>
         </div>
    </body>
</html>
