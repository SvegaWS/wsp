
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	

	function bistaratuGalderak(){
		
			$.ajax({
				url : "reviewingQuizzesGalderakerakutsi.php",
				type: "POST",
				data : "",
				beforeSend:function()
							{
								$('#bistaratu').html('<div><img src="loading.gif"/></div>');
							},
				success: function(datuak)
						{
							$('#bistaratu').fadeIn().html(datuak);
						},
				error: function ()
				{
					$('#content').fadeIn().html('<p class="error"> <strong> Zerbitzariak ez duela erantzuten dirudi </p>');
				}
				});
			
	}
	
	function eguneratuGalderak(kontagailua){
	
		var id =document.forms.namedItem("form"+kontagailua).elements["kont"].value;
		var erantzuna = document.forms.namedItem("form"+kontagailua).elements["eran"].value;
		var galdera = document.forms.namedItem("form"+kontagailua).elements["galdera"].value;
		var zailtasuna =document.forms.namedItem("form"+kontagailua).elements["zailtasuna"].value;
		var balidatzekozailtasuna = new RegExp("^[0-5]{1}$");
		var errorea="";
		if(galdera==""){
				errorea+="Galderra eremua bete behar duzu \n";
		}
		if(erantzuna==""){
				errorea+="Erantzuna eremua bete behar duzu \n";
		}
		if(balidatzekozailtasuna.test(zailtasuna)==false){
			errorea+="Zailtasun balioa, 0...5 balioen artean egon behar da\n";
		}
		if(errorea!=""){
				alert(errorea);
				 
		}else{
			var str1 = "galdera=";
			var str2 = "erantzuna=";
			var str3 = "zailtasuna=";	
			var str4="id=";
			var bidaltzekodatuak=str1.concat(galdera)+'&'+str2.concat(erantzuna)+'&'+str3.concat(zailtasuna)+'&'+str4.concat(id);
			$.ajax({
				url : "hautatueguneratu.php",
				type: "POST",
				data : bidaltzekodatuak,
				beforeSend:function()
							{
								$('#erakutsi').html('<div><img src="loading.gif"/></div>');
							},
				success: function(datuak)
						{
							$('#erakutsi').fadeIn().html(datuak);
						},
				error: function ()
				{
					$('#content').fadeIn().html('<p class="error"> <strong> Zerbitzariak ez duela erantzuten dirudi </p>');
				}
				});
			}
	}
	
	function layout(){
		window.location = "http://localhost/LAB1/layout.php";
			
	}
	function logout(){
		window.location = "http://localhost/LAB1/logout.php";
			
	}


	
</script>
<head>
		<link rel="stylesheet" type="text/css" href="stylesPWS/taula.css">

     <title> Galderen berrikuspena</title>
    
</head>

<body background="images/body.jpg">
	<div id="erakutsi"></div>
	<?php
	
	
	session_start();
		
		if(isset($_SESSION['baimena'])&&$_SESSION['baimena']=="irakasle"){
	//mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	//mysql_select_db("u615503288_erab") or die(mysql_error());
	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	$galdera =mysql_query("SELECT * FROM galderak;");
	echo'<input align="right" class="itzuli" type="button" id="bot" name="bot" value="Itzuli" onclick="layout();"><input class="itzuli" type="button" id="botout" name="botout" value="Logout" onclick="logout();">';
	
	echo '<br>';
	echo '<br>';
	echo '<table border=1><tr><th> ID </th><th> GALDERAK </th><th> ZAILTASUNA </th><th> ERANTZUNA </th><th> ZUZENDU </th></tr>';
	
	if($galdera === FALSE) { 
		die(mysql_error());
	}	
	$kontagailua= 1;
	while( $row =mysql_fetch_array( $galdera )) {
		echo '<tr><form id="form'.$row['id'].'" name="form'.$row['id'].'" method="POST" action="layout.php">
		<td><input class="tulainpt" type="text" id="kont" name="kont" size="3" value="'.$row['id'].'"disabled></td>
		<td><input class="tulainpt" type="text" id="galdera" name="galdera" size="25" maxlength="100" value="'.$row['galdera'].'"></td>
		<td><input class="tulainpt" type="text" id="zailtasuna" name ="zailtasuna" size="13" value="'.$row['zailtasuna'].'"></td>
		<td><input class="tulainpt" type="text" id="eran" name="eran" size="25" maxlength="100" value="'.$row['erantzuna'].'"></td>
		<td><input class="btn" type="button" id="botoia" name="botoia" value="Zuzendu" onclick="eguneratuGalderak('.$kontagailua.')"></td></form></tr>';
		++$kontagailua;
	}
	
	echo '</table>';
	mysql_close();
	}else{
		echo'<script>alert("Ez daukazu baimena orrialde honetan sartzeko")</script>';
		header('Location: ./layout.php');
		}
?>
	

</body>
</html>
