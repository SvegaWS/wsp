<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="stylesPWS/login.css">

		<script type="text/javascript">

		function $_GET(param) {
		var vars = {};
		window.location.href.replace( 
			/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
				function( m, key, value ) { // callback
					vars[key] = value !== undefined ? value : '';
				}
			);

			if ( param ) {
				return vars[param] ? vars[param] : null;	
			}
			return vars;
		}

		var $_GET = $_GET(),
    	email = $_GET['email'];
		var formemail= email.replace(/%40/gi,"@");
		
		
		function myFunction(){
    	document.getElementById("email").value = formemail;
		}
		function balidatu(){

			var errorea="";
			var pasahitza = document.getElementById("pasahitza").value;
			var pasahitzaerr = document.getElementById("pasahitzaerr").value;
			if(pasahitza==""){
				errorea+="Pasahitza eremua bete behar duzu \n";
			}
			if(pasahitzaerr==""){
				errorea+="Pasahitza errepikatzeko eremua bete behar duzu \n";
			}
			if(pasahitza!=pasahitzaerr){
				errorea+="Bete dituzun bi pasahitzak ezberdinak dira\n";	
			}
			
			if(errorea!=""){
				alert(errorea);
				return false;
			}
			else{
				alert("Dena ondo bete duzu, bidalketa egin da. Layout orriara birbilduta izango zara eta jadanik login egin ahal izango duzu pashitza berrirarekin");
				
				return true;
			}
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
     <title>Pasahitza berria</title>
    
</head>
<body onload="myFunction()">
<div class="goi"></div>
<div class="login">
<form name="pasahitzaberria" method="post" action="pasaBerria.php" onSubmit="return balidatu();" >
				 <input type="text" id="email"  name="email" size="30" maxlength="100" hidden> 

				  Pasahitza (*):
				 <input type="password" id="pasahitza" name="pasahitza" size="30" maxlength="100" onchange="balidatuPass();"> 
				 <div id="pasa" style="color:#A901DB" >
				 </div>
				 <br>
				 Pasahitza errepikatu(*):
				 <input type="password" id="pasahitzaerr" name="pasahitzaerr" size="30" maxlength="100"> 
				 <br>
				 <br>
				 <input class="btn" type="submit" value="Bidali" id="BidaliBotoia">
				 <input class="btn" type="submit" value="Atzera" name="Atzera" >
				 <br>


</div>
</body>
</html>

<?php
if(isset($_POST['Atzera'])){
		header('Location: ./berreskuratuPass.php');
	}
	else if(isset($_POST['pasahitza'])){
		$pasazifra=sha1($_POST['pasahitza']);
		$email=$_POST['email'];
		//mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		//mysql_select_db("u615503288_erab") or die(mysql_error());
		
		mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("quiz") or die(mysql_error());
		
		$pasahitzaberria =mysql_query("UPDATE erabiltzaileak SET Pasahitza='$pasazifra' WHERE Email='$email'");

		if($pasahitzaberria === FALSE) { 
			die(mysql_error());
			header('Location: ./berreskuratuPass.php');
		}	
		
		mysql_close();
		header('Location: ./layout.html');
	
	}
?>