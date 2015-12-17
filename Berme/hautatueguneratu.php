<?php
	
		session_start();
		
		if(isset($_SESSION['baimena'])&&$_SESSION['baimena']=="irakasle"){
		
		//mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		//mysql_select_db("u615503288_erab") or die(mysql_error());
		
		mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("quiz") or die(mysql_error());
	
		$galdera=$_POST['galdera'];
		$erantzuna=$_POST['erantzuna'];
		$zailtasuna=$_POST['zailtasuna'];
		$id=$_POST['id'];
		
	
		$sql=("UPDATE galderak SET galdera='$galdera', erantzuna='$erantzuna', zailtasuna='$zailtasuna' WHERE id='$id'");
		
		if (!mysql_query($sql))
		{
			die('Errorea:'.mysql_error());
		}
	
		mysql_close();
		echo'<script>alert("Eguneraketa egina")</script>';
		}else{
		echo'<script>alert("Ez daukazu baimena orrialde honetan sartzeko")</script>';
		header('Location: ./layout.html');
		}

?>