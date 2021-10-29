<?php

    //preambolo
    require_once("../include/database-conn.php");
    require_once('tFPDF/tfpdf.php');
    require_once('tFPDF/html.php');
    require_once('get-database.php');
    
    //Inizializzo il pdf
    $pdf=new PDF_HTML();
    $pdf->AddPage();

     // Aggiungo i font DejaVu e tutte le sue varianti
     $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
     $pdf->AddFont('DejaVu','B','DejaVuSans-Bold.ttf',true);
    //Font presi dal curriculum europeo ufficiale
    $pdf->AddFont('ArialNarrow', '','../../../../Assets/font/arial-narrow.ttf',true);
    $pdf->AddFont('ArialNarrow', 'B','../../../../Assets/font/arial-narrow-bold.ttf',true);
    $pdf->AddFont('ArialNarrow', 'I','../../../../Assets/font/arial-narrow-italic.ttf',true);
    $pdf->AddFont('ArialNarrow', 'BI','../../../../Assets/font/arial-narrow-bold-italic.ttf',true);
    
    //restituisco il pdf
    $pdf->Ln(5);
    $pdf->SetFont('DejaVu','B',13);          

      
        $header = array('FORMATO EUROPEO PER IL', 'CURRICULUM VITAE');
        // Logo
        $pdf->Image('../Assets/Immagini/cv.png',50,36,15);    

        //Inserisco il testo
        $pdf->SetFont('DejaVu','',14); 
        $dataInt = array ('Nome;'.$nome, 'Cognome;'.$cognome, 'Indirizzo;'.$residenza, 'Email;'.$email, 'Telefono;'.$numero, 'Nazionalità;'.$nazionalita, 'Data di nascita;'.$nascita, 'Sesso;'.$sesso);
        $dataInt = $pdf->LoadData($dataInt);
        $pdf->ImprovedTable($header,$dataInt);
        
           
         
    //Esperienze lavorative
    $query2 = $pdo->query("SELECT * FROM Curriculum.eLavorativa WHERE e_ID LIKE '".$ID."'");


        while($col = $query2->fetch())
        {
            $pdf->Ln(5);
            $pdf->AddTables("ESPERIENZA LAVORATIVA");
            $dataInt = array ('Inizio lavoro;'.$col['dataFine'], 'Fine lavoro;'.$col['dataFine'], 'Nome azienda;'.$col['nomeDatore'], 'Tipologia azienda;'.$col['tipologiaAzienda'], 'Ruolo;'.$col['tipologiaImpiego'], 'Responsabilità;'.$col['responsabilita'], 'Descrizione;'.$col['descrizione']);
            $dataInt = $pdf->LoadData($dataInt);
          
            $pdf->eLavorativa($dataInt);
        }
       //ISTRUZIONE
    $query = $pdo->query("SELECT * FROM Curriculum.Istruzione WHERE i_ID LIKE '".$ID."'");
        
    while($row = $query->fetch())
    {
            $pdf->Ln(5);
            $pdf->AddTables("ISTRUZIONE E FORMAZIONE");
            $dataInt = array ('Inizio periodo di formazione;'.$row['dateStartSchool'], 'Fine periodo di formazione;'.$row['dateEndSchool'], 'Tipologia istruzione;'.$row['tipologia_Istruzione'], 'Principali abilità;'.$row['principali_abilita'], 'Qualifica conseguita;'.$row['qualifica']);
            $dataInt = $pdf->LoadData($dataInt);
            $pdf->Formativa($dataInt);
    }
            
            $indexLingue = count($altreLingue);
            //se non contiene spazi vuoti, printa le risposte (se non è vuoto l'array)
            if(!in_array('',$altreLingue))
            {
                 //ciclo for che printa i valori delle accortezze linguistiche dell'individuo
                 for($i = 0; $i< $indexLingue; $i++)
                 {
                    $pdf->Ln(5);
                    $pdf->AddTables("CONOSCENZA DELLE LINGUE");

                   
                    $dataInt = array('Prima lingua;'.$primaria, 'Altre lingue;'.$altreLingue[$i], 'Capacità di lettura;'.$capacitaLettura[$i], 'Capacità di scrittura;'.$capacitaScrittura[$i], 'Capacità di espressione orale;'.$capacitaOrale[$i]);

                    $dataInt = $pdf->LoadData($dataInt);
                    
                    $pdf->Lingue($dataInt);
                 }
                
            } //altrimenti invia un messaggio
            $pdf->Ln(5);
            $pdf->AddTables("CAPACITÀ E COMPETENZE PERSONALI");

           
            $dataInt = array('Competenze relazionali;'.$competenzeRel, 'Competenze organizzative;'.$competenzeOrg,'Competenze tecniche;'.$competenzeTec,'Competenze artistiche;'.$competenzeArt,'Altre competenze;'.$altreCompetenze);

            $dataInt = $pdf->LoadData($dataInt);
            
            $pdf->Competenze($dataInt);
            
       
      
    if($patente != null )
    {
        $dataInt = array ('Patente;'.$patente);
        $dataInt = $pdf->LoadData($dataInt);
        $pdf->Patente($dataInt);
    } else {
        $dataInt = array ('Patente; Nessuna');
            $dataInt = $pdf->LoadData($dataInt);
            $pdf->Patente($dataInt);
    }
    
    //Imposto titolo e scrivo il PDF
    $pdf->SetTitle('Curriculum vitae di '.$nome.' '.$cognome.'',true);  
    $pdf->Output();
    
    

?>