

<script type="text/javascript">


	function layout(){
		window.location = "http://localhost/LAB1/layout.php";
			
	}
	function logout(){
		window.location = "http://localhost/LAB1/logout.php";
			
	}

</script>

<?php

		session_start();
		
	if(isset($_SESSION['baimena'])&&$_SESSION['baimena']=="irakasle"){
				
	echo'<body background="images/body.jpg"></body>';
	echo '<link rel="stylesheet" type="text/css" href="stylesPWS/taula.css">';
	echo'<div >
			<input class="itzuli" type="button" id="botout" name="botout" value="Logout" onclick="logout();">
			<input class="itzuli" type="button" id="bot" name="bot" value="Itzuli" onclick="layout();">	
			</div>';
			echo'<br>';
			echo'<br>';
	//mysql_connect("mysql.hostinger.es","u615503288_sws","enekosergio") or die(mysql_error());
	//mysql_select_db("u615503288_erab") or die(mysql_error());
	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	$erabiltzaileak =mysql_query( "select * from erabiltzaileak" );
		
	echo '<table border=1><tr><th> IZENA </th><th> ABIZENA </th><th> ABIZENA2 </th><th> EMAIL </th><th> MUGIKORRA </th>
	<th> EZPEZIALITATEA </th><th> INTERESAK </th><th> ARGAZKIA </th></tr>';
	
	if($erabiltzaileak === FALSE) { 
		die(mysql_error());
	}	
	
	while( $row =mysql_fetch_array( $erabiltzaileak )) {
		echo '<tr><td>'.$row['Izena'].'</td> <td>'.$row['Abizena1'].'</td><td>'.$row['Abizena2'].'</td><td>'.$row['Email'].'</td>
		<td>'.$row['Mugikorra'].'</td><td>'.$row['Ezpezialitatea'].'</td><td>'.$row['Interesak'].'</td><td>'.'<img width="120px" height="150px" src="data:image;base64,'.base64_encode($row['Argazkia']).'"/>'.'</td></tr>';
	}
	
	echo '</table>';
	
	}else{
	//echo'<script>alert("Ez daukazu baimenik orri hau atzitzeko.")</script>';
				header('Location: ./layout.php');
	}
	
?>