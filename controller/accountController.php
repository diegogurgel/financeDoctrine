<?php 
	
	require_once("../bootstrap.php");
	$conta = new accounts();

	$conta->setName("Conta99");
	$conta->setCreated(new DateTime("now"));
	$conta->setModified(new DateTime("now"));
	$entityManager->persist($conta);
	$entityManager->flush();
 ?>