<?php
    require_once("../include/database-conn.php");
    
    $query = $pdo->query("SELECT * FROM Curriculum.Dati WHERE Cognome LIKE '".$_GET['Cognome']."' AND Nome LIKE '".$_GET['Nome']."' ");
    while($row = $query->fetch())
    {
        
        //initialize some variables
         $ID = $row['ID'];
         $nome = $row['Nome'];
         $cognome = $row['Cognome'];
         $residenza = $row['residenza'];
         $numero = $row['numero'];
         $email = $row['email'];
         $nazionalita = $row['nazionalita'];
         $nascita = $row['nascita'];
         $sesso = $row['Sesso'];
     }
    
            //prendo la tabella relativa all'utente
            $query = $pdo->query("SELECT * FROM Curriculum.Competenze WHERE L_ID LIKE '".$ID."'");
            
            while($row = $query->fetch())
            {
                $primaria = $row['prima_Lingua'];
                $altreLingue = $row['altre_Lingue'];
                $capacitaLettura = $row['capacita_Lettura'];
                $capacitaScrittura = $row['capacita_Scrittura'];
                $capacitaOrale = $row['capacita_Orale'];
                $competenzeRel = $row['competenzeRel'];
                $competenzeOrg = $row['competenzeOrg'];
                $competenzeTec = $row['competenzeTec'];
                $competenzeArt = $row['competenzeArt'];
                $altreCompetenze = $row['altreCompetenze'];
                $patente = $row['patente'];
            }
      
    
            //definisco degli array separando i valori con una virgola
            $altreLingue = explode(',',$altreLingue);
            $capacitaLettura = explode(',',$capacitaLettura);
            $capacitaScrittura = explode(',',$capacitaScrittura);
            $capacitaOrale = explode(',',$capacitaOrale);
          
            
           
       
?>