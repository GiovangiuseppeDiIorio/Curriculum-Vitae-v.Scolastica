<?php 
	//Avvio la sessione
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title> Login utenza </title>
</head>

<body>
	<?php
		include_once("../include/database-conn.php");
		// Definisco le variabili
		$nickname = $password = "";
	
		// Controllo se e' arrivata una richiesta
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nickname = test_input($_POST["nickname"]);
		$password = test_input($_POST["password"]);

		$password = md5($password);
		echo $nickname.'<br>'.$password.'<br>';
		//controllo nel database se e' presente la voce inserita dall'utente
		$query = $pdo->query("SELECT * FROM Curriculum.Utenze WHERE Nickname LIKE '".$nickname."' AND Password LIKE '".$password."'");
		
			while($row = $query->fetch())
		{
        $nickname_database = $row['Username'];
		$password_database = $row['Password'];
		}
		echo 'Password database: '.$password_database.'<br>';
		//Se le password coincidono con quelle salvate nel database salvo i dati
		if($password == $password_database) 
		{
		//inserisco i dati inseriti nella sessione
        $_SESSION['username'] = $nickname;
        $_SESSION['password'] = $password;
        header('Location: ../home/index.php');
		}
		
		else {echo 'Nessun utente trovato';}
		
		}

		// Rimuovo l'HTML se presente
		function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
		?>

		<h2>Login</h2>
		<form method="post" action=
			"<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
			<input type="text" name="nickname" placeholder="Nickname" autocomplete="off">
			<br>
			<br>
			<input type="password" name="password" placeholder="Password" autocomplete="off">
            <br>
            <br>
			<input type="submit" name="Invia" value="Invia">
		</form>

		
</body>

</html>
