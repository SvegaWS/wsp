<?php
	mysql_connect ("localhost", "root","") or die (mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	$erabiltzaileak =mysql_query( "select * from izena" );
	
	echo '<table border=1><tr><th>NAN </th><th> IZENA </th></tr>';
	
	while( $row =mysql_fetch_array( $erabiltzaileak )) {
		echo '<tr><td>'.$row['izena'].'</td> <td>'.$row['abizena'].'</td><td>'.$row['2abizena'].'</td><td>'.$row['e-mail'].'</td>
		<td>'.$row['mugikorra'].'</td><td>'.$row['ezpezialitatea'].'</td><td>'.$row['interesak'].'</td><td>'.$row['pasahitza'].'</td></tr>';
	}
	
	echo '</table>';
?>