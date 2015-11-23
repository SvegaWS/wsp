<?php
	function balidatuMugikorra($mugikor){
		if(preg_match('/^[6|9]{1}-? ?[0-9]{8}$/', $mugikor))return true;
	else {
		echo ('<br>' . $mugikor . ' ez da baliozko mugikor zenbakia. <br/>');
		return false;
	}	
	}
?>