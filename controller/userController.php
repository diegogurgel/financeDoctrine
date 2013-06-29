
<?php 
	require_once("../bootstrap.php");
	$nome = $_POST["nome"];

	$user = new user();
	$user->setName($nome);
	$entityManager->persist($user);
	$entityManager->flush();

	header("location: ../View/cadUser.php");
 ?>