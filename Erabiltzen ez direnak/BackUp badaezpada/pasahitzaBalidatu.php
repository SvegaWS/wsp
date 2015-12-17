<?php
	function balidatuPasahitza($pass){
		//Bezero berria sortzeko.
		require_once('lib/nusoap.php');
		require_once('lib/class.wsdlcache.php');
		
		$soapclient= new nusoap_client ('http://localhost/LAB1/egiaztatuPasahitza.php?wsld',false);
		
		$erantzuna=$soapclient->call('egiaztatu',array('x'=>$pass));
		
		if($erantzuna=="Pasahitza baliogabea"){
			return false;
		}else{
			return true;
		}
	}
?>