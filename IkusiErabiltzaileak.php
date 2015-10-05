<?php
	mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	mysql_select_db("u615503288_erab") or die(mysql_error());
	
	//mysql_connect("localhost","root","") or die(mysql_error());
	//mysql_select_db("quiz") or die(mysql_error());
	
	$erabiltzaileak =mysql_query( "select * from erabiltzaileak" );
		
	echo '<table border=1><tr><th> IZENA </th><th> ABIZENA </th><th> ABIZENA2 </th><th> EMAIL </th><th> MUGIKORRA </th>
	<th> EZPEZIALITATEA </th><th> INTERESAK </th></tr>';
	
	if($erabiltzaileak === FALSE) { 
		die(mysql_error());
	}	
	
	while( $row =mysql_fetch_array( $erabiltzaileak )) {
		echo '<tr><td>'.$row['Izena'].'</td> <td>'.$row['Abizena1'].'</td><td>'.$row['Abizena2'].'</td><td>'.$row['Email'].'</td>
		<td>'.$row['Mugikorra'].'</td><td>'.$row['Ezpezialitatea'].'</td><td>'.$row['Interesak'].'</td></tr>';
	}
	
	echo '</table>';
?>