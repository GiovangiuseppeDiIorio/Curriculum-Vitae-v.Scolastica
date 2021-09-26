<?php

//preambolo
require_once("../include/database-conn.php");
require_once('Phprtflite/lib/PHPRtfLite.php');

PHPRtfLite::registerAutoloader(); // registers PHPRtfLite autoloader (spl) ESSENZIALE   
// rtf document instance ESSENZIALE
$rtf = new PHPRtfLite();
$rtf->setCharset('UTF-8');  // Use il charset UTF-8

// Variabili per i font
$fontTitolo = new PHPRtfLite_Font(18, 'Arial', '#808080', '#ffffff'); // font Titolo 18, Arial, Grigio, Bianco
$fontNormal = new PHPRtfLite_Font(12, 'Arial', '#000000', '#ffffff'); // font Normal 12, Arial, Nero, Bianco
$fontCentral = new PHPRtfLite_ParFormat(PHPRtfLite_ParFormat::TEXT_ALIGN_CENTER); // font Central allinea il testo al centro
$fontLeft = new PHPRtfLite_ParFormat(PHPRtfLite_ParFormat::TEXT_ALIGN_LEFT); // font Left allinea il testo a sinistra

// Query database
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
    $imagefile = "../Assets/Immagini/immagine.jpg";

    // Sezione anagrafe e dati generali
    $section = $rtf->addSection();
    $section->writeText('<u><b>Anagrafe e dati generali</b></u>', $fontTitolo, $fontCentral); // Titolo
    $section->WriteText('<br><br>');

    // Elenco dati anagrafici
    $section->writeText('<b>Nome: </b>'.$nome, $fontNormal, $fontLeft);
    $section->writeText('<b>Cognome: </b>'.$cognome, $fontNormal, $fontLeft);
    $section->writeText('<b>Residenza: </b>'.$residenza, $fontNormal, $fontLeft);
    $section->writeText('<b>Numero: </b>'.$numero, $fontNormal, $fontLeft);
    $section->writeText('<b>Mail: </b>'.$email, $fontNormal, $fontLeft);
    $section->writeText('<b>Nazionalità: </b>'.$nazionalita, $fontNormal, $fontLeft);
    $section->writeText('<b>Data di nascita: </b>'.$nascita, $fontNormal, $fontLeft);
    $section->writeText('<b>Sesso: </b>'.$sesso, $fontNormal, $fontLeft);
    $section->WriteText('<br>');
    $section->addImage($imagefile);
    $section->WriteText('<br><br>');

    // Sezione esperienza lavorativa
    $section->writeText('<u><b>Sezione esperienza lavorativa</b></u>', $fontTitolo, $fontCentral); // Titolo
    $section->WriteText('<br><br>');    
}

//Eseguo una seconda query dove prende le informazioni lavorative   
$query2 = $pdo->query("SELECT * FROM Curriculum.eLavorativa WHERE eID LIKE '".$ID."'");

if($query2->rowCount()!= 0) //Condizione che controlla usa la funziona rowCount per vedere quante colonne vengono restituite
{
    
    while($col = $query2->fetch())
    {
    // Elenco dati esperienza lavorativa
    $section->writeText('<b>Inizio lavoro: </b>'.$col['datestartjob'], $fontNormal, $fontLeft);
    $section->writeText('<b>Fine lavoro: </b>'.$col['datefinejob'], $fontNormal, $fontLeft);
    $section->writeText('<b>Nome azienda: </b>'.$col['nameinc'], $fontNormal, $fontLeft);
    $section->writeText('<b>Tipologia azienda: </b>'.$col['typeinc'], $fontNormal, $fontLeft);
    $section->writeText('<b>Ruolo: </b>'.$col['typework'], $fontNormal, $fontLeft);
    $section->writeText('<b>Responsabilità: </b>'.$col['responsability'], $fontNormal, $fontLeft);
    $section->writeText('<b>Descrizione: </b>'.$col['description'], $fontNormal, $fontLeft);
    }

//se non trova delle colonne
} else  {
    $section->WriteText('<b>[Nessuna informazione presente nel database]</b>');
}

// save rtf document to hello_world.rtf
$rtf->save('curriculum.rtf');

header( "refresh:1;url=curriculum.rtf" );

?>