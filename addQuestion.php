<html>
 <head>
  <title>addQuestions</title>
 </head>
 <body>
 	<table>
		<tr align = "center">
 <?php include 'dbConfig.php';
	$korreo = $_POST['korreoa'];
	$galderak = $_POST['galdera'];
	$eZuzena = $_POST['zuzena'];
	$eOkerra1 = $_POST['okerra1'];
	$eOkerra2 = $_POST['okerra2'];
	$eOkerra3 = $_POST['okerra3'];
	$zailtasuna = $_POST['zaila'];
	$gaiak = $_POST['gaia'];
	
	/*echo "Zerbitzaria: ".$zerbitzaria."\n";
	echo "Erabiltzailea: ".$erabiltzailea."\n";
	echo "Pasahitza: ".$pasahitza."\n";
	echo "Datu basea: ".$db."\n";*/
	
	$mysqli = new mysqli($zerbitzaria,$erabiltzailea,$pasahitza,$db);
	
	$emaitza = $mysqli->query("INSERT INTO questions (Korreoa,Galdera,Erantzun_ona, Erantzun_okerra_1, Erantzun_okerra_2, Erantzun_okerra_3,Zailtasuna,Gai_arloa) VALUES ('$korreo','$galderak','$eZuzena','$eOkerra1','$eOkerra2','$eOkerra3','$zailtasuna','$gaiak')");
	
	if ($emaitza==TRUE) {
?>
		<td colspan="3">Datuak ondo gorde dira datu basean</td>
<?php
	}else{
		echo "Error: " . $emaitza . "<br>" . $mysqli->error;
	}
	
	$mysqli->close();
	
		
	/*echo "Korreoa: ".$korreo."\n";
	echo "Galderak: ".$galderak."\n"; 
	echo "Erantzun ona: ".$eZuzena."\n";
	echo "Galdera okerrak: ".$eOkerra1.",".$eOkerra2.",".$eOkerra3."\n";
	echo "Zailtasuna: ".$zailtasuna."\n";
	echo "Gaia: ".$gaiak."\n";*/
		
 ?>

		<tr>
			<td><span><a href=showAddQuestion.php>Ikusi Datu baseko galdera guztiak</a></span></td>
			<td><span><a href=addQuestion.html>Sartu beste galdera bat</a></span></td>
			<td><span><a href=layoutErre.html>Jarraitu</a></span></td>
			<td><span><a href=showXMLQuestion.php>Ikusi XML galdera guztiak</a></span>	</td>		
		</tr>
	</table>
<?php
	$assessmentItems = simplexml_load_file('questions.xml');
	if ($assessmentItems === false) {
		echo "Arazoa kargatzen XML\n";
		foreach(libxml_get_errors() as $error) {
			echo "\t", $error->message;
		}
		return false;
	}
	$assessmentItem = $assessmentItems->addChild('assessmentItem');
	$assessmentItem->addAttribute('complexity',$zailtasuna);
	$assessmentItem->addAttribute('subject',$gaiak);
	$itemBody = $assessmentItem->addChild('itemBody');
	$itemBody->addChild('p',$galderak);
	$correctResponse = $assessmentItem->addChild('correctResponse');
	$correctResponse->addChild('value',$eZuzena);
	$incorrectResponse = $assessmentItem->addChild('incorrectResponse');
	$incorrectResponse->addChild('value',$eOkerra1);
	$incorrectResponse->addChild('value',$eOkerra2);
	$incorrectResponse->addChild('value',$eOkerra3);
	$assessmentItems->asXML('questions.xml');
?>
 </body>
</html>