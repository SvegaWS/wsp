<html>

<?php
			session_start();
			
			if(!isset($_SESSION['baimena'])&&$_SESSION['baimena']!="ikasle"){
				//echo'<script>alert("Ez daukazu baimenik orri hau atzitzeko.")</script>';
				header('Location: ./layout.html');
			}
			
			
	?>
<script type="text/javascript">

		
	galderaKont();
	var egun=setInterval(function(){galderaKont()},5000);
	
	function ikusiGaldera(){

 		
		xmlhttp= new XMLHttpRequest();
		var sesioa='<?php echo $_SESSION['erabiltzaile'];?>'
		var str="email=";
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("erakutsi").innerHTML=xmlhttp.responseText; 
			}
		}
		xmlhttp.open("POST","IkusiGalderak.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(str.concat(sesioa));
		
	}
		
	function bidaliGalderak(){
	
		document.getElementById("erakutsi").innerHTML="";
		var sesioa='<?php echo $_SESSION['erabiltzaile'];?>'
		
		var galdera = document.getElementById("galdera").value;
		var erantzuna = document.getElementById("erantzuna").value;
		var zailtasuna =document.getElementById("zailtasuna").value;
		var errorea="";
		document.getElementById("galdera").value="";
		document.getElementById("erantzuna").value="";
		document.getElementById("zailtasuna").value="";
		if(galdera==""){
				errorea+="Pasahitza eremua bete behar duzu \n";
		}
		if(erantzuna==""){
				errorea+="Erantzuna eremua bete behar duzu \n";
		}
		
		if(errorea!=""){
				alert(errorea);
				 
		}
		else{
		
			var str1 = "galdera=";
			var str2 = "erantzuna=";
			var str3 = "zailtasuna=";	
			var str4="erabiltzaile=";
			xmlhttp= new XMLHttpRequest();

			xmlhttp.onreadystatechange = function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("txertatuG").innerHTML=xmlhttp.responseText; 
				}
			}
			xmlhttp.open("POST","EditQuestions.php"); 
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send(str1.concat(galdera)+'&'+str2.concat(erantzuna)+'&'+str3.concat(zailtasuna)+'&'+str4.concat(sesioa));
			return true;
						
		}
	
	}
	
	function galderaKont(){
		xmlhttp= new XMLHttpRequest();
		var sesioa='<?php echo $_SESSION['erabiltzaile'];?>'
		var str="email=";
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
			
				document.getElementById("kontagailua").innerHTML=xmlhttp.responseText; 
			}
		}
		xmlhttp.open("POST","galderakont.php"); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(str.concat(sesioa));
	
	}
	

</script>
<head>

     <title> Handling Quizzes</title>
    
</head>
		 <body>
			<div align="right">
				<a href="logout.php">Logout</a>	
			</div>
			 <form name="formularioa">
				 Galdera
				 <input type="text" id="galdera" name="galdera" size="30" maxlength="100">
				 <br>
				 Erantzuna:
				 <input type="text" id="erantzuna"  name="erantzuna" size="30" maxlength="100"> 
				 <br>
				 Galderaren zailtasun maila aukeratu(txikiena 1 izanik eta handiena 5):
				 <select type="zailtasuna" id="zailtasuna" name="zailtasuna">
					<option value="" selected disabled > Zailtasun maila aukeratu</option> 
				    <option value="1" >1</option> 
				    <option value="2" >2</option> 
				    <option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>		
				</select>					
				 <br>
				 <br>
				 <input type="button" value="Ikusi Galderak" onClick="ikusiGaldera();">
				 <input type="button" value="Bidali Galderak" onClick="bidaliGalderak();">
				
		</form>
		

		<div id="kontagailua" style="color:#A901DB">
		</div>
		<br>
		<div id="erakutsi">
		</div>

		<div id="txertatuG">
		</div >
		
</body>
</html>