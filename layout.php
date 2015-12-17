<!DOCTYPE html>
<?php
		session_start();
		?>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
	<?php
		//session_start();
		
		if(isset($_SESSION['baimena'])&&$_SESSION['baimena']=="irakasle"){
		echo'<span class="right"><a href="reviewingQuizzes.php">Review Questions</a></span>';
		echo'&nbsp&nbsp&nbsp';
		echo'<span class="right"><a href="IkusiErabiltzaileak.php">List Users</a></span>';
		echo'&nbsp&nbsp&nbsp';
		echo'<span class="right" ><a href="logout.php">Logout</a></span>';
		
		}else if(isset($_SESSION['baimena'])&&$_SESSION['baimena']=="ikasle"){
		echo'<span class="right"><a href="handlingQuizzesjQuery.php">Handling questions</a></span>';
		echo'&nbsp&nbsp&nbsp';
		echo'<span class="right" ><a href="logout.php">Logout</a></span>';
		
		}else{
		echo'<span class="right"><a href="signIn.php">Login</a></span>';
		echo'&nbsp&nbsp&nbsp';
		echo'<span class="right"><a href="signUp.html">SignUp</a></span>';
		echo'&nbsp&nbsp&nbsp';
		echo'<span class="right" ><a href="zenbatDakizu.php">How much do you know? Try me!</a></span>';

		
		}
	  ?>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Home</a></span>
		<span><a href='credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	Quizzes and credits will be displayed in this spot in future laboratories ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
