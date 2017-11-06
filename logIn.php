<?php include 'dbConfig.php';
	if (isset($_POST['loginbtn'])){
		$korreoa = $_POST['korreoa'];
		$pass= $_POST['pass'];
		
		$mysqli = new mysqli($zerbitzaria,$erabiltzailea,$pasahitza,$db);
		$emaitza = $mysqli->query("SELECT Korreoa,Pasahitza FROM erabiltzaileak");
		
		if (!$emaitza) {
			echo "Error: " . $mysqli->error . "\n";
			exit;
		}
		else{
			while ($fila = $emaitza->fetch_row()) {
				if ($fila[0] == $korreoa && $fila[1] == $pass){
					header('Location: layoutErre.html');
				}
			}
			echo "Korreoa edo pasahitza ez dira egokiak!";
			return false;		
			$emaitza->close();
		}
		$mysqli->close();
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LogIn</title>
		<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
		<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
		<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>
		
		$(document).ready(function(){

			$("#erregistratu").submit(function(){
				var g1 = $("#g1").val();
				var g2 = $("#g2").val();			
				
				if (g1 == 'undefined' || g1 === null || g1 === ''){alert("Sartu zure korreoa!");return false;};
				if (g2 == 'undefined' || g2 === null || g2 === ''){alert("Sartu pasahitza!");return false;};
				
			});
		});

	</script>
	</head>
    <body>
	<h1>Sartu login egiteko datuak</h1>
		<form id="erregistratu" name="erregistratu" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<table>
				<tr>
					<td>  Sartu korreoa </td>
					<td colspan="3"><input name="korreoa" id="g1" type = "text" size="40"></td>
				</tr>
				<tr>
					<td> Sartu pasahitza </td>
					<td colspan="3"><input name="pass" id="g2" type = "password" size="40"/></td>
				</tr>
				<tr>
					<td><input id="btn" name="loginbtn" type="submit" value="LogIn"/>
					<input type="reset" value="Garbitu"/>
					<a href="layout.html"><input type="button" value="Atzera" /></a></td>
				</tr>
			</table>
		</form>
    </body>
</html>