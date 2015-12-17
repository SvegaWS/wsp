<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesPWS/login.css">

		<script type="text/javascript">

var erantzunZuzena="0";
function bilatu(){
	document.getElementById("sar").style.display = 'block';
	var email=document.getElementById("posta").value;
	var balidatzekoemail= new RegExp("^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es|eus$");
	if(balidatzekoemail.test(email)==false){
		alert("Email eremua bete behar dezu");
	}else{
		xmlhttp= new XMLHttpRequest();
		var posta=document.getElementById("posta").value;
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("erantzuna").innerHTML=xmlhttp.responseText; 
			}
		}
		xmlhttp.open("POST","segurtasungaldera.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("email="+posta);
	}
	
	}
	
	
	
	
	
	function balidatuEra(){
	var mail=document.getElementById("posta").value;
	
	var res= document.getElementById("eran").value;
	var balidatzekoemail= new RegExp("^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es|eus$");
	if(balidatzekoemail.test(mail)==false){
		alert("Email eremua bete behar dezu");
	}else{
		xmlhttp= new XMLHttpRequest();
		var posta=document.getElementById("posta").value;
		var eran= document.getElementById("eran").value;
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("ondo").innerHTML=xmlhttp.responseText;
			}
		}
		var str1="email=";
		var str2="erantzuna=";
		
		xmlhttp.open("POST","segurtasunerantzuna.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(str1.concat(posta)+'&'+str2.concat(eran));
	
	}
	
}

function balidatu(){
var mail=document.getElementById("posta").value;
	
	var res= document.getElementById("eran").value;
	var balidatzekoemail= new RegExp("^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es|eus$");
	if(balidatzekoemail.test(mail)==false){
		alert("Email eremua bete behar dezu");
	}else{
		xmlhttp= new XMLHttpRequest();
		var posta=document.getElementById("posta").value;
		var eran= document.getElementById("eran").value;
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
					
				if(xmlhttp.responseText=="Bai"){
					alert("Erantzun zuzena");
					document.getElementById('eran').disabled=true;
					return true;
				}else{
					alert("Erantzun desegokia");
					return false;
				}
			}
		}
		var str1="email=";
		var str2="erantzuna=";
		
		xmlhttp.open("POST","segurtasunerantzuna.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(str1.concat(posta)+'&'+str2.concat(eran));
	
	}
	/*if(document.getElementById("ondo").innerHTML=="Bai"){
		alert("Erantzun zuzena");
		document.getElementById('eran').disabled=true;
		return true;
	}else{
		alert("Erantzun desegokia");
		return false;
	}	*/
}
</script>
     <title>Pasahitza berreskuratu</title>
    
</head>
<body>
<div class="login">
<form name="berreskuratu" method="get" action="pasaBerria.php" onSubmit="return balidatu();" >
				 Posta (*):
				 <input type="text" id="posta"  name="email" size="30" maxlength="100"> 
				 <br>
				 <button class="btn" type="button" onClick="bilatu();">Bilatu</button> 
				 <div id="erantzuna" style="color:#A901DB">
				 </div>
				 <div id ="sar" hidden >
				 Erantzuna (*):
				 <input type="text" id="eran" name="eran" size="30" maxlength="100" onChange="balidatuEra();">
				 <br>
				 <div id="ondo" style="color:#A901DB">
				 </div>
				 <input class="btn" type="submit" value="Bidali">
				 <br>
				 </div>
</div>
</form>

</body>
</html>