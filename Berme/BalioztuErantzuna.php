
<?php


		mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("quiz") or die(mysql_error());
		//mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		//mysql_select_db("u615503288_erab") or die(mysql_error());
	
		
		$erantzuna=$_POST['erantzuna'];
		$id=$_POST['id'];
		
		$sql=("SELECT * FROM galderak WHERE id='".$id."';");
		
		$emaitza_query=  mysql_query($sql);
		if (!$emaitza_query)
		{
			die('Errorea:'.mysql_error());
		}
		
		mysql_close();
		if (mysql_num_rows($emaitza_query)==1){
			//aurkituta
			$galdera = mysql_fetch_array($emaitza_query);
			if($galdera['erantzuna']==$erantzuna)
			{
				echo("Bai");
			}
			else
			{
				echo("Ez duzu asmatu galdera");
			}
		}

?>
