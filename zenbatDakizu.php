<html>
<script type="text/javascript">
	var eranzuzen=0;
	var eranoker=0;	
	var nickname_global="";
	function bidaliErantzuna(kontagailua){
		var id =document.forms.namedItem("form"+kontagailua).elements["kont"].value;
		var erantzuna = document.forms.namedItem("form"+kontagailua).elements["eran"].value;
		var nickname=document.getElementById("nickname").value;
		var errorea="";
		if(erantzuna==""){
				errorea+="Erantzuna eremua bete behar duzu \n";
		}
		if(errorea!=""){
				alert(errorea);
				 
		}
		else{
		
			if (nickname==""){
				if (nickname_global!=""){
					reseteauValoreak();
				}
				var str2 = "erantzuna=";
				var str3 = "id=";
			
			
				xmlhttp= new XMLHttpRequest();

				xmlhttp.onreadystatechange = function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
						if (xmlhttp.responseText.trim() == 'Bai'){
							alert("Asmatu duzu!!!!");
							document.forms.namedItem("form"+kontagailua).elements["eran"].style.backgroundColor = "33CC00";
						}else{
							alert("Ez duzu asmatu!!! Ohhhh!! Sahiatu berriro");
							document.forms.namedItem("form"+kontagailua).elements["eran"].style.backgroundColor = "red";
						}	
					}
				}
				xmlhttp.open("POST","BalioztuErantzuna.php"); 
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send(str2.concat(erantzuna)+'&'+str3.concat(id));

			}else{

				if(nickname==nickname_global){

					var str2 = "erantzuna=";
					var str3 = "id=";
			
			
					xmlhttp= new XMLHttpRequest();

					xmlhttp.onreadystatechange = function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							if (xmlhttp.responseText.trim() == 'Bai'){
								alert("Asmatu duzu!!!!");
								++eranzuzen;
								document.getElementById("mezua").innerHTML="Asmatutako galderak / Txarto erantzundako galderak  " + eranzuzen + " / " + eranoker ;
								document.forms.namedItem("form"+kontagailua).elements["eran"].style.backgroundColor = "33CC00";
							}else{
								alert("Ez duzu asmatu!!! Ohhhh");
								++eranoker;
								document.getElementById("mezua").innerHTML="Asmatutako galderak / Txarto erantzundako galderak  " + eranzuzen + " / " + eranoker ;
								document.forms.namedItem("form"+kontagailua).elements["eran"].style.backgroundColor = "red";
							}	
					
						}
					}
					xmlhttp.open("POST","BalioztuErantzuna.php"); 
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send(str2.concat(erantzuna)+'&'+str3.concat(id));
				}else{
					reseteauValoreak();
					var str2 = "erantzuna=";
					var str3 = "id=";
					eranzuzen=0;
					eranoker=0;
					nickname_global=nickname;

					xmlhttp= new XMLHttpRequest();

					xmlhttp.onreadystatechange = function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							if (xmlhttp.responseText.trim() == 'Bai'){
								alert("Asmatu duzu!!!!");
								++eranzuzen;
								document.getElementById("mezua").innerHTML="Asmatutako galderak / Txarto erantzundako galderak  " + eranzuzen + " / " + eranoker ;
								document.forms.namedItem("form"+kontagailua).elements["eran"].style.backgroundColor = "33CC00";
							}else{
								alert("Ez duzu asmatu!!! Ohhhh");
								++eranoker;
								document.getElementById("mezua").innerHTML="Asmatutako galderak / Txarto erantzundako galderak  " + eranzuzen + " / " + eranoker ;
								document.forms.namedItem("form"+kontagailua).elements["eran"].style.backgroundColor = "red";
							}	
					
						}
					}
					xmlhttp.open("POST","BalioztuErantzuna.php"); 
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send(str2.concat(erantzuna)+'&'+str3.concat(id));
				}	
			}			
		}
	}

	function reseteauValoreak(){
		var i = 1;
		while ((i<=document.forms.length) && (document.forms.namedItem("form"+i).elements["eran"].value!= "")){
				document.forms.namedItem("form"+i).elements["eran"].style.backgroundColor = "";
				document.forms.namedItem("form"+i).elements["eran"].value = "";
				++i;

		}
			
	}
	
	
	function layout(){
		window.location = "http://localhost/LAB1/layout.php";
			
	}
	
	function oharra(){
		alert('Galderak erantzuteko hautazko nick bat jarri ahal izango duzu. Nick-a idazten bada sesio \n berdinean asmatu eta erratu dituzun erantzunen akumulazioaren berri emango ditu sistemak');
			
	}

	
</script>
<head>
	<link rel="stylesheet" type="text/css" href="stylesPWS/taula.css">

     <title> Zenbat dakizu</title>
    
</head>

<body background="images/body.jpg">
<?php
	
	
	
	//mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	//mysql_select_db("u615503288_erab") or die(mysql_error());
	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	$galdera =mysql_query("SELECT * FROM galderak;");
	echo'<div>
	<br><input type="text" id="nickname" name="nickname" placeholder="Nickname (hautazkoa)"> <a href="./zenbatDakizu.php" id="bottle" onclick="oharra();"><img src="images/galdera.png" alt="Galdera" height="30" width="30"></a> <input align="right" class="itzuli" type="button" id="bot" name="bot" value="Itzuli" onclick="layout();">
	<div id="mezua" style="color:#A901DB"></div>
	
	</div>';
	echo'<p id="galderakont"></p>';
	echo '<br>';
	echo '<table border=1><tr><th> ID </th><th> GALDERAK </th><th> ZAILTASUN-MAILA </th><th> ERANTZUNA </th><th> SAHIAKERA </th></tr>';
	
	if($galdera === FALSE) { 
		die(mysql_error());
	}	
	$kontagailua= 1;
	while( $row =mysql_fetch_array( $galdera )) {
		echo '<tr><form id="form'.$row['id'].'" name="form'.$row['id'].'" method="POST" action="layout.php">
		<td><input class="tulainpt" type="text" id="kont" name="kont" value="'.$row['id'].'"disabled></td>
		<td> <input class="tulainpt" type="text" id="galdera" name="galdera" size="30" maxlength="100" value="'.$row['galdera'].'" disabled></td>
		<td><input class="tulainpt" type="text" id="zail" name="zail" size="30" maxlength="100" value="'.$row['zailtasuna'].'" disabled></td>
		<td><input class="tulainpt" type="text" id="eran" name="eran" size="30" maxlength="100"></td>
		<td><input class="btn" type="button" id="botoia" name="botoia" value="Bidali erantzuna" onclick="bidaliErantzuna('.$kontagailua.')"></td></form></tr>';
		++$kontagailua;
	}
	
	echo '</table>';
	mysql_close();
	
?>
</body>
</html>