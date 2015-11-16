<?php

	require_once('lib/nusoap.php');
	require_once('lib/class.wsdlcache.php');
	
	
	//$ns="http://localhost/LAB1/egiaztatuPasahitza.php?wsld";
	$ns= "http://localhost/LAB1";
	$server= new soap_server;
	$server->configureWSDL('egiaztatu',$ns);
	$server->wsdl->schemaTargetNameespace=$ns;
	
	$server->register('egiaztatu', array('x'=>'xsd:string'), array('z'=>'xsd:string'),$ns);
	
	
	function egiaztatu($x){
	
		$aurkitua="0";
		$fp = fopen("toppasswords.txt", "r");
		while(!feof($fp)) {
			$lerroa = chop(fgets($fp));
			if($x==$lerroa){
				$aurkitua="1";
				break;
			}
		}
		
		fclose($fp);
		
		if($aurkitua=="1"){
			return "Pasahitza baliogabea";
		}else{
			return "Baliozko pasahizta";
		}
	
	}
		

  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
  $server->service($HTTP_RAW_POST_DATA);



?>