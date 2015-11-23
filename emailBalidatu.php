<?php
	function balidatuEmail($posta){
			//Bezero berria sortzeko.
			require_once('lib/nusoap.php');
			require_once('lib/class.wsdlcache.php');
			
			$soapclient= new nusoap_client ('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl',true);
			
			$erantzuna=$soapclient->call('comprobar',array('x'=>$posta));
			
			if ($erantzuna=="SI"){
				return true;
			}else{
				return false;
			}
	}
	
?>