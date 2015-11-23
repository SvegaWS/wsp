<?php
	session_start();
	echo'<div align="right"><a href="logout.php">Logout</a></div>';
	if(isset($_SESSION['baimena'])&&$_SESSION['baimena']=="irakasle"){
	mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	mysql_select_db("u615503288_erab") or die(mysql_error());
	
	//mysql_connect("localhost","root","") or die(mysql_error());
	//mysql_select_db("quiz") or die(mysql_error());
	
	$galdera =mysql_query("SELECT * FROM galderak;");
		
	echo '<table border=1><tr><th> ID </th><th> GALDERAK </th><th>ERANTZUNAK</th><th> ZAILTASUN-MAILA </th><th> EMAIL </th><th> HAUTATU </th></tr>';
	
	if($galdera === FALSE) { 
		die(mysql_error());
	}	
	
	while( $row =mysql_fetch_array( $galdera )) {
		echo '<tr><td>'.$row['id'].'</td><td>'.$row['galdera'].'</td><td>'.$row['erantzuna'].'</td> <td>'.$row['zailtasuna'].'</td><td>'.$row['email'].'</td><td><a href="pruebahaut.php?id='.$row['id'].'&galdera='.$row['galdera'].'&erantzuna='.$row['erantzuna'].'&zailtasuna='.$row['zailtasuna'].'" class="button">Hautatua</a></td></tr>';
	}
	
	echo '</table>';

	mysql_close();
	}else{
		echo'<script>alert("Ez daukazu baimenik orri hau atzitzeko.")</script>';
		header('Location: ./layout.html');
	}
?>