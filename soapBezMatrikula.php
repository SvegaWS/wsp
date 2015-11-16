<?php
		//Bezero berria sortzeko.
		require_once('lib/nusoap.php');
		require_once('lib/class.wsdlcache.php');
		
		$soapclient= new nusoap_client ('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl',true);
		
		$erantzuna=$soapclient->call('comprobar',array('x'=>$_POST['email']));
		
		if ($erantzuna=="SI"){
		echo "Email zuzena";
		}else{
		echo "Email okerra";
		}
?>