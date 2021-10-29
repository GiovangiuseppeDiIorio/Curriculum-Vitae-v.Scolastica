<?php
//Richiedo la connessione
require_once("../include/database-conn.php");

//Provo ad inserire i dati nel database, altrimenti do errore
try {
    require_once '../include/database-conn.php';
    
     //Se la nazionalità è rimasta in bianco, immetti Italia
     if($_POST['nation'] == '')
     $_POST['nation'] = 'Italia';

     $lname = addslashes($_POST['lname']);
     $fname = addslashes($_POST['fname']);
     $residenza = addslashes($_POST['address']);
     $nazionalita = addslashes($_POST['nation']);

    //eseguo la query
    $query = $pdo->query("INSERT INTO Curriculum.Dati (Cognome, Nome, residenza, numero, email, nazionalita, nascita, sesso) VALUES ('".$lname."', '".$fname."', '".$residenza."', '".$_POST['telephone']."', '".$_POST['mail']."', '".$nazionalita."', '".$_POST['birthday']."', '".$_POST['sex']."')");

    //Se l'utente decide di aggiungere piu' esperienze lavorative allora tengo il conto di quante ne ha inserite
   
    $num_esperienze = count($_POST['nameinc']);
    $num_scolastiche = count($_POST['principaliMaterie']);
    
    $query = $pdo->query("SELECT ID FROM Curriculum.Dati WHERE Cognome LIKE '".$_POST['lname']."' AND Nome LIKE '".$_POST['fname']."' AND Nascita LIKE '".$_POST['birthday']."'");
       
    
    while($row = $query->fetch())
    {
        $id = $row['ID'];
    }
    
    //do il via ad un ciclo for che inserisce tutte le esperienze lavorative accomunate da un ID
    
    for($i = 0; $i < $num_esperienze; $i++)
    {
       
     //fetching results
    
     $nomeDatore = array_map('addslashes', $_POST['nameinc']); 
     $tipologiaAzienda = array_map('addslashes', $_POST['typeinc']); 
     $tipologiaLavoro = array_map('addslashes', $_POST['typework']); 
     $tipologiaResponsabilita = array_map('addslashes', $_POST['responsability']); 
     $descrizione = array_map('addslashes', $_POST['description']); 

             $query = $pdo->query("INSERT INTO Curriculum.eLavorativa (e_ID, dataInizio, dataFine, nomeDatore, tipologiaAzienda, tipologiaImpiego, responsabilita, descrizione) VALUES ('".$id."', '".$_POST['datestartjob'][$i]."','".$_POST['datefinejob'][$i]."','".$nomeDatore[$i]."','".$tipologiaAzienda[$i]."','".$tipologiaLavoro[$i]."','".$tipologiaResponsabilita[$i]."','".$descrizione[$i]."')");
         
    }
    for($i = 0; $i < $num_scolastiche; $i++)
    {
       
     //fetching results
        $tipologiaIstruzione = array_map('addslashes', $_POST['typeschool']); 
        $principaliAbilita = array_map('addslashes', $_POST['principaliMaterie']); ;
        $qualifica = array_map('addslashes', $_POST['qualifica']); ;

        
             $query = $pdo->query("INSERT INTO Curriculum.Istruzione (i_ID, dateStartSchool, dateEndSchool, tipologia_Istruzione, principali_abilita, qualifica) VALUES ('".$id."', '".$_POST['dateStartSchool'][$i]."','".$_POST['dateEndSchool'][$i]."', '".$tipologiaIstruzione[$i]."', '".$principaliAbilita[$i]."','".$qualifica[$i]."')");
         
    }

  
        //Se l'utente ha appreso delle lingue extra
        if(count($_POST['linguaExtra']) >= 1) {

            $competenzeRel = addslashes($_POST['competenzeRel']);
            $competenzeOrg= addslashes($_POST['competenzeOrg']);
            $competenzeTec = addslashes($_POST['competenzeTec']);
            $competenzeArt = addslashes($_POST['competenzeArt']);
            $altreCompetenze = addslashes($_POST['altreCompetenze']);
             
         //converto gli array in variabili dove ogni valore è separato da una virgola
         $altreLingue = implode(',',$_POST['linguaExtra']);
         $capacitaLettura = implode(',',$_POST['lettura']);
         $capacitaScrittura = implode(',',$_POST['scrittura']);
         $capacitaOrale = implode(',',$_POST['orale']);

          
        //inserisco i valori
        $query = $pdo->query("INSERT INTO Curriculum.Competenze (L_ID, prima_Lingua, altre_Lingue, capacita_Lettura, capacita_Scrittura, capacita_Orale, competenzeRel, competenzeOrg, competenzeTec, competenzeArt, altreCompetenze, patente) VALUES ('".$id."', '".$_POST['linguaPrincipale']."','$altreLingue','$capacitaLettura', '$capacitaScrittura', '$capacitaOrale', '".$_POST['competenzeRel']."', '".$_POST['competenzeOrg']."','".$_POST['competenzeTec']."','".$_POST['competenzeArt']."','".$_POST['altreCompetenze']."', '".$_POST['patente']."')");
           
        } else {
            
            $competenzeRel = addslashes($_POST['competenzeRel']);
            $competenzeOrg= addslashes($_POST['competenzeOrg']);
            $competenzeTec = addslashes($_POST['competenzeTec']);
            $competenzeArt = addslashes($_POST['competenzeArt']);
            $altreCompetenze = addslashes($_POST['altreCompetenze']);
     

             //Se non ho lingue extra allora esegui la query
        $query = $pdo->query("INSERT INTO Curriculum.Competenze (L_ID, prima_Lingua, competenzeRel, competenzeOrg, competenzeTec, competenzeArt, altreCompetenze, patente) VALUES ('".$id."', '".$_POST['linguaPrincipale']."', '".$competenzeRel."','".$competenzeOrg."','".$competenzeTec."','".$competenzeArt."','".$altreCompetenze."', '".$_POST['patente']."')");
           
        }
     
        
    
   
  
    //creo i messaggi di output
    $return = '<td>'. $_POST['fname']. '</td><td>'. $_POST['lname'].'</td><td>'.$_POST['address'].'</td><td>'.$_POST['telephone'].'</td><td>'.$_POST['mail'].'</td><td>'.$_POST['nation'].'</td><td>'.$_POST['birthday'].'</td><td>'.$_POST['sex'].'</td></table><br/> 
    <a target="_blank" href="get-item.php?Cognome='.$_POST['lname'].'&Nome='.$_POST['fname'].'&data='.$_POST['birthday'].'&type=pdf"> Vai al PDF </a>
    <a style="float: right;" target="_blank" href="get-item.php?Cognome='.$_POST['lname'].'&Nome='.$_POST['fname'].'&data='.$_POST['birthday'].'&type=rtf"> Vai all\' rtf </a>';
    $title = 'Utenza aggiunta';

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
           <?php echo $return; ?>
        </tr>
    
        </div>
         </div>
    </body>
</html>