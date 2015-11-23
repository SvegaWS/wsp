<?php
	include "emailBalidatu.php";
	include "mugikorraBalidatu.php";
	include "pasahitzaBalidatu.php";

	if (balidatuMugikorra($_POST['mugikorra'])&& balidatuEmail($_POST['email']) && balidatuPasahitza($_POST['pasahitza'])) {
	
		mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		mysql_select_db("u615503288_erab") or die(mysql_error());
		
		//mysql_connect("localhost","root","") or die(mysql_error());
		//mysql_select_db("quiz") or die(mysql_error());
	
	
		if ($_POST['ezpezialitatea']!=4){
			$sql="INSERT INTO erabiltzaileak(Izena, Abizena1, Abizena2, Email, Mugikorra, Ezpezialitatea, Interesak, Pasahitza) VALUES
			('$_POST[izena]','$_POST[abizena]','$_POST[abizena2]','$_POST[email]','$_POST[mugikorra]','$_POST[ezpezialitatea]','$_POST[interesak]','$_POST[pasahitza]')";
		}else{
			$sql="INSERT INTO erabiltzaileak(Izena, Abizena1, Abizena2, Email, Mugikorra, Ezpezialitatea, Interesak, Pasahitza) VALUES
			('$_POST[izena]','$_POST[abizena]','$_POST[abizena2]','$_POST[email]','$_POST[mugikorra]','$_POST[idatziezpezialitatea]','$_POST[interesak]','$_POST[pasahitza]')";
		}
		
		if (!mysql_query($sql))
		{
			die('Errorea:'.mysql_error());
		}
		echo "Erregistroa sortua";
	
		mysql_close();
		echo "<p> <a href='IkusiErabiltzaileak.php'> Erregistroak ikusi </a>";
	}else{
		echo'<script>alert("Datu desegokiak")</script>';
		header('Location: ./signUp.html');
	}

?>