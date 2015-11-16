<?php
	mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	mysql_select_db("u615503288_erab") or die(mysql_error());
	
	//mysql_connect("localhost","root","") or die(mysql_error());
	//mysql_select_db("quiz") or die(mysql_error());
	
	$galdera =mysql_query("SELECT * FROM galderak WHERE email='".$_POST['email']."';");
		
	echo '<table border=1><tr><th> GALDERAK </th><th>ERANTZUNAK</th><th> ZAILTASUN-MAILA </th></tr>';
	
	if($galdera === FALSE) { 
		die(mysql_error());
	}	
	
	while( $row =mysql_fetch_array( $galdera )) {
		echo '<tr><td>'.$row['galdera'].'</td><td>'.$row['erantzuna'].'</td> <td>'.$row['zailtasuna'].'</td></tr>';
	}
	
	echo '</table>';

	mysql_close();

		
		
		
?>