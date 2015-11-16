<?php
	mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	mysql_select_db("u615503288_erab") or die(mysql_error());
	
	//ID maximoa duen galdera
	
	//mysql_connect("localhost","root","") or die(mysql_error());
	//mysql_select_db("quiz") or die(mysql_error());
	
	$galdera1 =mysql_query("SELECT id FROM galderak");
		
	
	if($galdera1 === FALSE) { 
		die(mysql_error());
	}	
	while($row =mysql_fetch_array( $galdera1 )){
		$azkena=$row['id'];
	}
	mysql_close();
	
	//Erabiltzailearen galdera kopurua
	mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	mysql_select_db("u615503288_erab") or die(mysql_error());
	//mysql_connect("localhost","root","") or die(mysql_error());
	//mysql_select_db("quiz") or die(mysql_error());
	
	$galdera =mysql_query("SELECT * FROM galderak WHERE email='".$_POST['email']."';");
		
	
	if($galdera === FALSE) { 
		die(mysql_error());
	}	
	$kont="0";
	while( $row =mysql_fetch_array( $galdera )) {
		$kont=$kont+1;
	}
	
	

	mysql_close();
	
	
	echo"Nire galderak / Galdera guztiak:  " . $kont . " / " .$azkena;
	
	
	
	
	
		
		
		
?>