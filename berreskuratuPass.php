<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesPWS/login.css">

		<script type="text/javascript">

var erantzunZuzena="0";
function bilatu(){
	document.getElementById("erantzuna").innerHTML=""; 
	document.getElementById("sar").style.display = 'none';
	document.getElementById("eran").value="";
	var email=document.getElementById("posta").value;
	var balidatzekoemail= new RegExp("^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es|eus$");
	if (email==""){
		alert("Email eramua bete behar duzu");
	}
	else if(balidatzekoemail.test(email)==false){
		alert("Email ez dauka formatu ona");
	}else{
		xmlhttp= new XMLHttpRequest();
		var posta=document.getElementById("posta").value;
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText=='Ez'){
					alert("Ez dago erabiltzailerik email hori daukana");
				}else{
				document.getElementById("sar").style.display = 'block';
				document.getElementById("erantzuna").innerHTML=xmlhttp.responseText; 
				document.getElementById('posta').disabled=true;
				}
			}
		}
		xmlhttp.open("POST","segurtasungaldera.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("email="+posta);
	}
	
	}
	

function balidatu(){
		xmlhttp= new XMLHttpRequest();
		var posta=document.getElementById("posta").value;
		var eran= document.getElementById("eran").value;
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
					if (xmlhttp.responseText.trim()=='Ez'){
						alert("Erantzun desegokia");
						
					}else{
						alert("Erantzun zuzena");
						document.getElementById('eran').disabled=true;
						document.getElementById('posta').disabled=false;
						document.getElementById('segurtasuna').style.display = 'block';
						document.getElementById('bidali').hidden=false;
						document.getElementById('segurtasuna').innerHTML="Seguro zaude pasahitza aldatu nahi duzula";
						
					}
			}
		}
		var str1="email=";
		var str2="erantzuna=";
		
		xmlhttp.open("POST","segurtasunerantzuna.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(str1.concat(posta)+'&'+str2.concat(eran));
}
function layout(){
		window.location = "http://localhost/LAB1/layout.php";
			
	}

</script>
     <title>Pasahitza berreskuratu</title>
    
</head>
<body background="images/body.jpg">
<input class="itzuli" type="button" id="bot" name="bot" value="Itzuli" onclick="layout();">
<div class="berre">
<form name="berreskuratu" method="get" action="pasaBerria.php"  >
				 Posta (*):
				 <input type="text" id="posta"  name="email" size="30" maxlength="100"> 
				 <br>
				 <button class="btn" type="button" onClick="bilatu();">Bilatu</button> 
				 <div id="erantzuna" style="color:#A901DB">
				 </div>
				 <div id ="sar" hidden >
				 Erantzuna (*):
				 <input type="text" id="eran" name="eran" size="30" maxlength="100"  >
				 <br>
				 <input class="btn" type="button" value="Balidatu" onclick="balidatu();">
				 <div id="segurtasuna" style="color:#A901DB" hidden>
				 </div>
				 <input class="btn" id="bidali" type="submit" value="Bidali" hidden>
				 <br>
				 </div>
</div>
</form>

</body>
</html>


