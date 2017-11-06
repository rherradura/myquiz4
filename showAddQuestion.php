<html>
 <head>
  <title>showAddQuestions</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
 </head>
 <body>
	<table border="2">
		<tr>
			<td bgcolor="grey"> Korreoa </td>
			<td bgcolor="grey"> Galdera </td>
			<td bgcolor="grey"> Erantzun zuzena </td>
			<td bgcolor="grey"> Erantzun okerra (1) </td>
			<td bgcolor="grey"> Erantzun okerra (2) </td>
			<td bgcolor="grey"> Erantzun okerra (3) </td>
			<td bgcolor="grey">Zailtasun maila</td>
			<td bgcolor="grey">Gai arloa</td>
		</tr>
				
 <?php include 'dbConfig.php';
 
	//Banatu hainbat linietan etan taula batean sartu!!
 
	$mysqli = new mysqli($zerbitzaria,$erabiltzailea,$pasahitza,$db);
	$emaitza = $mysqli->query("SELECT Korreoa,Galdera,Erantzun_ona, Erantzun_okerra_1, Erantzun_okerra_2, Erantzun_okerra_3,Zailtasuna,Gai_arloa FROM questions");
	
	if (!$emaitza) {
		echo "Error: " . $mysqli->error . "\n";
		exit;
	}
	else{
		if ($emaitza->num_rows === 0) { echo "Datu basea hutsik dago!";}
		else{
			while ($fila = $emaitza->fetch_row()) {
?> 
				<tr>
					<td ><?=$fila[0]?></td>
					<td><?=$fila[1]?></td>
					<td><?=$fila[2]?></td>
					<td><?=$fila[3]?></td>
					<td><?=$fila[4]?></td>
					<td><?=$fila[5]?></td>
					<td><?=$fila[6]?></td>
					<td><?=$fila[7]?></td>
				</tr>
<?php
			}
		}
		$emaitza->close();
	}
	
	$mysqli->close();
 
 ?>
 </table>
 <table align="center">
	<td ><span><a href=layoutErre.html>Jarraitu</a></span></td>
 </table>
 </body>
</html>