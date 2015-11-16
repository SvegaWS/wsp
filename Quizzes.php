<?php
	mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	mysql_select_db("u615503288_erab") or die(mysql_error());
	
	//mysql_connect("localhost","root","") or die(mysql_error());
	//mysql_select_db("quiz") or die(mysql_error());
	
	$galdera =mysql_query( "select * from galderak" );
		
	echo '<table border=1><tr><th> GALDERAK </th><th> ZAILTASUN-MAILA </th></tr>';
	
	if($galdera === FALSE) { 
		die(mysql_error());
	}	
	
	while( $row =mysql_fetch_array( $galdera )) {
		echo '<tr><td>'.$row['galdera'].'</td> <td>'.$row['zailtasuna'].'</td></tr>';
	}
	
	echo '</table>';

	// Eskaera zer ordutan egi den jakiteko kodea
	$info = getdate();
		$eguna = $info['mday'];
		$hil = $info['mon'];
		$urtea = $info['year'];
		$ordua= $info['hours'];
		$min = $info['minutes'];
		$seg = $info['seconds'];

		$oraing_ordua = "$eguna/$hil/$urtea => $ordua:$min:$seg";

		$link2=mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		mysql_select_db("u615503288_erab") or die(mysql_error());
		//$link2 = mysql_connect("localhost","root","") or die(mysql_error());
		//mysql_select_db("quiz") or die(mysql_error());
		session_start();
		// Bi erabiltzaile motetatik desberdintzeko, anonimoa edo erregistratua
		if (is_null($_SESSION['erabiltzaile'])){
			$sql2="INSERT INTO ekintzak(konexioa,email,ekintza,ordua,ip) VALUES
			(NULL,NULL,'Galdera ikusi','$oraing_ordua','$_SERVER[REMOTE_ADDR]')";
		}
		else{
			$sql2="INSERT INTO ekintzak(konexioa,email,ekintza,ordua,ip) VALUES
			( 'erabiltzaile','$_SESSION[erabiltzaile]','Galdera ikusi','$oraing_ordua','$_SERVER[REMOTE_ADDR]')";
		}
			$emaitza_query2=  mysql_query($sql2);
			if (!$emaitza_query2){
				die('Error: ' . mysql_error());
			}
			mysql_close($link2);	
		
?>