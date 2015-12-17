<?php
	
		session_start();
		
		if(isset($_SESSION['baimena'])&&$_SESSION['baimena']=="irakasle"){
		echo'<div align="right"><a href="logout.php">Logout</a></div>';
		
		//mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		//mysql_select_db("u615503288_erab") or die(mysql_error());
		
		mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("quiz") or die(mysql_error());
	
		$galdera=$_GET['galdera'];
		$erantzuna=$_GET['erantzuna'];
		$zailtasuna=$_GET['zailtasuna'];
		$id=$_GET['id'];
		
	
		$sql=("UPDATE galderak SET galdera='$galdera', erantzuna='$erantzuna', zailtasuna='$zailtasuna' WHERE id='$id'");
		
		if (!mysql_query($sql))
		{
			die('Errorea:'.mysql_error());
		}
		echo "Erregistroa sortua";
	
		mysql_close();
		echo'<script>alert("Eguneraketa egina")</script>';
		header('Location: ./reviewingQuizzes.php');
		}else{
		echo'<script>alert("Datu desegokiak")</script>';
		header('Location: ./layout.php');
	}

?>