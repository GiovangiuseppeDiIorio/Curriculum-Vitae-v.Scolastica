<?php

    //preambolo
    require_once("../include/database-conn.php");
    require_once('tFPDF/tfpdf.php');
    require_once('tFPDF/html.php');
    
    $pdf=new PDF_HTML();
    $pdf->AddPage();
    
    // Aggiungo i font DejaVu e tutte le sue varianti
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->AddFont('DejaVu','B','DejaVuSans-Bold.ttf',true);
   
    $pdf->SetFont('DejaVu','',18);
    // Se si vuole prendere il testo come input da un file txt
   // $txt = file_get_contents('tFPDF/HelloWorld.txt');
   // $pdf->Write(8,$txt);
   
    //restituisco il pdf e salvo un messaggio per l'utente (che non vedrà mai)
    $pdf->Ln(5);
    $pdf->SetFont('DejaVu','',16);           
      
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
            //Header (titolo)
            $pdf->Ln(10);
            $pdf->SetFont('Arial','I',12);
            $pdf->SetTextColor(128);
            $pdf->SetFont('DejaVu', '',18);
            $pdf->Cell(0, 0, 'Anagrafe e dati generali',0,1,'C');
            //Rettangolo transformata in linea
            $pdf->Rect($pdf->GetX(),$pdf->GetY()+10,180, 0, 'FD');
            $pdf->SetTextColor(000);
            //Contents and images
            $pdf->Image('../Assets/Immagini/immagine.jpg', $pdf->GetX()+130, $pdf->GetY()+20, 50, 40);
            $pdf->WriteHTML("<br /><br />
            <p> <b>Nome:</b>  ".$nome." </p>
            <p> <b>Cognome:</b> ".$cognome." </p>
            <p> <b>Residenza:</b> ".$residenza." </p>
            <p> <b>Numero:</b> ".$numero." </p>
            <p> <b>Email:</b> ".$email." </p>
            <p> <b>Nazionalità:</b> ".$nazionalita." </p>
            <p> <b>Data di nascita:</b> ".$nascita." </p>
            <p> <b>Sesso:</b> ".$sesso." </p><br>");
            //Esperienza lavorativa
            $pdf->SetFont('Arial','I',12);
            $pdf->SetTextColor(128);
            $pdf->Ln(10);
            $pdf->Cell(0, 0, 'Sezione esperienza lavorativa',0,1, 'C');
            $pdf->Rect($pdf->GetX(),$pdf->GetY()+5,180, 0, 'FD');
            $pdf->SetFont('DejaVu','',16);
            $pdf->SetTextColor(000);
           // $pdf->WriteHTML("<img src='../Assets/Immagini/immagine.jpg' width='120px' height='70px'>");
       }
       
    //Eseguo una seconda query dove prende le informazioni lavorative   
    $query2 = $pdo->query("SELECT * FROM Curriculum.eLavorativa WHERE eID LIKE '".$ID."'");

    //Se la query soprastante restituisce dei risultati: scrivili nel PDF, altrimenti manda un messaggio di mancati dati nel database
    
    if($query2->rowCount()!= 0) //condizione che controlla usa la funziona rowCount per vedere quante colonne vengono restituite
    {
      
        while($col = $query2->fetch())
        {
            $pdf->WriteHTML("<br /><br />
            <p> <b>Inizio lavoro:</b>  ".$col['datestartjob']." </p>
            <p> <b>Fine Lavoro:</b> ".$col['datefinejob']." </p>
            <p> <b>Nome azienda:</b> ".$col['nameinc']." </p>
            <p> <b>Tipologia azienda:</b> ".$col['typeinc']." </p>
            <p> <b>Ruolo:</b> ".$col['typework']." </p>
            <p> <b>Responsabilità:</b> ".$col['responsability']." </p>
            <p> <b>Descrizione: </b> ". $col['description']." </p><br>");
        }

    //se non trova delle colonne
    } else  {
    
        $pdf->SetFont('Arial','B',12);
        $pdf->SetTextColor(10);
        $pdf->Ln(10);
        $pdf->Cell(0, 0, '[Nessuna informazione presente nel database]',0,1, 'C');
        $pdf->SetFont('DejaVu','',16);
        $pdf->SetTextColor(000);
       

    }

   
       
    //Imposto titolo e scrivo il PDF
    $pdf->SetTitle('Curriculum vitae di '.$nome.' '.$cognome.'',true);  
    $pdf->Output();

?>