<html>
 <head>
  <title>showXMLQuestions</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
 </head>
 <body>
	<table border="2">
		<tr>
			<td bgcolor="black"><font color="white">Galdera</font></td>
			<td bgcolor="black"><font color="white">Zailtasun maila</font></td>
			<td bgcolor="black"><font color="white">Gai arloa</font></td>
		</tr>
				
 <?php	include 'dbConfig.php';
		
	$assessmentItems = simplexml_load_file('questions.xml');
	if ($assessmentItems === false) {
		echo "Arazoa kargatzen XML\n";
		foreach(libxml_get_errors() as $error) {
			echo "\t", $error->message;
		}
		return false;
	}
	foreach($assessmentItems->children() as $assessmentItem){
?> 
				<tr>
					<td><?php echo $assessmentItem->itemBody->p ?></td>
					<td><?php echo $assessmentItem['complexity'] ?></td>
					<td><?php echo $assessmentItem['subject'] ?></td>
				</tr>
<?php
	}
 ?>
 </table>
 <table align="center">
	<td ><span><a href=layoutErre.html>Jarraitu</a></span></td>
 </table>
 </body>
</html>