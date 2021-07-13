<?php
	session_start();
	unset ($_SESSION['Login']);
  	unset ($_SESSION['nome']);
  	unset ($_SESSION['funcao']);
  	header('Location:index.php');
 ?>