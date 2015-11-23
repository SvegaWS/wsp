<?php

		session_start();
	
		if(isset($_SESSION['baimena'])&&$_SESSION['baimena']=="ikasle"){
		$link=mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
		mysql_select_db("u615503288_erab") or die(mysql_error());
		//$link = mysql_connect("localhost","root","") or die(mysql_error());
		//mysql_select_db("quiz") or die(mysql_error());
			$sql="INSERT INTO galderak(galdera, erantzuna, zailtasuna, email) VALUES
			( '$_POST[galdera]','$_POST[erantzuna]','$_POST[zailtasuna]','$_POST[erabiltzaile]')";
			
			$emaitza_query=  mysql_query($sql);
			if (!$emaitza_query){
				die('Error: ' . mysql_error());
			}
		mysql_close($link);

		//XML-a
		
		$xml = simplexml_load_file('galderak.xml');

		$assessmentItem=$xml->addChild('assessmentItem');
		
		if(isset($_POST['zailtasuna'])){
			$assessmentItem->addAttribute('konplexutasuna',$_POST['zailtasuna']);
		}else{
			$assessmentItem->addAttribute('konplexutasuna','Ez dauka konplexutasunik');
		}		
		
		$itembody=$assessmentItem->addChild('itemBody');
		$correctResponse=$assessmentItem->addChild('correctResponse');
		$p=$itembody->addChild('p',$_POST['galdera']);
	
		$correctResponse->addChild('value',$_POST['erantzuna']);
		
		$xml->asXML('galderak.xml');
		
	}else{
		echo'<script>alert("Ez daukazu baimenik orri hau atzitzeko.")</script>';
		header('Location: ./layout.html');
	}

?>