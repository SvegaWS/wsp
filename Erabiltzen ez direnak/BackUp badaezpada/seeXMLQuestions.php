<?php
	$xslDoc = new DOMDocument();
	$xslDoc->load("galderakXSL.xsl");
	$xmlDoc = new DOMDocument();
	$xmlDoc->load("galderak.xml");
	$proc = new XSLTProcessor();
	$proc->importStylesheet($xslDoc);
	echo $proc->transformToXML($xmlDoc);



?>