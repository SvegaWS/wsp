<!DOCTYPE html>
<html>
<head>
		<!--><script type="text/javascript">

		function balidatu(){

			var errorea="";
			var balidatzekoemail= new RegExp("^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es|eus$");
			var pasahitza = document.getElementById("pasahitza").value;
			var email = document.getElementById("email").value;
			
			if(pasahitza==""){
				errorea+="Pasahitza eremua bete behar duzu \n";
			}
			if(balidatzekoemail.test(email)==false){
				errorea+="Email eremua bete behar duzu \n";	
			}
			
			if(errorea!=""){
				alert(errorea);
				return false;
			}
			else{
				//alert("Dena ondo bete duzu, bidalketa egin da.");
				return true;
			}
		}

		</script> <!-->
     <title>Insert Question</title>
    
</head>
<body>
<?php
session_start();
?>
<form name="login" method="post" action="InsertQuestion.php" onSubmit="return balidatu();" >
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
				 <input type="submit" value="Enviar">
				 
</form>

</body>
</html>

<?php


	if(isset($_POST['erantzuna'],$_POST['galdera'])){
	
	
	$erantzuna = $_POST['erantzuna'];
	$galdera= $_POST['galdera'];





		$link=mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		mysql_select_db("u615503288_erab") or die(mysql_error());
		//$link = mysql_connect("localhost","root","") or die(mysql_error());
		//mysql_select_db("quiz") or die(mysql_error());
			$sql="INSERT INTO galderak(galdera, erantzuna, zailtasuna, email) VALUES
			( '$_POST[galdera]','$_POST[erantzuna]','$_POST[zailtasuna]','$_SESSION[erabiltzaile]')";
			
			$emaitza_query=  mysql_query($sql);
			if (!$emaitza_query){
				die('Error: ' . mysql_error());
			}
			mysql_close($link);
			
		
		//XML-an txertatzeko
		
		
		$xml = simplexml_load_file('galderak.xml');

		$assessmentItem=$xml->addChild('assessmentItem');
		
		if(isset($_POST['zailtasuna'])){
			$assessmentItem->addAttribute('konplexutasuna',$_POST['zailtasuna']);
		}else{
			$assessmentItem->addAttribute('konplexutasuna','Ez dauka konplexutasunik');
		}		
		
		$itembody=$assessmentItem->addChild('itemBody');
		$correctResponse=$assessmentItem->addChild('correctResponse');
		$p=$itembody->addChild('p',$_POST['galdera']);
	
		$correctResponse->addChild('value',$_POST['erantzuna']);
		
		$xml->asXML('galderak.xml');
		
		echo"<a href='layout.html'>Home</a>";
		echo"<br>";
		echo"<a href='seeXMLQuestions.php'>Ikusi galderak</a>";
		//header('Location: ./layout.html');
}

?>