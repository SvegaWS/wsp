<html>
<head>
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
    	id = $_GET['id'],
    	galdera = $_GET['galdera'];	
    	erantzuna = $_GET['erantzuna'];	
    	zailtasuna = $_GET['zailtasuna'];	
    	email = $_GET['email'];
    	var formid = id;
    	var formgaldera= galdera.replace(/%20/gi," ");
    	var formerantzuna = erantzuna.replace(/%20/gi," ");
    	var formzailtasuna = zailtasuna;
    	var formemail = email;


		function myFunction(){
        /*alert (formid);
        alert (formemail);
        alert (formgaldera);
        alert (formerantzuna);
        alert (formzailtasuna);
        */
		document.getElementById("id").value = formid;
    	document.getElementById("galdera").value = formgaldera;
    	document.getElementById("erantzuna").value = formerantzuna;
    	document.getElementById("zailtasuna").value = formzailtasuna;
    	document.getElementById("email").value = formemail;


   		}  
	</script>
	  <title>hautatu </title>
    
</head>

<body onload="myFunction()">
	<?php echo'<div align="right"><a href="logout.php">Logout</a></div>'; ?>
	<br>
<form name="Galdera" method="get" action="hautatueguneratu.php">
				 <br>
				 Galdera berria idatzi (bestela honela utzi):
				 <input type="text" id="galdera"  name="galdera" size="30" maxlength="100"> 
				 <br>
				 Erantzun berria idatzi (bestela honela utzi):
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
				 <input type="submit" value="Enviar">
				 <br>
				 <input type="submit" value="Atzera" name="Atzera" >

				<!--GET-etik bidaltzeko ID hemen ezingo delako aldatu-->
				 <input type="" id="id"  name="id" size="30" maxlength="100" hidden> 
				 
	</form>
	</body>

	</html>