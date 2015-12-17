<?php
	
		//mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		//mysql_select_db("u615503288_erab") or die(mysql_error());
		
		mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("quiz") or die(mysql_error());
		
		$galdera =mysql_query("SELECT * FROM erabiltzaileak WHERE Email='".$_POST['email']."';");

		if($galdera === FALSE) { 
			die(mysql_error());
		}	
		if (mysql_num_rows($galdera)==1){


			while( $row =mysql_fetch_array( $galdera )) {
				echo $row['Galdera'];
			}	
		}else{
			echo ('Ez');
		}

		mysql_close();
?>