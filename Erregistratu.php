<?php

	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
		
	$sql="INSERT INTO erabiltzaileak(Izena, Abizena1, Abizena2, Email, Mugikorra, Ezpezialitatea, Interesak, Pasahitza) VALUES
	('$_POST[izena]','$_POST[abizena]','$_POST[2abizena]','$_POST[e-mail]','$_POST[mugikorra]','$_POST[ezpezialitatea]','$_POST[interesak]','$_POST[pasahitza]')";
	
	if (!mysql_query($sql))
	{
		die('Errorea:'.mysql_error());
	}
	echo "Erregustria sortua";
	mysql_close();
	echo "<p> <a href='IkusiErabiltzaileak.php'> Erregistroak ikusi </a>";

?>