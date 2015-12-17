<!DOCTYPE html>
<html>
<head>
		<script type="text/javascript">

	function balidatuEmail(){

 		
		xmlhttp= new XMLHttpRequest();
		var posta=document.getElementById("email").value;
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("erantzuna").innerHTML=xmlhttp.responseText; 
			}
		}
		xmlhttp.open("POST","soapBezMatrikula.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("email="+posta);
		
	}
	
	function balidatuPass(){

 		
		xmlhttp= new XMLHttpRequest();
		var pass=document.getElementById("pasahitza").value;
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("pasa").innerHTML=xmlhttp.responseText; 
			}
		}
		xmlhttp.open("POST","soapBezPasahitza.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("pass="+pass);
		
	}
	

		</script> 
     <title>Sign UP berezi</title>
    
</head>
<body>
<form name="login" method="post" action="signIn.php"  >
				 Posta (*):
				 <input type="text" id="email"  name="email" size="30" maxlength="100" onChange="balidatuEmail();"> 
				 <br>
				 Pasahitza (*):
				 <input type="password" id="pasahitza" name="pasahitza" size="30" maxlength="100"  onChange="balidatuPass();"> 
				 <br>
				 <input type="submit" value="Enviar">
				 <br>
				 <input type="submit" value="Atzera" name="Atzera" >
				 <br>
				 <br>
</form>
				 <div id="erantzuna">
				 </div>
				 <div id="pasa">
				 </div>



</body>
</html>

