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
     <title>Sign In</title>
    
</head>
<body>
<form name="login" method="post" action="signIn.php" onSubmit="return balidatu();" >
				 Posta (*):
				 <input type="text" id="posta"  name="email" size="30" maxlength="100"> 
				 <br>
				 Pasahitza (*):
				 <input type="password" id="pasahitza" name="pasahitza" size="30" maxlength="100"> 
				 <br>
				 <input type="submit" value="Enviar">
				 <br>
				 <input type="submit" value="Atzera" name="Atzera" >



</body>
</html>

<?php

	include "emailBalidatu.php";

	if(isset($_POST['Atzera'])){
		header('Location: ./layout.html');
	}
	else if(isset($_POST['email'])){
	
	
	$email = $_POST['email'];
	$pasahitza= $_POST['pasahitza'];



// Validate email
//if (balidatuEmail($email)) {


/*  
	FILTRATZEKO BESTE POSIBILITATE BAT, BAKARRIK GURE EMAILEN EGITURA DAUKATEN CORREOAK ONARTUKO LUKEENA
	if(preg_match('/^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es|eus$/', $email))return true;
	else {
		echo ('<br>' . $email . ' no es un correo valido. <br/>');
		return true;
	}
*/
		$link=mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		mysql_select_db("u615503288_erab") or die(mysql_error());
		//$link=mysql_connect("localhost","root","") or die(mysql_error());
		//mysql_select_db("quiz") or die(mysql_error());
		
		$sql=("SELECT * FROM erabiltzaileak WHERE Email='".$_POST['email']."';");
		
		$emaitza_query=  mysql_query($sql);
		if (!$emaitza_query){
			die('Error: ' . mysql_error());
		}
		mysql_close();
		if (mysql_num_rows($emaitza_query)==1){
			//aurkituta
			$user = mysql_fetch_array($emaitza_query);
			
			if($user['Pasahitza']==$pasahitza){
				session_start();
				$_SESSION['erabiltzaile']=$email;
			
				if(preg_match('/^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es|eus$/',$email)){
					$_SESSION['baimena']="ikasle";
				}else{
					$_SESSION['baimena']="irakasle";
				}
				$info = getdate();
				$eguna = $info['mday'];
				$hil = $info['mon'];
				$urtea = $info['year'];
				$ordua= $info['hours'];
				$min = $info['minutes'];
				$seg = $info['seconds'];

				$oraing_ordua = "$eguna/$hil/$urtea => $ordua:$min:$seg";
			
			
		

				// Log In-a noiz egin den taulan sartzeko.
				
				$link2=mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
				mysql_select_db("u615503288_erab") or die(mysql_error());
				//$link2=mysql_connect("localhost","root","") or die(mysql_error());
				//mysql_select_db("quiz") or die(mysql_error());
			
				$sql2="INSERT INTO konexioak (email,ordua) VALUES
				('$_POST[email]','$oraing_ordua')";
			
				$emaitza_query2=  mysql_query($sql2);
				if (!$emaitza_query2){
					die('Error: ' . mysql_error());
				}
				mysql_close($link2);
				if($_SESSION['baimena']=="ikasle")header('Location: ./handlingQuizzes.php');
				else header('Location: ./reviewingQuizzes.php');
				
				}else{
				echo('<script> alert("Pasahitza okerra da.")</script>');
				}
		mysql_close($link);
		
		}
	//}else {
	//	echo('<script> alert("Idatzi duzun posta ez dago erregistratuta.")</script>');
//}
}

?>

