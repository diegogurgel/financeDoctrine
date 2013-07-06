		
<?php 
	header("Content-Type: text/plain; charset=utf-8");
	require_once("../bootstrap.php");
	$repositorio =  $entityManager->getRepository("user");
	$users = $repositorio->findAll();
	$users[0]->getName();
	//echo json_encode(array_values($users));
	$arrayUsers; 
	foreach ($users as $user) {
	//echo $user->getName()."\n";
		$arrayUsers[] = $user->getName();
	 }
	 echo json_encode($arrayUsers);


 ?>